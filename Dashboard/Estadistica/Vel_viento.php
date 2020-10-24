<?php
//require('./../../PHP/Server.php');
$valoresArray_Vel_viento = [];
$timeArray_Vel_viento = [];
$Json_VV;
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

    $Json_VV = json_decode($Respuesta);
    $Tamaño_VV = count($Json_VV);

    if($Tamaño_VV>0){
        for($i = 0 ;$i<count($Json_VV);$i++){
            $valoresArray_Vel_viento[$i]= $Json_VV[$i]->Vel_viento;
            $time_Vel_viento= $Json_VV[$i]->Hora;
            $date_Vel_viento = new DateTime($time_Vel_viento);
            $timeArray_Vel_viento[$i] = $date_Vel_viento->getTimestamp()*1000;
        }
    }
}
?>
<div id="contenedor_Vel_viento"></div>

<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
var data_Vel_viento2 = [];
chartCPU_Vel_viento = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor_Vel_viento'
        //defaultSeriesType: 'spline'

    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Velocidad viento'
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
            text: 'Velocidad viento Km/H',
            margin: 20
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generar la gráfica
                <?php
                    for($i = 0 ;$i<count($Json_VV);$i++){
                ?>
                data_Vel_viento2.push([<?php echo $timeArray_Vel_viento[$i];?>,<?php echo $valoresArray_Vel_viento[$i];?>]);
                <?php } ?>
                return data_Vel_viento2;
            })()
    }],
    credits: {
            enabled: false
    }
});
</script>   