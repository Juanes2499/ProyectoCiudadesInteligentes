<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tabla de resultados por nodo</h3>
    </div>
    <div class="card-body ">
    <form action="Dashboard_Gov_Estadisticas.php" method="post" name="FH2">
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
                <div>
                    <button type="submit" name="ConsultarEstadistica" class="btn btn-success">Realizar consulta</button>
                </div>
            </div>
        </form>
    </div>
</div>