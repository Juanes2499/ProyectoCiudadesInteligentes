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
                    <a href="index.php"><img src="../Images/Icon.png" width="100" height="60"></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="Pages/Quienes_somos.html">Quienes somos</a>
                            </li>




                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iniciar sesión
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">

                                    <div class="container">
                                        <div class="card-deck">

                                            <a class="dropdown-item" href="Login/User_Gov.php">
                                                <div class="container">
                                                    <table>
                                                        <tr>
                                                            <td rowspan="2" style="width: 100%;">
                                                                <img ID="Image1" runat="server" src="Images/User_GOV.jpg" class="card-img-top" Style="width: 50px;" />
                                                            </td>
                                                            <td>
                                                                <h5>Ingreso guvernamental</h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </a>

                                            <a class="dropdown-item" href="Login/User_Ciud.php">
                                                <div class="container">
                                                    <table>
                                                        <tr>
                                                            <td rowspan="2" style="width: 100%;">
                                                                <Image ID="Image3" runat="server" class="card-img-top" Style="width: 50px;" src="Images/User_Ciud.png" />
                                                            </td>
                                                            <td>
                                                                <h5>Ingreso ciudadano</h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </a>
                                            
                                            <a class="dropdown-item" href="Login/Reg_Ciud.php">
                                                <div class="container">
                                                    <table>
                                                        <tr>
                                                            <td rowspan="2" style="width: 100%;">
                                                                <Image ID="Image3" runat="server" class="card-img-top" Style="width: 40px;" src="Images/Reg_Ciud.png" />
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