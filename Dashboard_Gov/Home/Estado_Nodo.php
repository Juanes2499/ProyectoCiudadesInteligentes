<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Estado del nodo</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php
            $HS = $_SESSION['Host_Server'];
            if (isset($_SESSION['sesion_iniciada_Gov'])) {
                $url = "http://$HS/api/MySql/Get_JSON_DN/0";
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
                        $Num_Nodo = $Json_DN[$i]->NumNodo;
                        //echo $Num_Nodo;
                        $Estado = $Json_DN[$i]->Estado;
                        ?>
                        
                        <div>
                             <?php 
                                if($Estado == "Activo"){?> 
                                    <h6>Estado del nodo: <?php echo $Num_Nodo; ?> es:  <a class="text-success"><?php echo $Estado; ?></a><?php 
                                }else if($Estado == "Desactivado"){ ?>
                                    <h6>Estado del nodo: <?php echo $Num_Nodo; ?> es:  <a class="text-danger"><?php echo $Estado; ?></a><?php 
                                }?></h6>
                        </div>
                        <?php
                    }
                }
            }        
        ?>
    </div>
    <!-- /.card-body -->
</div>