<?php
require("Sentencia_estadistica.php");   
?>


<?php
//Creamos un objeto de la clase randomTable
$rand_temperatura = new RandomTable();
//obtenemos toda la información de la tabla random
$rawdata_temperatura = $rand_temperatura->getAllInfo();

//nos creamos dos arrays para almacenar el tiempo y el valor numérico
$valoresArray_temperatura;
$timeArray_temperatura;
//en un bucle for obtenemos en cada iteración el valor númerico y 
//el TIMESTAMP del tiempo y lo almacenamos en los arrays 
for($i = 0 ;$i<count($rawdata_temperatura);$i++){
    $valoresArray_temperatura[$i]= $rawdata_temperatura[$i][1];
    //OBTENEMOS EL TIMESTAMP
    $time_temperatura= $rawdata_temperatura[$i]['Hora'];
    $date_temperatura = new DateTime($time_temperatura);
    //ALMACENAMOS EL TIMESTAMP EN EL ARRAY
    $timeArray_temperatura[$i] = $date_temperatura->getTimestamp()*1000;
}

?>
<div id="contenedor_temperatura"></div>

<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
var data_temperatura2 = [];
chartCPU_temperatura = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor_temperatura'
        //defaultSeriesType: 'spline'

    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Temperatura'
    },
    xAxis: {
        type: 'datetime'
        //tickPixelInterval: 150,
        //maxZoom: 20 * 1000
    },
    yAxis: {
        minPadding: 0.2,
        maxPadding: 0.2,
        title: {
            text: 'Temperatura C°',
            margin: 20
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generate an array of random data
                //var data = [];
                <?php
                    for($i = 0 ;$i<count($rawdata_temperatura);$i++){
                ?>
                data_temperatura2.push([<?php echo $timeArray_temperatura[$i];?>,<?php echo $valoresArray_temperatura[$i];?>]);
                <?php } ?>
                return data_temperatura2;
            })()
    }],
    credits: {
            enabled: false
    }
});
</script>   
