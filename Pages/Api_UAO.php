
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>API</title>

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
<header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color:black">
            <div class="container">
                <a href="../index.php"><img src="../Images/Icon.png" width="100" height="60"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="Quienes_somos.html">API</a>
                        </li>




                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iniciar sesión
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">

                                <div class="container">
                                    <div class="card-deck">

                                        <a class="dropdown-item" href="../Login/User_Gov.php">
                                            <div class="container">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2" style="width: 100%;">
                                                            <img ID="Image1" runat="server" src="../Images/User_GOV.jpg" class="card-img-top" Style="width: 50px;" />
                                                        </td>
                                                        <td>
                                                            <h5>Ingreso gubernamental</h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </a>
                                        
                                        <!--
                                        <a class="dropdown-item" href="../Login/User_Ciud.php">
                                            <div class="container">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2" style="width: 100%;">
                                                            <img ID="Image1" runat="server" src="../Images/User_Ciud.png" class="card-img-top" Style="width: 50px;" />
                                                        </td>
                                                        <td>
                                                            <h5>Ingreso ciudadano</h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </a>

                                        <a class="dropdown-item" href="../Login/Reg_Ciud.php">
                                            <div class="container">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2" style="width: 100%;">
                                                            <Image ID="Image3" runat="server" class="card-img-top" Style="width: 40px;" src="../Images/Reg_Ciud.png" />
                                                        </td>
                                                        <td>
                                                            <h5>Registro ciudadano</h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </a>
                                        -->

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br/>
    <br/>
    <br/>
    <header class="headerInicio bg-white"> </header>
    </br>
    <div class="container">
        <?php 
            require('Recurso_cliente.php');
        ?>
    </div>

    <br/>
    <br/>
    <br/> <br/>
    <br/>
    <br/>




    <footer class="page-footer font-small unique-color-dark pt-4" style="background-color:black">
        <div class="container">
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h3 class="mb-1">Registrate para más información</h3>
                </li>
                <li>
                    <a href="../Login/Reg_Ciud.php" >Registrate!</a>
                </li>
            </ul>
        </div>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://www.uao.edu.co/"> Universidad Autónoma de Occidente de Cali</a>
        </div>
    </footer>
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
</body>
</html>
