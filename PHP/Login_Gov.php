<?php
    session_start();

    require('../PHP/DatosBD.php');
    if (mysqli_connect_errno()) {
        echo'
            <script>
                alert("Fallo en la conexión con la base de datos ");
                location.href="User_Gov.php";
            </script>';
	    exit();
    }
    
    mysqli_select_db($conexion,$db_nombre) or die ("no se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");

    if (isset($_POST['subimit'])){
        //obtener lo valores del formularo
        $mail = $_POST['Email'];
        $pass = $_POST['Pass'];

            $Consultar_User_Ciud = "SELECT * FROM datos_user WHERE Mail='$mail' and Pass='$pass' and Fun_Gov ='SI'";
            $Resultado_User_Ciud = mysqli_query($conexion,$Consultar_User_Ciud);
            $num = mysqli_num_rows($Resultado_User_Ciud);
            if($num!=0){
                $Nombre_User = "SELECT Nombre, Mail FROM datos_user WHERE Mail='$mail'";
                $Resultado_Nombre_User = mysqli_query($conexion, $Nombre_User);
                $num2 = mysqli_num_rows($Resultado_Nombre_User);
                if($num2>0){
                    while ($Tabla_user =mysqli_fetch_array($Resultado_Nombre_User)){
                        $_SESSION['sesion_iniciada_Gov'] = true;
                        $_SESSION["Nombre_User_Gov"]=$Tabla_user["Nombre"];
                        $_SESSION["Mail_Gov"]=$Tabla_user["Mail"];
                        header("Location:../Dashboard_Gov/Dashboard_Gov.php");  
                    }   
                }
            }else if($num==0){
                $_SESSION['sesion_iniciada'] = false;
                echo'
                <script>
                    alert("usuario y/o contraseña incorrectas");
                    location.href="../Login/User_Gov.php";
                </script>';
                //header("Location:../Login/User_Ciud.php"); 
            }
        mysqli_close($conexion);
    }
?>