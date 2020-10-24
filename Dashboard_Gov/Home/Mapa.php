<?php 
    require('../PHP/Server.php');
    $HS = $_SESSION['Host_Server'];
    $Num_Nodo = array();
    $Longitud = array();
    $Latitud = array();
    if (isset($_SESSION['sesion_iniciada_Gov'])) {
        $urlm = "http://$HS/api/MySql/Get_JSON_DNP";
        $curlm = curl_init($urlm);
        curl_setopt($curlm, CURLOPT_RETURNTRANSFER, true);
        $Respuestam = curl_exec($curlm);
        curl_close($curlm);
    
        if ($Respuestam == false) {
            //curl_close($curl);
            die('Error en la comunicación con el servidor');
        }
    
        $Json_DNm = json_decode($Respuestam);
        $Tamaño_DNm = count($Json_DNm);
    
        ?>
            <script>
                //var L ;
                var Nodos = L.layerGroup();
            </script>
        <?php
        if ($Tamaño_DNm > 0) {
            for ($i = 0; $i < count($Json_DNm); $i++) {
                $ID_Nodo = $Json_DNm[$i]->ID_Nodo;
                $Num_Nodo = $Json_DNm[$i]->NumNodo;
                //echo $Num_Nodo;
                $Longitud = $Json_DNm[$i]->Longitud;
                $Latitud = $Json_DNm[$i]->Latitud;  
                $Estado = $Json_DNm[$i]->PROM_NA;
                //for($j = 0; $j < count($Json_DNm); $j++){
                    ?>
                    <script>
                        L.marker([<?php echo $Latitud; ?>, <?php echo $Longitud; ?>]).bindPopup('Nodo sensor <?php echo $Num_Nodo; ?>. Promedio nivel agua: <?php echo $Estado; ?> ').addTo(Nodos)
                    </script>
                    <?php
                //}
            }
            ?>
            <div>
            <div id="map" style="width:100%; height: 450px;"></div>
            <script>


                var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

                var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
                    streets  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

                var map = L.map('map', {
                    center: [3.452282, -76.474875],
                    zoom: 12,
                    layers: [streets, Nodos]
                });

                var baseLayers = {
                    "Grayscale": grayscale,
                    "Streets": streets
                };

                var overlays = {
                    "Nodos": Nodos
                };

                L.control.layers(baseLayers, overlays).addTo(map);

            </script>
            </div>
            <?php   
        }
    }
?>   
