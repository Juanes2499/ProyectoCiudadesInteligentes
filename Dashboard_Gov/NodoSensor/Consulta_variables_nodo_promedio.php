<?php
require('../PHP/Server.php');
?>

<!-- izquierdo -->
<div class="col-md-6">
    <!-- Temperatura -->
    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="card-title">Temperatura ambiente</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5><?php echo $Prom_TA; ?></h5>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Velocidad viento -->
    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="card-title">Velocidad del viento</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5><?php echo $Prom_VV; ?></h5>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Nivel río -->
    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="card-title">Nivel del río</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5><?php echo $Prom_NA; ?></h5>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Caudal -->
    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="card-title">Caudal del río</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5><?php echo $Prom_C; ?></h5>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /izquierdo -->

<!--- derecho -->
<div class="col-md-6">
    <!-- Humedad -->
    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="card-title">Humedad</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5><?php echo $Prom_H; ?></h5>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Temperatura del rio -->
    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="card-title">Temperatura del rio</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5><?php echo $Prom_TAG; ?></h5>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Flujo -->
    <div class="card bg-primary">
        <div class="card-header">
            <h3 class="card-title">Flujo del río</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5><?php echo $Prom_F; ?></h5>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /derecho -->