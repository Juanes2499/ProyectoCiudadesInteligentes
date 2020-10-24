<!DOCTYPE html>
<html lang="en">
<head>
    
	<title>Inicio</title>
    
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link rel="stylesheet" href="CSS/Estilo_IMG.css">
    
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
                                <a class="nav-link" href="../index.html">Inicio</a>
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
    
	
  <br/>
    <br/>
    <br/>  <br/>
    <br/>
    <br/>

    
    

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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>