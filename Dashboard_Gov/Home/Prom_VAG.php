<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Promedio general de variables del río</h3>

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
                $url = "http://$HS/api/MySql/Get_JSON_PVTN";
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
                        $PTAG = $Json_DN[$i]->PROM_TAG;
                        $PNA = $Json_DN[$i]->PROM_NA;
                        $PC = $Json_DN[$i]->PROM_C;
                        $PF = $Json_DN[$i]->PROM_F;
                        ?>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div>
                                    <h4> Temperatura agua</h4>
                                </div>
                                <div>
                                    <?php 
                                        if ($PTAG>30){ ?>
                                            <h5 class="text-danger"> <?php echo $PTAG;?> </h5>
                                        <?php }
                                        else if($PTAG>=16 && $PTAG<=30){?>
                                            <h5 class="text-warning"> <?php echo $PTAG;?> </h5>
                                        <?php }
                                        else if($PTAG<16){ ?>
                                            <h5 class="text-success"> <?php echo $PTAG;?> </h5>
                                        <?php }
                                    ?>
                                </div>
                                <div>
                                    Grados celsius
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div>
                                    <h4> Nivel del agua</h4>
                                </div>
                                <div>
                                    <?php 
                                        if ($PNA>7){ ?>
                                            <h5 class="text-danger"> <?php echo $PNA;?> </h5>
                                        <?php }
                                        else if($PNA>=4 && $PNA<=7){?>
                                            <h5 class="text-warning"> <?php echo $PNA;?> </h5>
                                        <?php }
                                        else if($PNA<4){ ?>
                                            <h5 class="text-success"> <?php echo $PNA;?> </h5>
                                        <?php }
                                    ?>
                                </div>
                                <div>
                                    Metros
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div>
                                    <h4> Caudal</h4>
                                </div>
                                <div>
                                    <?php 
                                        if ($PC>4){ ?>
                                            <h5 class="text-danger"> <?php echo $PC;?> </h5>
                                        <?php }
                                        else if($PC>=2 && $PC<=4){?>
                                            <h5 class="text-warning"> <?php echo $PC;?> </h5>
                                        <?php }
                                        else if($PC<2){ ?>
                                            <h5 class="text-success"> <?php echo $PC;?> </h5>
                                        <?php }
                                    ?>
                                </div>
                                <div>
                                    Litros/min
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div>
                                    <h4> Flujo </h4>
                                </div>
                                <div>
                                    <?php 
                                        if ($PF>4){ ?>
                                            <h5 class="text-danger"> <?php echo $PF;?> </h5>
                                        <?php }
                                        else if($PF>=2 && $PF<=4){?>
                                            <h5 class="text-warning"> <?php echo $PF;?> </h5>
                                        <?php }
                                        else if($PF<2){ ?>
                                            <h5 class="text-success"> <?php echo $PF;?> </h5>
                                        <?php }
                                    ?>
                                </div>
                                <div>
                                    Litros/min
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
            }        
        ?>
    </div>
    <!-- /.card-body -->
</div>