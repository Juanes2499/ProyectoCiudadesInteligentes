
            <form action="Agregar_Nodo/Acciones_Agregar_nodo.php" method="post" name="AN">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-plus"></i>
                            Agregar nodo sensor
                        </h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-success" name="AgrNodo" style="margin-left:0%;">Agregar un nuevo nodo</button>
                        </div>
                    </div>
                    <!--  CARDS BODY -->
                    
                    <div class="card-body">
                        <h4 class="text-muted">Identificación del nodo</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Número Nodo</span>
                            </div>
                            <input type="text" name="NN" class="form-control" placeholder="Agregar número del nodo sensor">
                        </div>

                        <h4 class="text-muted">Ubicación del nodo</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Longitud</span>
                            </div>
                            <input type="text" name="Lon" class="form-control" placeholder="Agregar la longitud del nodo sensor">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Latitud</span>
                            </div>
                            <input type="text" name="Lat"  class="form-control" placeholder="Agregar la latitud del nodo sensor">
                        </div>

                        <h4 class="text-muted">Bateria</h4>
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Estado</span>
                                </div>
                                <input type="text" name="Bat" class="form-control" placeholder="Agregar porcentaje de bateria del nodo sensor">
                            </div>
                        </div> 

                        <h4 class="text-muted">Estado del nodo</h4>
                        <h6 class="text-muted">Escribir Activo o Desactivado</h6>
                        <div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Estado</span>
                                </div>
                                <input type="text" name="Est" class="form-control" placeholder="Agregar el estado del nodo sensor">
                            </div>
                        </div> 
                    </div>
                    <!-- /.card-body-->
                </div>
            </form>
            <!-- /.card -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>