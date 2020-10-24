<?php
//require('./../../PHP/Server.php');
$valoresArray_Flujo = [];
$timeArray_Flujo = [];
$Json_F;
if(isset($_SESSION["ID_Nodo"])){
    $ID = $_SESSION["ID_Nodo"];
    $url = "http://$Host_Sever/api/MySql/GET_JSON_DEN/$ID";
    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $Respuesta = curl_exec($curl);
    curl_close($curl);

    if($Respuesta == false){
        //curl_close($curl);
        die('Error en la comunicación con el servidor');
    }

    $Json_F = json_decode($Respuesta);
    $Tamaño_F = count($Json_F);

    if($Tamaño_F>0){
        for($i = 0 ;$i<count($Json_F);$i++){
            $valoresArray_Flujo[$i]= $Json_F[$i]->Flujo;
            $time_Flujo= $Json_F[$i]->Hora;
            $date_Flujo = new DateTime($time_Flujo);
            $timeArray_Flujo[$i] = $date_Flujo->getTimestamp()*1000;
        }
    }
}
?>
<div id="contenedor_Flujo"></div>

<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
var data_Flujo2 = [];
chartCPU_Flujo = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor_Flujo'
        //defaultSeriesType: 'spline'

    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Flujo'
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
            text: 'Flujo L/min',
            margin: 20
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generar la gráfica
                <?php
                    for($i = 0 ;$i<count($Json_F);$i++){
                ?>
                data_Flujo2.push([<?php echo $timeArray_Flujo[$i];?>,<?php echo $valoresArray_Flujo[$i];?>]);
                <?php } ?>
                return data_Flujo2;
            })()
    }],
    credits: {
            enabled: false
    }
});
</script>   