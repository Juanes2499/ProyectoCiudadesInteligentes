<?php
    //require('../PHP/Server.php');
    //session_start();
    session_start();
    require('../HServer.php');
    //echo $Host_Sever_gov;
    if (isset($_POST['AgrNodo'])){
        $NN = $_POST['NN'];
        $Lon = $_POST['Lon'];
        $Lat = $_POST['Lat'];
        $Bat = $_POST['Bat'];
        $Est = $_POST['Est'];
        $url_post = "http://$Host_Sever_gov/api/MySql/POST_JSON_AN";
        $data = array(
            'NumNodo' => "$NN",
            'Longitud' => "$Lon",
            'Latitud' => "$Lat",
            'Bateria' => "$Bat",
            'Estado' => "$Est");
        
       // $Data_JSON = json_decode($data);

        $ch = curl_init($url_post);
        
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Dato enviado'));
        

        $response = curl_exec($ch);
        echo    '<script>
                    alert("Nodo sensor agregado correctamente");
                    location.href="../Dashboard_Gov_Agregar_Nodo.php";
                </script>';

        
        //header("Location:../Dashboard_Gov_Config_Nodo.php");
    }
?>  