<?php
    require('../PHP/Server.php');
    require('../PHP/DatosBD.php');
    //Conexión con la base de datos y el servidor
    //$conexion = mysqli_connect($db_host,$db_usuario,$db_contraseña,$db_nombre, 3306);
    if (mysqli_connect_errno()) {
        echo'
            <script>
                alert("Fallo en la conexión con la base de datos ");
                location.href="../Login/User_Ciud.php";
            </script>';
        exit();
    }

    mysqli_select_db($conexion,$db_nombre) or die ("no se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");
?>
<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Fecha y hora de un nodo específico</h3>
    </div>
    <div class="card-body ">
        <form action="Dashboard_Ciud_Fecha.php" method="post" name="FH2">
            <div class="row align-content-center">
                Año:
                <div class="col-md-2">
                    <input type="text" class="form-control" name='Year2'>
                </div>
                Mes:
                <div class="col-md-2">
                    <input type="text" class="form-control" name='Month2'>
                </div>
                Día:
                <div class="col-md-2">
                    <input type="text" class="form-control" name='Day2'>
                </div>
                
                <div class="col-md-3">
                    <select class="form-control" name="NodosDisponibles">
                        <option value="0">Seleccionar nodo sensor</option>
                        <?php 
                    if(isset($_SESSION["Nombre_User"])){
                        $Consultar_nodo = "SELECT * FROM datosnodo";
                        $Respuesta_nodo = mysqli_query($conexion,$Consultar_nodo);
                        while($Tabla_Nodo = mysqli_fetch_array($Respuesta_nodo)){ 
                            $Num_N = $Tabla_Nodo['NumNodo']; 
                            $_SESSION["ID_Nodo"]=$Num_N;
                            $Num_Cuenta = count($Num_N);
                            for($i = 0; $i<$Num_Cuenta; $i++){
                                $_SESSION["Cantidad_nodos"]=$Num_N[$i];
                            ?>
                                <option value="<?php echo $Num_N[$i];?>"> Nodo sensor <?php echo $Num_N[$i];?> </option>

                        <?php }
                        }   
                        }else {
                            header("Location:../Login/User_Gov.php");  
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="ConultarFecha2" class="btn btn-success">Realizar consulta</button>
                </div>
            </div>
        </form>

        <div class="row mt-5">
            <table class="table">
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
            if(isset($_POST['ConultarFecha2'])){
                $IDN = $_POST['NodosDisponibles'];
                $year2 = $_POST['Year2'];
                $month2 = $_POST['Month2'];
                $day2 = $_POST['Day2'];
                $url2 = "http://$Host_Sever/api/MySql/GET_JSON_Fecha//$year2/$month2/$day2/&/NE/$IDN";
                $curl2 = curl_init($url2);
                curl_setopt($curl2,CURLOPT_RETURNTRANSFER,true);
                $Respuesta2 = curl_exec($curl2);
                curl_close($curl2);

                if($Respuesta2 == false){
                    //curl_close($curl);
                    die('Error en la comunicación con el servidor');
                }

                $Json2 = json_decode($Respuesta2);
                $Tamaño2 = count($Json2);

                if($Tamaño2>0){
                    for ($i = 0; $i<$Tamaño2;$i++){
                        $IDN = $Json2[$i]->NumNodo;
                        $TA = $Json2[$i]->Temperatura;
                        $H = $Json2[$i]->Humedad;
                        $VV = $Json2[$i]->Vel_viento;
                        $DV = $Json2[$i]->Dir_Viento;
                        $F = $Json2[$i]->Fecha;
                        $Hra = $Json2[$i]->Hora; 
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
            }else if(empty($_POST['ConultarFecha2'])){?>
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

        <div class="row mt-5">
            <table class="table     ">
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
            if(isset($_POST['ConultarFecha2'])){
                $IDN = $_POST['NodosDisponibles'];
                $year2 = $_POST['Year2'];
                $month2 = $_POST['Month2'];
                $day2 = $_POST['Day2'];
                $url2 = "http://$Host_Sever/api/MySql/GET_JSON_Fecha//$year2/$month2/$day2/&/NE/$IDN";
                $curl2 = curl_init($url2);
                curl_setopt($curl2,CURLOPT_RETURNTRANSFER,true);
                $Respuesta2 = curl_exec($curl2);
                curl_close($curl2);

                if($Respuesta2 == false){
                    curl_close($curl2);
                    die('Error en la comunicación con el servidor');
                }

                $Json2 = json_decode($Respuesta2);
                $Tamaño2 = count($Json2);

                if($Tamaño2>0){
                    for ($i = 0; $i<$Tamaño2;$i++){
                        $IDN = $Json2[$i]->NumNodo;
                        $TAG = $Json2[$i]->Temperatura_agua;
                        $NA = $Json2[$i]->Nivel_agua;
                        $C = $Json2[$i]->Caudal;
                        $FL = $Json2[$i]->Flujo;
                        $F = $Json2[$i]->Fecha;
                        $Hra = $Json2[$i]->Hora; 
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
            }else if(empty($_POST['ConultarFecha2'])){?>
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
    </div>
</div>