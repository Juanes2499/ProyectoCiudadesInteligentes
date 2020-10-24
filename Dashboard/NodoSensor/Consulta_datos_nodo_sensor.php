<?php
require('../PHP/Server.php');
$ID_Nodo = array();
$ID_Nodo2 = array();
$Num_Nodo = 0;
$Longitud = 0;
$Latitud =  0;
$Estado = "";
$Bateria = 0;
if (isset($_SESSION['sesion_iniciada'])) {
    $url = "http://$Host_Sever/api/MySql/Get_JSON_DNP";
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
            $Num_Nodo = $Json_DN[$i]->NumNodo;
            $Longitud = $Json_DN[$i]->Longitud;
            $Latitud = $Json_DN[$i]->Latitud;
            $Bateria = $Json_DN[$i]->Bateria;
            $Estado = $Json_DN[$i]->Estado;

            $Prom_TA = $Json_DN[$i]->PROM_TA;
            $Prom_H = $Json_DN[$i]->PROM_H;
            $Prom_VV = $Json_DN[$i]->PROM_VV;
            $Prom_TAG = $Json_DN[$i]->PROM_TAG;
            $Prom_NA = $Json_DN[$i]->PROM_NA;
            $Prom_F = $Json_DN[$i]->PROM_F;
            $Prom_C = $Json_DN[$i]->PROM_C;

?>
            <!--  CARDS -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Nodo sensor <?php echo $Num_Nodo; ?>
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class='row'>
                        <!-- Datos nodo izquierdo -->
                        <div class='col-md-6'>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ID Nodo</span>
                                </div>
                                <input type="text" class="form-control" placeholder="<?php echo $ID_Nodo; ?>">
                            </div>

                            <h4 class="text-muted">Ubicación del nodo</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Longitud</span>
                                </div>
                                <input type="text" class="form-control" placeholder="<?php echo $Longitud; ?>">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Latitud</span>
                                </div>
                                <input type="text" class="form-control" placeholder="<?php echo $Latitud; ?>">
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
                            <div>
                                <?php
                                if ($Estado == "Activo") {
                                ?>
                                    <button type="button" class="btn btn-success btn-block">Nodo activado</button>
                                <?php
                                } else if ($Estado == "Desactivado") {
                                ?>
                                    <button type="button" class="btn btn-danger btn-block">Nodo desactivado</button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /Datos nodo izquierdo -->

                        <!-- promedio variables nodo derecho -->
                        <div class='col-md-6'>
                            <div class='row'>
                                <!-- izquierdo -->
                                <div class="col-md-6">
                                    <!-- Temperatura -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Temperatura ambiente</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php echo $Prom_TA; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- Velocidad viento -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Velocidad del viento</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php echo $Prom_VV; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- Nivel río -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Nivel del río</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php echo $Prom_NA; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- Caudal -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Caudal del río</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php echo $Prom_C; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /izquierdo -->

                                <!--- derecho -->
                                <div class="col-md-6">
                                    <!-- Humedad -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Humedad</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php echo $Prom_H; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- Temperatura del rio -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Temperatura del rio</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php echo $Prom_TAG; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- Flujo -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Flujo del río</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <?php echo $Prom_F; ?>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /derecho -->
                            </div>
                        </div>
                        <!-- promedio variables nodo derecho -->
                    </div>
                </div>
                <!-- /.card-body-->
            </div>
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