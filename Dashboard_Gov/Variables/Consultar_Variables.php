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

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Variables</h3>
    </div>
    <div class="card-body ">
        <form action="Dashboard_Gov_Variables.php" method="post" name="FH">
            <div class="row">
                <div class="col-md-5">
                    <h4> Consultar variabes:</h4>
                    <select class="form-control" name="VarAMB_AG">
                        <option value="0"> Selecionar una varible </option>
                        <optgroup label="Variables ambientales">
                            <option value="1"> Temperatura ambiental </option>
                            <option value="2"> Humedad </option>
                            <option value="3"> Velocidad del viento </option>
                            <option value="4"> Dirección del viento </option>
                        </optgroup>
                        <optgroup label="Variables del río">
                            <option value="5"> Temperatura del rio </option>
                            <option value="6"> Nivel del agua </option>
                            <option value="7"> Caudal </option>
                            <option value="8"> Flujo </option>
                        </optgroup>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success" name="ConultarVar" style="margin-left: 5%; margin-top: 21%;">Consultar variable</button>
                </div>
            </div>
        </form>

        <div class="row mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Nodo</th>
                        <th>Longitud</th>
                        <th>Latitud</th>
                        <?php 
                    if(empty($_POST['VarAMB_AG'])){
                        ?>
                        <th>Variable</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='1'){
                        ?>
                        <th>Temperatura ambiental</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='2'){
                        ?>
                        <th>Humedad</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='3'){
                        ?>
                        <th>Velocidad del viento</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='4'){
                        ?>
                        <th>Dirección del viento </th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='5'){
                        ?>
                        <th>Temperatura del río</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='6'){
                        ?>
                        <th>Nivel del agua</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='7'){
                        ?>
                        <th>Caudal</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='8'){
                        ?>
                        <th>Flujo</th>
                        <?php
                    }else if(empty($_POST['VarAMB_AG'])){
                        ?>
                        <th>Variable</th>
                        <?php
                    }
                ?>

                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
            if(isset($_POST['ConultarVar'])){
                $Var = $_POST['VarAMB_AG'];
                $url = "http://$Host_Sever/api/MySql/GET_JSON_VE/$Var";
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
                        $Lo = $Json[$i]->Longitud;
                        $La = $Json[$i]->Latitud;
                        $V = $Json[$i]->Var;
                        $F = $Json[$i]->Fecha;
                        $H = $Json[$i]->Hora; 
                    ?>
                    <tr>
                        <td> <?php echo $IDN;?> </td>
                        <td> <?php echo $Lo;?> </td>
                        <td> <?php echo $La;?> </td>
                        <td> <?php echo $V;?> </td>
                        <td> <?php echo $F;?> </td>
                        <td> <?php echo $H;?> </td>
                    </tr>
                    <?php }
                }
            }else if(empty($_POST['ConultarFecha'])){?>
                    <tr>
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
    <!-- /.card-body -->
</div>


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Variable y nodo específico</h3>
    </div>
    <div class="card-body ">
        <form action="Dashboard_Gov_Variables.php" method="post" name="FH2">
        <h4> Consultar variabes:</h4>
            <div class="row">
                <div class="col-md-5">
                    
                    <select class="form-control" name="VarAMB_AG2">
                        <option value="0"> Selecionar una varible </option>
                        <optgroup label="Variables ambientales">
                            <option value="1"> Temperatura ambiental </option>
                            <option value="2"> Humedad </option>
                            <option value="3"> Velocidad del viento </option>
                            <option value="4"> Dirección del viento </option>
                        </optgroup>
                        <optgroup label="Variables del río">
                            <option value="5"> Temperatura del rio </option>
                            <option value="6"> Nivel del agua </option>
                            <option value="7"> Caudal </option>
                            <option value="8"> Flujo </option>
                        </optgroup>
                    </select>
                </div>

                <div class="col-md-5">
                    <select class="form-control" name="NodosDisponibles">
                        <option value="0">Seleccionar nodo sensor</option>
                        <?php 
                    if(isset($_SESSION["Nombre_User_Gov"])){
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

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success" name="ConultarVar2" style="margin-left: 5%; margin-top:0%;">Consultar variable</button>
                </div>
            </div>
        </form>

        <div class="row mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Nodo</th>
                        <th>Longitud</th>
                        <th>Latitud</th>
                        <?php 
                    
                    if(empty($_POST['VarAMB_AG'])){
                        ?>
                        <th>Variable</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='1'){
                        ?>
                        <th>Temperatura ambiental</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='2'){
                        ?>
                        <th>Humedad</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='3'){
                        ?>
                        <th>Velocidad del viento</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='4'){
                        ?>
                        <th>Dirección del viento </th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='5'){
                        ?>
                        <th>Temperatura del río</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='6'){
                        ?>
                        <th>Nivel del agua</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='7'){
                        ?>
                        <th>Caudal</th>
                        <?php
                    }else if($_POST['VarAMB_AG']=='8'){
                        ?>
                        <th>Flujo</th>
                        <?php
                    }else if(empty($_POST['VarAMB_AG'])){
                        ?>
                        <th>Variable</th>
                        <?php
                    }
                ?>

                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 


            if(isset($_POST['ConultarVar2'])){
                $Var = $_POST['VarAMB_AG2'];
                $IDN = $_POST["NodosDisponibles"];
                $url = "http://$Host_Sever/api/MySql/GET_JSON_VE/$Var/NE/$IDN";
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
                        $Lo = $Json[$i]->Longitud;
                        $La = $Json[$i]->Latitud;
                        $V = $Json[$i]->Var;
                        $F = $Json[$i]->Fecha;
                        $H = $Json[$i]->Hora; 
                    ?>
                    <tr>
                        <td> <?php echo $IDN;?> </td>
                        <td> <?php echo $Lo;?> </td>
                        <td> <?php echo $La;?> </td>
                        <td> <?php echo $V;?> </td>
                        <td> <?php echo $F;?> </td>
                        <td> <?php echo $H;?> </td>
                    </tr>
                    <?php }
                }
            }else if(empty($_POST['ConultarFecha'])){?>
                    <tr>
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
    <!-- /.card-body -->
</div>