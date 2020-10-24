<?php
    session_start();
    if (isset($_SESSION['sesion_iniciada'])||isset($_SESSION['sesion_iniciada_Gov'])){
        header('Location:../index.php');
        session_destroy();
    } 
?>
