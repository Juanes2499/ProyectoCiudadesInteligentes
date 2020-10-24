<?php
if(isset($_SESSION["ID_Nodo"])){
class RandomTable{
    public $IDr = 0 ;
    //Función que crea y devuelve un objeto de conexión a la base de datos y chequea el estado de la misma. 
    function conectarBD(){ 
            require("../PHP/DatosBD.php");
            $server = "localhost";
            $usuario = "root";
            $pass = "";
            $BD = "proyectociudadesinteligentes";
            //variable que guarda la conexión de la base de datos
            //$conexion = mysqli_connect($server, $usuario, $pass, $BD); 
            $conexion = mysqli_connect($db_host, $db_usuario, $db_contraseña, $db_nombre); 
            //Comprobamos si la conexión ha tenido exito
            if(!$conexion){ 
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>'; 
            } 
            //devolvemos el objeto de conexión para usarlo en las consultas  
            return $conexion; 
    }  
    /*Desconectar la conexion a la base de datos*/
    function desconectarBD($conexion){
            //Cierra la conexión y guarda el estado de la operación en una variable
            $close = mysqli_close($conexion); 
            //Comprobamos si se ha cerrado la conexión correctamente
            if(!$close){  
               echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>'; 
            }    
            //devuelve el estado del cierre de conexión
            return $close;         
    }

    //Devuelve un array multidimensional con el resultado de la consulta
    function getArraySQL($sql){
        //Creamos la conexión
        $conexion = $this->conectarBD();
        //generamos la consulta
        if(!$result = mysqli_query($conexion, $sql)) die();

        $rawdata = array();
        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;
        while($row = mysqli_fetch_array($result))
        {   
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
            $rawdata[$i] = $row;
            $i++;
        }
        //Cerramos la base de datos
        $this->desconectarBD($conexion);
        //devolvemos rawdata
        return $rawdata;
    }
    function getAllInfo(){
        //Creamos la consulta
        $ID = $_SESSION["ID_Nodo"];
        $sql = "SELECT ID_Arduino, Temperatura, Humedad, Vel_viento, Fecha, Hora FROM `datos_arduino_ambiente` WHERE ID_Arduino = $ID";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }
}

class RandomTable2{
    public $IDr = 0 ;
    //Función que crea y devuelve un objeto de conexión a la base de datos y chequea el estado de la misma. 
    function conectarBD(){ 
            require("../PHP/DatosBD.php");
            $server = "localhost";
            $usuario = "root";
            $pass = "";
            $BD = "proyectociudadesinteligentes";
            //variable que guarda la conexión de la base de datos
            //$conexion = mysqli_connect($server, $usuario, $pass, $BD); 
            $conexion = mysqli_connect($db_host, $db_usuario, $db_contraseña, $db_nombre); 
            //Comprobamos si la conexión ha tenido exito
            if(!$conexion){ 
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>'; 
            } 
            //devolvemos el objeto de conexión para usarlo en las consultas  
            return $conexion; 
    }  
    /*Desconectar la conexion a la base de datos*/
    function desconectarBD($conexion){
            //Cierra la conexión y guarda el estado de la operación en una variable
            $close = mysqli_close($conexion); 
            //Comprobamos si se ha cerrado la conexión correctamente
            if(!$close){  
               echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>'; 
            }    
            //devuelve el estado del cierre de conexión
            return $close;         
    }

    //Devuelve un array multidimensional con el resultado de la consulta
    function getArraySQL($sql){
        //Creamos la conexión
        $conexion = $this->conectarBD();
        //generamos la consulta
        if(!$result = mysqli_query($conexion, $sql)) die();

        $rawdata = array();
        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;
        while($row = mysqli_fetch_array($result))
        {   
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
            $rawdata[$i] = $row;
            $i++;
        }
        //Cerramos la base de datos
        $this->desconectarBD($conexion);
        //devolvemos rawdata
        return $rawdata;
    }
    function getAllInfo(){
        //Creamos la consulta
        $ID = $_SESSION["ID_Nodo"];
        $sql = "SELECT ID_Arduino ,Temperatura_agua, Nivel_agua, Caudal, Flujo, Fecha, Hora FROM `datos_arduino_agua`WHERE ID_Arduino = $ID";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }
}
}
?>