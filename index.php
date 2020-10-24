<!DOCTYPE html>
<html lang="en">

<head>

    <title>Inicio</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Estilo_IMG.css">

</head>

<body>

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color:black">
            <div class="container">
                <a href="index.php"><img src="Images/Icon.png" width="100" height="60"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="Pages/Api_UAO.php">API</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Iniciar sesión
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">

                                <div class="container">
                                    <div class="card-deck">

                                        <a class="dropdown-item" href="Login/User_Gov.php">
                                            <div class="container">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2" style="width: 100%;">
                                                            <img ID="Image1" runat="server" src="Images/User_GOV.jpg"
                                                                class="card-img-top" Style="width: 50px;" />
                                                        </td>
                                                        <td>
                                                            <h5>Ingreso gubernamental</h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </a>

                                        <!--
                                        <a class="dropdown-item" href="Login/User_Ciud.php">
                                            <div class="container">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2" style="width: 100%;">
                                                            <img ID="Image1" runat="server" src="Images/User_Ciud.png"
                                                                class="card-img-top" Style="width: 50px;" />
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
                                                            <Image ID="Image3" runat="server" class="card-img-top"
                                                                Style="width: 40px;" src="Images/Reg_Ciud.png" />
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
    <br />
    <br />
    <br />
    <header class="headerInicio bg-white"> </header>
    </br>
    <div class="container">
        <div>
            <h1>Bienvenidos a Smart City UAO</h1>
        </div>
        </br>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h4 class="justify-content-around">Smart City UAO es una solución de ciudad inteligente que ayuda a controlar los problemas 
                        de inundación ocasionados por el río Jarrillón ubicado en la zona oriente de la ciudad </h4>
                </div>
                <div>
                    En épocas lluviosas se presentan serios problemas de inundaciones en zonas del oriente de la ciudad y pueblos aledaños a 
                    esta, afectando las viviendas de los habitantes, la movilidad, los cultivos, la energía misma del lugar, frecuente caídas 
                    de árboles, suspensión de agua potable y debilitación de suelos. Los sectores de la ciudad más afectados son barrios del 
                    nororiente, oriente y pueblos como Navarro que es el más afectado de todos. Según el reporte de “Estrategias de respuestas 
                    a emergencias en Santiago de Cali” entregado en noviembre del 2018 por la administración del ex-alcalde Maurice Armitage, 
                    estos son los resultados obtenidos.
                </div>
                <div>
                    Se plantea crear un sistema alrededor del río cauca con el fin de realizar un control preciso ya adecuado para evitar futuras 
                    inundaciones en dichas zonas. Se hará la transmisión de los datos de las variables de gran relevancia por medio inalámbrico que
                    pueda afectar al mismo, con el objetivo de brindar servicios de información en tiempo real y hacer un procesamiento adecuado 
                    para generar una base estadística que permita mayor eficiencia de respuesta actos inmediatos por parte de los entes gubernamentales 
                    y toma de decisiones para situaciones de emergencia.
                </div>
            </div>
            <div class="col-md-6">
             <img src="Images/Index1.png" class="mx-auto d-block">
            </div>
        </div>

        </br>
        <div class="row">
            <div>
                <h2 class="justify-content-around">Resultados estadístcios de Cali como ciudad inteligente a nivel mundial</h2>
            </div>  
            <div>
                <h4 class="justify-content-around">Actualmente Cali ocupa el puesto 148 a nivel mundial y el puesto 3 en Colombia</h4>
            </div> 
            <div class="col-md-4">
                <img src="Images/EC1.png" class="mx-auto d-block">
            </div>
            <div class="col-md-4">
                <img src="Images/EC2.png" class="mx-auto d-block">
            </div>
            <div class="col-md-4">
                <img src="Images/EC3.png" class="mx-auto d-block">
            </div>
        </div>
    </div>


    <br />
    <br />
    <br />
    <br />

    <footer class="page-footer font-small unique-color-dark pt-4" style="background-color:black">
        <div class="container">
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h3 class="mb-1">Registrate para más información</h3>
                </li>
                <li>
                    <a href="Login/Reg_Ciud.php" class="btn btn-default">Registrate!</a>
                </li>
            </ul>
        </div>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://www.uao.edu.co/"> Universidad Autónoma de Occidente de Cali</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>