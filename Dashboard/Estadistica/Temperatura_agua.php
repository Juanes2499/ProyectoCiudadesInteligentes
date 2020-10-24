<?php
//require('./../../PHP/Server.php');
$valoresArray_temperatura_agua;
$timeArray_temperatura_agua;
$Json_TAG;
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

    $Json_TAG = json_decode($Respuesta);
    $Tamaño_TAG = count($Json_TAG);

    if($Tamaño_TAG>0){
        for($i = 0 ;$i<count($Json_TAG);$i++){
            $valoresArray_temperatura_agua[$i]= $Json_TAG[$i]->Temperatura_agua;
            $time_temperatura_agua = $Json_TAG[$i]->Hora;
            $date_temperatura_agua= new DateTime($time_temperatura_agua);
            $timeArray_temperatura_agua[$i] = $date_temperatura_agua->getTimestamp()*1000;
        }
    }
}
?>
<div id="contenedor_temperatura_agua"></div>

<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
var data_temperatura_agua2 = [];
chartCPU_temperatura_agua = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor_temperatura_agua'
        //defaultSeriesType: 'spline'
    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Temperatura agua'
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
            text: 'Temperatura agua C°',
            margin: 20
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generar la gráfica
                <?php
                    for($i = 0 ;$i<count($Json_TAG);$i++){
                ?>
                data_temperatura_agua2.push([<?php echo $timeArray_temperatura_agua[$i];?>,<?php echo $valoresArray_temperatura_agua[$i];?>]);
                <?php } ?>
                return data_temperatura_agua2;
            })()
    }],
    credits: {
            enabled: false
    }
});
</script>   