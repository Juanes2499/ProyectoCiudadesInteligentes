<?php
require("../PHP/Server.php");
//require("Sentencia_estadistica.php");   
$valoresArray_temperatura = [];
$timeArray_temperatura = [];
$Json_TA;
if(isset($_POST["ConsultarEstadistica"])){
    $IDN = $_POST['NodosDisponibles'];
    $year2 = $_POST['Year2'];
    $month2 = $_POST['Month2'];
    $day2 = $_POST['Day2'];
    $url = "http://$Host_Sever/api/MySql/GET_JSON_Fecha//$year2/$month2/$day2/&/NE/$IDN";
    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $Respuesta = curl_exec($curl);
    curl_close($curl);

    if($Respuesta == false){
        //curl_close($curl);
        die('Error en la comunicación con el servidor');
    }

    $Json_TA = json_decode($Respuesta);
    $Tamaño_TA = count($Json_TA);

    if($Tamaño_TA>0){
        for ($i = 0; $i<$Tamaño_TA;$i++){
            $valoresArray_temperatura[$i]= $Json_TA[$i]->Temperatura;
            $time_temperatura= $Json_TA[$i]->Hora;
            $date_temperatura = new DateTime($time_temperatura);
            $timeArray_temperatura[$i] = $date_temperatura->getTimestamp()*1000;
        }
    }
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
        type: 'time'
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
                //generar la gráfica
                <?php
                    for($i = 0 ;$i<count($Json_TA);$i++){
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
