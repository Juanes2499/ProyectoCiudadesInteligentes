<?php
    session_start();
    if(isset($_SESSION['sesion_iniciada']) == true){
        $Nom_User = $_SESSION["Nombre_User"];
    }else if ($_SESSION['sesion_iniciada'] == "")
    {
        echo'
            <script>
                alert("Usuario presenta fallas");
                location.href="../Login/User_Ciud.php";
            </script>';
    }

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -------------------------------------------------------------------------------------------------------------------------------------------   -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">API</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <form action="../PHP/CerrrarSesion.php" method="post">
        <button type="submit" name="subimit" class="btn btn-danger">Cerrar sesión</button>
      </form>
    </ul>
  </nav>
  <!-- /.navbar ------------------------------------------------------------------------------------------------------------------------------------------- -->

  <!-- Main Sidebar Container ------------------------------------------------------------------------------------------------------------------------------ -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Smart Cities UAO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $Nom_User; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="Dashboard_Ciud.php" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Home
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboards
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Dashboard_Ciud_Tabla_datos_nodo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabla de datos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Dashboard_Ciud_Estadisticas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estadísticas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Dashboard_Ciud_Fecha.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fecha y hora</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="Dashboard_Ciud_NodoSensor.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Nodo sensor
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- /Main Sidebar Container ---------------------------------------------------------------------------------------------------------------- ------------- -->

  <!-- Content Wrapper. Contains page content --------------------------------------------------------------------------------------------------------------- -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bienvedio a Smart Cities UAO</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <?php require('Estadistica/ConsultarNodo.php');?>
      </div>
      <hr/>
      </br>
      <div class="row">

      <!-- Izquierda-->
      <div class="col-md-6">
        <!-- Temperatura ambienta -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Temperatura ambiental
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php require('Estadistica/Temperatura.php');?>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

        <!-- Velocidad viento -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Velocidad viento
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php require('Estadistica/Vel_viento.php');?>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

        <!-- Nivel Agua -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Nivel agua
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php require('Estadistica/Nivel_Agua.php');?>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

        <!-- Caudal -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Caudal
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php require('Estadistica/Caudal.php');?>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.card -->

      <!-- /.Izquierda-->

      <!--  Derecha -->
      <div class="col-md-6">
        <!-- Humedad -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Humedad
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php require('Estadistica/Humedad.php');?>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

        <!-- Temeperatura agua -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Temperatura agua
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php require('Estadistica/Temperatura_agua.php');?>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

        <!-- Flujo -->
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Flujo
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <?php require('Estadistica/Flujo.php');?>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->
        


      </div>


      <!--  Derecha -->

      <!-- /Main content -->
      </div>
    </section>
  <!-- /.content-wrapper Contains page content--------------------------------------------------------------------------------------------------------------- -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://www.uao.edu.co/">Smart Cities UAO</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot-old/jquery.flot.pie.min.js"></script>
</body>
</html>
