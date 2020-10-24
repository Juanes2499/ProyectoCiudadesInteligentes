<?php
    require('../../PHP/Server.php');
    session_start();
    if (isset($_POST['ActUser'])){
        $TID2 = $_POST['tid'];
        $NID2 = $_POST['nid'];
        $N2 = $_POST['n'];
        $A2 = $_POST['a'];
        $M2 = $_POST['m'];
        $C2 = $_POST['c'];
        $D2 = $_POST['d'];
        $url_put_usr = "http://$Host_Sever/api/MySql/PUT_JSON_USR";
        $data = array(
            'TipoID' => "$TID2",
            'NumID' => "$NID2",
            'Nombre' => "$N2",
            'Apellido' => "$A2",
            'Mail' => "$M2",
            'Celular' => "$C2",
            'Direccion' => "$D2");
        
       // $Data_JSON = json_decode($data);

        $ch = curl_init($url_put_usr);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);
        echo    '<script>
                    alert("Datos actualizados correctamente");
                    location.href="../Dashboard_Gov_User.php";
                </script>';
        
        //header("Location:../Dashboard_Gov_Config_Nodo.php");
    }
?>  