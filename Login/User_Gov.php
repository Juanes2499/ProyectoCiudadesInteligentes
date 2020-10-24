<?php
    session_start();
    if(empty($_SESSION['sesion_iniciada_Gov'])){
        session_destroy();
        //header('Location:index.php');
    }else if($_SESSION['sesion_iniciada_Gov']==true){
        //if ($_SESSION['sesion_iniciada']==false)
        header('Location:../Dashboard_Gov/Dashboard_Gov.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
	<title>Inicio</title>
    
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../CSS/Estilo_IMG.css">
    

	<link rel="icon" type="image/png" href="../Images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../Diseno/Vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/Fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/Fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/Vendor//animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/Vendor//css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/Vendor//animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/Vendor//select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/Vendor//daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/CSS/main2.css">
	<link rel="stylesheet" type="text/css" href="../Diseno/CSS/util.css">
    
</head>
<body>
    
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
                                <a class="nav-link" href="../Pages/Quienes_somos.html">Quienes somos</a>
                            </li>




                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iniciar sesión
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">

                                    <div class="container">
                                        <div class="card-deck">
                                        <a class="dropdown-item" href="User_Gov.php">
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
                                            <a class="dropdown-item" href="User_Ciud.php">
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
                                            
                                            <a class="dropdown-item" href="Reg_Ciud.php">
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
    

    
    <form action="../PHP/Login_Gov.php" method="post">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Bienvenido gobierno.
					</span>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="Email">
						<span class="focus-input100" data-placeholder="Correo electrónico"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="Pass">
						<span class="focus-input100" data-placeholder="Contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="subimit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
   </form>     
	

	<div id="dropDownSelect1"></div>
	
	<script src="../Diseno/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../Diseno/vendor/animsition/js/animsition.min.js"></script>
	<script src="../Diseno/vendor/bootstrap/js/popper.js"></script>
	<script src="../Diseno/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../Diseno/vendor/select2/select2.min.js"></script>
	<script src="../Diseno/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Diseno/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../Diseno/vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

    
    

    <footer class="page-footer font-small unique-color-dark pt-4" style="background-color:black">
      <div class="container">
        <ul class="list-unstyled list-inline text-center py-2">
          <li class="list-inline-item">
            <h3 class="mb-1">Registrate para más información</h3>
          </li>
          <li >
            <a href="Reg_Ciud.php" class="btn btn-default">Registrate!</a>
          </li>
        </ul>
      </div>
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://www.uao.edu.co/"> Universidad Autónoma de Occidente de Cali</a>
      </div>
    </footer>
    
    <div id="dropDownSelect1"></div>
	
	<script src="../Diseno/Vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../Diseno/Vendor/animsition/js/animsition.min.js"></script>
	<script src="../Diseno/Vendor/bootstrap/js/popper.js"></script>
	<script src="../Diseno/Vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../Diseno/Vendor//select2/select2.min.js"></script>
	<script src="../Diseno/Vendor/daterangepicker/moment.min.js"></script>
	<script src="../Diseno/Vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../Diseno/Vendor/countdowntime/countdowntime.js"></script>
	<script src="../JS/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>