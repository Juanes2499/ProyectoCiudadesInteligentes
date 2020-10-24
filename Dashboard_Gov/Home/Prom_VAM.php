<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Promedio general de variables climatológicas</h3>

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
                        $PTA = $Json_DN[$i]->PROM_TA;
                        $PH = $Json_DN[$i]->PROM_H;
                        $PVV = $Json_DN[$i]->PROM_VV;
                        ?>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div>
                                    <h4> Temperatura ambiental </h4>
                                </div>
                                <div>
                                    <?php 
                                        if ($PTA>30){ ?>
                                            <h5 class="text-danger"> <?php echo $PTA;?> </h5>
                                        <?php }
                                        else if($PTA>=16 && $PTA<=30){?>
                                            <h5 class="text-warning"> <?php echo $PTA;?> </h5>
                                        <?php }
                                        else if($PTA<16){ ?>
                                            <h5 class="text-success"> <?php echo $PTA;?> </h5>
                                        <?php }
                                    ?>
                                </div>
                                <div>
                                    Grados celsius
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div>
                                    <h4> Humedad</h4>
                                </div>
                                <div>
                                    <?php 
                                        if ($PH<35){ ?>
                                            <h5 class="text-danger"> <?php echo $PH;?> </h5>
                                        <?php }
                                        else if($PH>=35 && $PH<=70){?>
                                            <h5 class="text-warning"> <?php echo $PH;?> </h5>
                                        <?php }
                                        else if($PH>70){ ?>
                                            <h5 class="text-success"> <?php echo $PH;?> </h5>
                                        <?php }
                                    ?>
                                </div>
                                <div>
                                    Porciento
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div>
                                    <h4> Velocidad del viento </h4>
                                </div>
                                <div>
                                    <?php 
                                        if ($PVV>28){ ?>
                                            <h5 class="text-danger"> <?php echo $PVV;?> </h5>
                                        <?php }
                                        else if($PVV>=20 && $PVV<=28){?>
                                            <h5 class="text-warning"> <?php echo $PVV;?> </h5>
                                        <?php }
                                        else if($PVV<28){ ?>
                                            <h5 class="text-success"> <?php echo $PVV;?> </h5>
                                        <?php }
                                    ?>
                                </div>
                                <div>
                                    Km/h
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