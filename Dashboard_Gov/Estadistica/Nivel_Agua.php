<?php
//require('./../../PHP/Server.php');
$valoresArray_Niv_agua = [];
$timeArray_Niv_agua = [];
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

    $Json_NV = json_decode($Respuesta);
    $Tamaño_NV = count($Json_NV);

    if($Tamaño_NV>0){
        for($i = 0 ;$i<count($Json_NV);$i++){
            $valoresArray_Niv_agua[$i]= $Json_NV[$i]->Nivel_agua;
            $time_Niv_agua= $Json_NV[$i]->Hora;
            $date_Niv_agua = new DateTime($time_Niv_agua);
            $timeArray_Niv_agua[$i] = $date_Niv_agua->getTimestamp()*1000;
        }
    }
}
?>
<div id="contenedor_Niv_agua"></div>

<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
var data_Niv_agua2 = [];
chartCPU_Niv_agua = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor_Niv_agua'
        //defaultSeriesType: 'spline'

    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Nivel de agua'
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
            text: 'Nivel de agua m',
            margin: 20
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generar la gráfica
                <?php
                    for($i = 0 ;$i<count($Json_NV);$i++){
                ?>
                data_Niv_agua2.push([<?php echo $timeArray_Niv_agua[$i];?>,<?php echo $valoresArray_Niv_agua[$i];?>]);
                <?php } ?>
                return data_Niv_agua2;
            })()
    }],
    credits: {
            enabled: false
    }
});
</script>   