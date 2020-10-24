<?php
    session_start();
    require('../HServer.php');
    //echo $Host_Sever_gov;
    if (isset($_POST['ActNodo'])){
        $IDN = $_SESSION['IDN'];
        $NN = $_POST['NN'];
        $Lon = $_POST['Lon'];
        $Lat = $_POST['Lat'];
        $Est = $_POST['Est'];
        $url_put = "http://$Host_Sever_gov/api/MySql/PUT_JSON_CONF_NODO";
        $data = array(
            'IDNodo' => "$IDN",
            'NumNodo' => "$NN",
            'Longitud' => "$Lon",
            'Latitud' => "$Lat",
            'Estado' => "$Est");

        $ch = curl_init($url_put);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);
        echo    '<script>
                    alert("Datos actualizados correctamente");
                    location.href="../Dashboard_Gov_Config_Nodo.php";
                </script>';

        //header("Location:../Dashboard_Gov_Config_Nodo.php");
    }

    if(isset($_POST['EliNodo'])){
        $IDN2 = $_SESSION['IDN'];
        $url_Del = "http://$Host_Sever_gov/api/MySql/DELETE_JSON_N/$IDN2";
        $ch2 = curl_init($url_Del);
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer MY_API_TOKEN')
        );

        $result = curl_exec($ch2);
        echo    '<script>
                    alert("Nodo eliminado correctamente");
                    location.href="../Dashboard_Gov_Config_Nodo.php";
                </script>';
    }
?>  