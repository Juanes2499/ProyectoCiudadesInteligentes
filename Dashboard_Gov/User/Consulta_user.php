<?php
require('../PHP/Server.php');
if(isset($_SESSION["sesion_iniciada_Gov"])){
    $Mail = $_SESSION["Mail_Gov"];
    $url = "http://$Host_Sever/api/MySql/GET_JSON_USR/$Mail";
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
            $IDU = $Json[$i]->ID_User;
            $TID = $Json[$i]->Tipo_ID;
            $NID = $Json[$i]->ID;
            $N = $Json[$i]->Nombre;
            $A = $Json[$i]->Apellido;
            $M = $Json[$i]->Mail;
            $C = $Json[$i]->Celular; 
            $D = $Json[$i]->Dirección; 
            $FG =  $Json[$i]->Fun_Gov; 
            $CG =  $Json[$i]->Cod_Int_Gov; 
        ?>
            <form action="User/Acciones_User.php" method="post" name="US">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-address-card"></i>
                            Información usuario
                        </h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-warning" name="ActUser" style="margin-left:0%;">Actualizar datos</button>
                        </div>
                    </div>
                    <!--  CARDS BODY -->
                    
                    <div class="card-body">
                        <h4 class="text-muted">Identificación usuario</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID usuario</span>
                            </div>
                            <input type="text" name="idu" class="form-control" value="<?php echo $IDU; ?>" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tipo de identificación</span>
                            </div>
                            <input type="text" name="tid" class="form-control" value="<?php echo $TID; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Número identificación</span>
                            </div>
                            <input type="text" name="nid" class="form-control" value="<?php echo $NID; ?>">
                        </div>


                        <h4 class="text-muted">Nombres y apellidos</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" name="n" class="form-control" value="<?php echo $N; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Apellido</span>
                            </div>
                            <input type="text" name="a"  class="form-control" value="<?php echo $A; ?>">
                        </div>

                        <h4 class="text-muted">Contacto</h4>
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Correo electrónico</span>
                                </div>
                                <input type="text" name="m" class="form-control" value="<?php echo $M; ?>">
                            </div>
                        </div> 
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Celular</span>
                                </div>
                                <input type="text" name="c" class="form-control" value="<?php echo $C; ?>">
                            </div>
                        </div>
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Dirección</span>
                                </div>
                                <input type="text" name="d" class="form-control" value="<?php echo $D; ?>">
                            </div>
                        </div> 

                        <h4 class="text-muted">Tipo de usuario</h4>
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Funcionario del gobierno</span>
                                </div>
                                <input type="text" name="fg" class="form-control" value="<?php echo $FG; ?>" readonly>
                            </div>
                        </div> 
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Código funcionario</span>
                                </div>
                                <input type="text" name="cg" class="form-control" value="<?php echo $CG; ?>" readonly>
                            </div>
                        </div> 
                    </div>
                    <!-- /.card-body-->
                </div>
            </form>
<!-- /.card -->
<?php
        }
    }
}
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>