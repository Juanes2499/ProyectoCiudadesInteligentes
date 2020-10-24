<?php 
    require('../PHP/Server.php');
    $Num_Nodo = array();
    $Longitud = array();
    $Latitud = array();
    if (isset($_SESSION['sesion_iniciada_Gov'])) {
        $urlm = "http://$Host_Sever/api/MySql//Get_JSON_DN/0";
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
                $Estado = $Json_DNm[$i]->Estado;
                //for($j = 0; $j < count($Json_DNm); $j++){
                    ?>
                    <script>
                        L.marker([<?php echo $Latitud; ?>, <?php echo $Longitud; ?>]).bindPopup('Nodo sensor <?php echo $Num_Nodo; ?>: <?php echo $Estado; ?> ').addTo(Nodos)
                    </script>
                    <?php
                //}
            }
            ?>
            <div>
            <div id="map" style="width:100%; height: 400px;"></div>
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
</br>

<?php

require('Consultar_nodo_sensor.php');
$ID_Nodo = array();
$ID_Nodo2 = array();
$Num_Nodo = 0;
$Longitud = 0;
$Latitud =  0;
$Estado = "";
$Bateria = 0;
if (isset($_POST['NodosDisponibles'])) {
    $ID=$_POST['NodosDisponibles'];
    $url = "http://$Host_Sever/api/MySql//Get_JSON_DN/$ID";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $Respuesta = curl_exec($curl);
    curl_close($curl);

    if ($Respuesta == false) {
        //curl_close($curl);
        die('Error en la comunicación con el servidor');
    }

    $Json_DN = json_decode($Respuesta);
    $Tamaño_DN = count($Json_DN);

    if ($Tamaño_DN > 0) {
        for ($i = 0; $i < count($Json_DN); $i++) {
            $ID_Nodo = $Json_DN[$i]->ID_Nodo;
            $_SESSION['IDN']= $ID_Nodo;
            $Num_Nodo = $Json_DN[$i]->NumNodo;
            $Longitud = $Json_DN[$i]->Longitud;
            $Latitud = $Json_DN[$i]->Latitud;
            $Bateria = $Json_DN[$i]->Bateria;
            $Estado = $Json_DN[$i]->Estado;
?>
            <!--  CARDS -->
            <form action="Config_nodo/Acciones_Config_nodo.php" method="post" name="CND">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-wrench"></i>
                            Nodo sensor <?php echo $Num_Nodo; ?>
                        </h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-warning" name="ActNodo" style="margin-left:0%;">Actualizar nodo</button>
                            <button type="submit" class="btn btn-danger" name="EliNodo" style="margin-left:0%;">Eliminar nodo</button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
                        </div>
                    </div>
                    <!--  CARDS BODY -->
                    
                    <div class="card-body">
                        <h4 class="text-muted">Identificación del nodo</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID Nodo</span>
                            </div>
                            <input type="text" class="form-control" placeholder="<?php echo $ID_Nodo; ?>" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Número Nodo</span>
                            </div>
                            <input type="text" name="NN" class="form-control" value="<?php echo $Num_Nodo; ?>">
                        </div>

                        <h4 class="text-muted">Ubicación del nodo</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Longitud</span>
                            </div>
                            <input type="text" name="Lon" class="form-control" value="<?php echo $Longitud; ?>">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Latitud</span>
                            </div>
                            <input type="text" name="Lat"  class="form-control" value="<?php echo $Latitud; ?>">
                        </div>

                        <h4 class="text-muted">Bateria del nodo</h4>
                        <div>
                            <?php
                            if ($Bateria > 60) {
                            ?>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width:<?php echo $Bateria, '%'; ?>">
                                        </div>
                                    </div>
                                    <small>
                                        <?php echo $Bateria, '%'; ?> de batería.
                                    </small>
                                </td>
                            <?php
                            } else if ($Bateria <= 60 && $Bateria >= 30) {
                            ?>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width:<?php echo $Bateria, '%'; ?>">
                                        </div>
                                    </div>
                                    <small>
                                        <?php echo $Bateria, '%'; ?> de batería.
                                    </small>
                                </td>
                            <?php
                            } else if ($Bateria < 30) {
                            ?>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width:<?php echo $Bateria, '%'; ?>">
                                        </div>
                                    </div>
                                    <small>
                                        <?php echo $Bateria, '%'; ?> de batería.
                                    </small>
                                </td>
                            <?php
                            }
                            ?>
                        </div>

                        <h4 class="text-muted">Estado del nodo</h4>
                        <h6 class="text-muted">Escribir Activo o Desactivado</h6>
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Estado</span>
                                </div>
                                <input type="text" name="Est" class="form-control" value="<?php echo $Estado; ?>">
                            </div>
                        </div> 
                    </div>
                    <!-- /.card-body-->
                </div>
            </form>
            <!-- /.card -->
        <?php

        }
    }
}
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>