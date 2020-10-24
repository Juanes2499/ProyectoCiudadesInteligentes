<?php
	/*$db_host = "ec2-54-88-123-68.compute-1.amazonaws.com";
	$db_usuario ="PCI";
	$db_contraseña ="PCI2020";
    $db_nombre = "proyectociudadesinteligentes";*/

    $db_host = "localhost";
	$db_usuario ="root";
	$db_contraseña =""; 
    $db_nombre = "proyectociudadesinteligentes";
    
    
    $conexion =  mysqli_connect(
        /*"ec2-54-88-123-68.compute-1.amazonaws.com",
        "PCI",
        "PCI2020",
        "proyectociudadesinteligentes"*/

        "localhost",
        "root",
        "",
        "proyectociudadesinteligentes"
    );

    if (mysqli_connect_errno()) {
        echo'
            <script>
                alert("Fallo en la conexión con la base de datos ");
                //location.href="../Login/User_Ciud.php";
            </script>';
	    exit();
    }

    mysqli_select_db($conexion,$db_nombre) or die ("no se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");
?>