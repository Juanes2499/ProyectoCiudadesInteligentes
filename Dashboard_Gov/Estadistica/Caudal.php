<?php
//require('./../../PHP/Server.php');
$valoresArray_Caudal = [];
$timeArray_Caudal = [];
$Json_NV;
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

    $Json_C= json_decode($Respuesta);
    $Tamaño_C = count($Json_C);

    if($Tamaño_C>0){
        for($i = 0 ;$i<count($Json_C);$i++){
            $valoresArray_Caudal[$i]= $Json_C[$i]->Caudal;
            $time_Caudal= $Json_C[$i]->Hora;
            $date_Caudal = new DateTime($time_Caudal);
            $timeArray_Caudal[$i] = $date_Caudal->getTimestamp()*1000;
        }
    }
}
?>
<div id="contenedor_Caudal"></div>

<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
var data_Caudal2 = [];
chartCPU_Caudal = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor_Caudal'
        //defaultSeriesType: 'spline'

    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Caudal'
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
            text: 'Caudal L/min',
            margin: 20
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generar la gráfica
                <?php
                    for($i = 0 ;$i<count($Json_C);$i++){
                ?>
                data_Caudal2.push([<?php echo $timeArray_Caudal[$i];?>,<?php echo $valoresArray_Caudal[$i];?>]);
                <?php } ?>
                return data_Caudal2;
            })()
    }],
    credits: {
            enabled: false
    }
});
</script>   