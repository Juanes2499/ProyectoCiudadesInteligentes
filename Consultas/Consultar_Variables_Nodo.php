<?php 
require('../PHP/Server.php');
?>
<hr/>
<h2>Resultado variables</h2>           
<h4>Variables climatológicas</h4>
<div class="row mt-5">
    <table class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID Nodo</th>
                <th>Temperatura</th>
                <th>Humedad</th>
                <th>Velocidad viento</th>
                <th>Dirección viento</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
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

                $Json = json_decode($Respuesta);
                $Tamaño = count($Json);

                if($Tamaño>0){
                    for ($i = 0; $i<$Tamaño;$i++){
                        $IDN = $Json[$i]->NumNodo;
                        $TA = $Json[$i]->Temperatura;
                        $H = $Json[$i]->Humedad;
                        $VV = $Json[$i]->Vel_viento;
                        $DV = $Json[$i]->Dir_Viento;
                        $F = $Json[$i]->Fecha;
                        $Hra = $Json[$i]->Hora; 
                    ?>
                    <tr>
                        <td> <?php echo $IDN;?> </td>
                        <?php
                        if ($TA>30){ ?>
                            <td class="table-danger text-secondary"> <?php echo $TA;?> </td>
                        <?php }
                        else if($TA>=16 && $TA<=30){?>
                            <td class="table-warning text-secondary"> <?php echo $TA;?> </td>
                        <?php }
                        else if($TA<16){ ?>
                            <td class="table-success text-secondary"> <?php echo $TA;?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($H<35){ ?>
                            <td class="table-danger text-secondary"> <?php echo $H;?> </td>
                        <?php }
                        else if($H>=35 && $H<=70){?>
                            <td class="table-warning text-secondary"> <?php echo $H;?> </td>
                        <?php }
                        else if($H>35){ ?>
                            <td class="table-success text-secondary"> <?php echo $H;?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($VV>28){ ?>
                            <td class="table-danger text-secondary"> <?php echo $VV;?> </td>
                        <?php }
                        else if($VV>=20 && $VV<=28){?>
                            <td class="table-warning text-secondary"> <?php echo $VV;?> </td>
                        <?php }
                        else if($VV<20){ ?>
                            <td class="table-success text-secondary"> <?php echo $VV;?> </td>
                        <?php } ?>
                        <td> <?php echo $DV;?> </td>
                        <td> <?php echo $F;?> </td>
                        <td> <?php echo $Hra;?> </td>
                    </tr>
                <?php }
                }
            }else if(empty($_SESSION["ID_Nodo"])){?>
                <tr> 
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

          
<h4>Variables del río</h4>
<div class="row mt-5">
    <table class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID Nodo</th>
                <th>Temperatura agua</th>
                <th>Nivel agua</th>
                <th>Caudal</th>
                <th>Flujo</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
            if(isset($_SESSION["ID_Nodo"])){
                $ID = $_SESSION["ID_Nodo"];
                $url = "http://$Host_Sever/api/MySql/GET_JSON_DEN/$ID";
                $curl = curl_init($url);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                $Respuesta = curl_exec($curl);
                curl_close($curl);

                if($Respuesta == false){
                    curl_close($curl);
                    die('Error en la comunicación con el servidor');
                }

                $Json = json_decode($Respuesta);
                $Tamaño = count($Json);

                if($Tamaño>0){
                    for ($i = 0; $i<$Tamaño;$i++){
                        $IDN = $Json[$i]->NumNodo;
                        $TAG = $Json[$i]->Temperatura_agua;
                        $NA = $Json[$i]->Nivel_agua;
                        $C = $Json[$i]->Caudal;
                        $FL = $Json[$i]->Flujo;
                        $F = $Json[$i]->Fecha;
                        $Hra = $Json[$i]->Hora; 
                    ?>
                    <tr> 
                        <td> <?php echo $IDN;?> </td>
                        <?php
                        if ($TAG>30){ ?>
                            <td class="table-danger text-secondary"> <?php echo $TAG;?> </td>
                        <?php }
                        else if($TAG>=16 && $TAG<=30){?>
                            <td class="table-warning text-secondary"> <?php echo $TAG;?> </td>
                        <?php }
                        else if($TAG<16){ ?>
                            <td class="table-success text-secondary"> <?php echo $TAG;?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($NA>7){ ?>
                            <td class="table-danger text-secondary"> <?php echo $NA;?> </td>
                        <?php }
                        else if($NA>=4 && $NA<=7){ ?>
                            <td class="table-warning text-secondary"> <?php echo $NA;?> </td>
                        <?php }
                        else if($NA<4) { ?>
                            <td class="table-success text-secondary"> <?php echo $NA;?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($C>4){ ?>
                            <td class="table-danger text-secondary"> <?php echo $C;?> </td>
                        <?php }
                        else if($C>=2 && $C<=4){ ?>
                            <td class="table-warning text-secondary"> <?php echo $C;?> </td>
                        <?php }
                        else if($C<2){ ?>
                            <td class="table-success text-secondary"> <?php echo $C;?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($FL>4){ ?>
                            <td class="table-danger text-secondary"> <?php echo $FL;?> </td>
                        <?php }
                        else if($FL>=2 && $FL<=4){ ?>
                            <td class="table-warning text-secondary"> <?php echo $FL;?> </td>
                        <?php }
                        else if($FL<2){ ?>
                            <td class="table-success text-secondary"> <?php echo $FL;?> </td>
                        <?php } ?>

                        <td> <?php echo $F;?> </td>
                        <td> <?php echo $Hra;?> </td>
                    </tr>
                <?php }}
            }else if(empty($_SESSION["ID_Nodo"])){?>
                <tr> 
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                    <td> null </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>