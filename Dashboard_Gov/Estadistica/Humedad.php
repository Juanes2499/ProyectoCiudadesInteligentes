<?php
//require('./../../PHP/Server.php');
$valoresArray_Humedad = [];
$timeArray_Humedad = [];
$Json_H;
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

    $Json_H = json_decode($Respuesta);
    $Tamaño_H = count($Json_H);

    if($Tamaño_H>0){
        for ($i = 0; $i<$Tamaño_H;$i++){
            $valoresArray_Humedad[$i]= $Json_H[$i]->Humedad;
            $time_Humedad = $Json_H[$i]->Hora; 
            $date_Humedad = new DateTime($time_Humedad);
            $timeArray_Humedad[$i] = $date_Humedad->getTimestamp()*1000;
        }
    }
}
?>
<div id="contenedor_humedad"></div>

<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
var data_Humedad2 = [];
chartCPU_Humedad = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor_humedad'
        //defaultSeriesType: 'spline'

    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Humedad'
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
            text: 'Humedad %',
            margin: 20
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generar la gráfica
                <?php
                    for($i = 0 ;$i<count($Json_H);$i++){
                ?>
                data_Humedad2.push([<?php echo $timeArray_Humedad[$i];?>,<?php echo $valoresArray_Humedad[$i];?>]);
                <?php } ?>
                return data_Humedad2;
            })()
    }],
    credits: {
            enabled: false
    }
});
</script>   