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
                $Consultar_datos_amb = "SELECT ID_Arduino, Temperatura, Humedad, Vel_viento, Dir_Viento, Fecha, Hora FROM `datos_arduino_ambiente` WHERE ID_Arduino = $ID";
                $Respuesta_datos_amb = mysqli_query($conexion,$Consultar_datos_amb);
                while($Row_Datos = mysqli_fetch_array($Respuesta_datos_amb)){ 
                    ?>
                    <tr>
                        <td> <?php echo $Row_Datos['ID_Arduino'];?> </td>
                        <?php
                        if ($Row_Datos['Temperatura']>30){ ?>
                            <td class="table-danger text-secondary"> <?php echo $Row_Datos['Temperatura'];?> </td>
                        <?php }
                        else if($Row_Datos['Temperatura']>=16 && $Row_Datos['Temperatura']<=30){?>
                            <td class="table-warning text-secondary"> <?php echo $Row_Datos['Temperatura'];?> </td>
                        <?php }
                        else if($Row_Datos['Temperatura']<16){ ?>
                            <td class="table-success text-secondary"> <?php echo $Row_Datos['Temperatura'];?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($Row_Datos['Humedad']<35){ ?>
                            <td class="table-danger text-secondary"> <?php echo $Row_Datos['Humedad'];?> </td>
                        <?php }
                        else if($Row_Datos['Humedad']>=35 && $Row_Datos['Humedad']<=70){?>
                            <td class="table-warning text-secondary"> <?php echo $Row_Datos['Humedad'];?> </td>
                        <?php }
                        else if($Row_Datos['Humedad']>35){ ?>
                            <td class="table-success text-secondary"> <?php echo $Row_Datos['Humedad'];?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($Row_Datos['Vel_viento']>28){ ?>
                            <td class="table-danger text-secondary"> <?php echo $Row_Datos['Vel_viento'];?> </td>
                        <?php }
                        else if($Row_Datos['Vel_viento']>=20 && $Row_Datos['Vel_viento']<=28){?>
                            <td class="table-warning text-secondary"> <?php echo $Row_Datos['Vel_viento'];?> </td>
                        <?php }
                        else if($Row_Datos['Vel_viento']<20){ ?>
                            <td class="table-success text-secondary"> <?php echo $Row_Datos['Vel_viento'];?> </td>
                        <?php } ?>
                        <td> <?php echo $Row_Datos['Dir_Viento'];?> </td>
                        <td> <?php echo $Row_Datos['Fecha'];?> </td>
                        <td> <?php echo $Row_Datos['Hora'];?> </td>
                    </tr>
                <?php }
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
                $Consultar_datos_ag = "SELECT ID_Arduino, Temperatura_agua, Nivel_agua, Caudal, Flujo, Fecha, Hora FROM datos_arduino_agua WHERE ID_Arduino = $ID";
                $Respuesta_datos_ag = mysqli_query($conexion,$Consultar_datos_ag);
                while($Row_Datos = mysqli_fetch_array($Respuesta_datos_ag)){ 
                    ?>
                    <tr> 
                        <td> <?php echo $Row_Datos['ID_Arduino'];?> </td>
                        <?php
                        if ($Row_Datos['Temperatura_agua']>30){ ?>
                            <td class="table-danger text-secondary"> <?php echo $Row_Datos['Temperatura_agua'];?> </td>
                        <?php }
                        else if($Row_Datos['Temperatura_agua']>=16 && $Row_Datos['Temperatura_agua']<=30){?>
                            <td class="table-warning text-secondary"> <?php echo $Row_Datos['Temperatura_agua'];?> </td>
                        <?php }
                        else if($Row_Datos['Temperatura_agua']<16){ ?>
                            <td class="table-success text-secondary"> <?php echo $Row_Datos['Temperatura_agua'];?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($Row_Datos['Nivel_agua']>7){ ?>
                            <td class="table-danger text-secondary"> <?php echo $Row_Datos['Nivel_agua'];?> </td>
                        <?php }
                        else if($Row_Datos['Nivel_agua']>=4 && $Row_Datos['Nivel_agua']<=7){ ?>
                            <td class="table-warning text-secondary"> <?php echo $Row_Datos['Nivel_agua'];?> </td>
                        <?php }
                        else if($Row_Datos['Nivel_agua']<4) { ?>
                            <td class="table-success text-secondary"> <?php echo $Row_Datos['Nivel_agua'];?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($Row_Datos['Caudal']>4){ ?>
                            <td class="table-danger text-secondary"> <?php echo $Row_Datos['Caudal'];?> </td>
                        <?php }
                        else if($Row_Datos['Caudal']>=2 && $Row_Datos['Caudal']<=4){ ?>
                            <td class="table-warning text-secondary"> <?php echo $Row_Datos['Caudal'];?> </td>
                        <?php }
                        else if($Row_Datos['Caudal']<2){ ?>
                            <td class="table-success text-secondary"> <?php echo $Row_Datos['Caudal'];?> </td>
                        <?php } ?>
                        
                        <?php
                        if ($Row_Datos['Flujo']>4){ ?>
                            <td class="table-danger text-secondary"> <?php echo $Row_Datos['Flujo'];?> </td>
                        <?php }
                        else if($Row_Datos['Flujo']>=2 && $Row_Datos['Flujo']<=4){ ?>
                            <td class="table-warning text-secondary"> <?php echo $Row_Datos['Flujo'];?> </td>
                        <?php }
                        else if($Row_Datos['Flujo']<2){ ?>
                            <td class="table-success text-secondary"> <?php echo $Row_Datos['Flujo'];?> </td>
                        <?php } ?>

                        <td> <?php echo $Row_Datos['Fecha'];?> </td>
                        <td> <?php echo $Row_Datos['Hora'];?> </td>
                    </tr>
                <?php }
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