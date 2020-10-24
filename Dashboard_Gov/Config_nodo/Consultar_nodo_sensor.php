<?php 
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
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tabla de resultados por nodo</h3>
    </div>
    <div class="card-body ">
        <p>¿Que nodo sensor desea consultar?</p>
        <form action="Dashboard_Gov_Config_Nodo.php" method="post" name="ND">
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control" name="NodosDisponibles">
                        <option value="0">Todos los nodos sensores</option>
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
                    <button type="submit" class="btn btn-success" name="ConultarNodo" style="margin-left:0%;">Consultar nodo</button>
                </div>
            </div>
        </form>
    </div>
</div>