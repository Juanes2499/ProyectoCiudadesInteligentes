<?php
$Json = "";
if(isset($_SESSION["ID_Nodo"])){
    $ID = $_SESSION["ID_Nodo"];
    $url = "http://localhost:3000/api/MySql/GET_JSON_DEN/$ID";
    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $Respuesta = curl_exec($curl);
    curl_close($curl);

    if($Respuesta == false){
        //curl_close($curl);
        die('Error en la comunicación con el servidor');
    }

    $Json = json_decode($Respuesta);
}
?>