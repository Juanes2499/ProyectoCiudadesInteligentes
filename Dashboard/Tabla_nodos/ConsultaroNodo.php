<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tabla de resultados por nodo</h3>
    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-6">
                <p>¿Que nodo sensor desea consultar?</p>
                <form class="form-inline" action="Dashboard_Ciud_Tabla_datos_nodo.php" method="post" name="ND">
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
                    <button type="submit" class="btn btn-success" name="ConultarNodo" style="margin-left: 5%;">Consultar
                        nodo</button>
                </form>
            </div>

            <div class="col-md-6">
                <?php
                $ID=null;
                $_SESSION["ID_Nodo"]=null;
                $Long = 0;
                $Lat = 0;
                if($_SESSION["Cantidad_nodos"] != 0){

                    if (empty($_POST["NodosDisponibles"])){?>
                            <div class="form-group">
                                <label for="text">Longitud:</label>
                                <input type="number" class="form-control" name="NumNodo" placeholder="No se ha seleccionado nodo">
                            </div>
                            <div class="form-group">
                                <label for="text">Latitud:</label>
                                <input type="number" class="form-control" name="NumNodo" placeholder="No se ha seleccionado nodo">
                            </div>
                            <?php }else if(isset($_POST["NodosDisponibles"])){
                        $ID = $_POST["NodosDisponibles"];
                        $_SESSION["ID_Nodo"]=$ID;
                        $Consultar_datos_nodo = "SELECT Longitud, Latitud FROM datosnodo WHERE NumNodo = $ID "; 
                        $Respuesta_dato_nodo = mysqli_query($conexion,$Consultar_datos_nodo);
                        while ($Tabla_datos_nodo = mysqli_fetch_array($Respuesta_dato_nodo)){
                            $Long = $Tabla_datos_nodo['Longitud']; 
                            $Lat = $Tabla_datos_nodo['Latitud']; 
                            ?>
                            <div class="form-group">
                                <label for="text">Longitud:</label>
                                <input type="number" class="form-control" name="NumNodo" placeholder="<?php echo $Long;?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="text">Latitud:</label>
                                <input type="number" class="form-control" name="NumNodo" placeholder="<?php echo $Lat; ?>" readonly>
                            </div>
                            <?php
                            //mysqli_close($conexion);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>