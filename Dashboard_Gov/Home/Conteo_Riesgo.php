<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Nodos</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php 
            require('../PHP/Server.php');
            $HS = $_SESSION['Host_Server'];
            $contador = 0;
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

                $Tam = intval($Tamaño_DNm);
                //echo $Tam;

                for ($i = 0; $i < $Tam; $i++) {
                    $ID =  intval($i)+1;
                    //echo $ID;

                    $urlm2 = "http://$Host_Sever/api/MySql/GET_JSON_DENE/$ID";
                    $curlm2 = curl_init($urlm2);
                    curl_setopt($curlm2, CURLOPT_RETURNTRANSFER, true);
                    $Respuestam2 = curl_exec($curlm2);
                    curl_close($curlm2);
                
                    if ($Respuestam2 == false) {
                        //curl_close($curl);
                        die('Error en la comunicación con el servidor');
                    }
                
                    $Json_DNm2 = json_decode($Respuestam2);
                    $Tamaño_DNm2 = count($Json_DNm);
                
                
                    if ($Tamaño_DNm2 > 0) {
                        for ($j = 0; $j < count($Json_DNm2); $j++) {
                            $Num_Nodo = $Json_DNm2[$j]->NumNodo;
                            $Ult_Lluvia = $Json_DNm2[$j]->Nivel_agua;
                            //echo $Ult_Lluvia;

                            if($Ult_Lluvia >= 4){
                                $contador = $contador+1;
                             }

                        }
                    }
                }
                ?>
                <div>
                    <h1><?php echo "Nodos críticos: ".$contador; ?></h1>
                </div>
                <?php
                
            }
        ?>
    </div>
    <!-- /.card-body -->
</div>