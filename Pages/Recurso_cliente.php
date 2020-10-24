<?php
require('../PHP/Server.php');
?>
<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            1. GET (ruta para leer la información de cada nodo)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta: /api/MySql/Get_JSON_DN/:N</h5></li>
            <li class="list-group-item"><h5>Observaciones: N = 0 trae todos los nodos, de lo contrario retorna los datos del nodo correspondiente</h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC1.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            2. GET (ruta para obtener todos los datos de todas las entradas de todos los nodos)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta: /api/MySql/Get_JSON_DTE</h5></li>
            <li class="list-group-item"><h5>Observaciones: </h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC2.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            3. GET (Ruta para obtener el promedio de las variables de cada nodo)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta: /api/MySql/Get_JSON_DNP</h5></li>
            <li class="list-group-item"><h5>Observaciones: </h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC3.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            4. GET (Ruta para obtener los datos de todas las entradas de un nodo específico)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta: /api/MySql/GET_JSON_DEN/:id </h5></li>
            <li class="list-group-item"><h5>Observaciones: :id -> Nodo a seleccionar </h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC4.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            5. GET (Ruta para obtener los datos de la última entrada de un nodo específico)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta: /api/MySql/GET_JSON_DENE/:id  </h5></li>
            <li class="list-group-item"><h5>Observaciones: :id -> Nodo a seleccionar </h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC5.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            6. GET (Ruta para obtener los datos de una variable específica)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta: /api/MySql/GET_JSON_VE/:var   </h5></li>
            <li class="list-group-item"><h5>Observaciones: :var -> variable a seleccionar. Tabla de variables; 1(Temperatura ambiental), 2(Humedad), 3(Velocidad viento), 4(Dirección viento), 5(Temperatura agua), 6(Nivel agua), 7(Caudal), 8(Flujo)) </h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC6.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            7. GET (Ruta para obtener los datos de una variable específica de un nodo específico)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta: /api/MySql/GET_JSON_VE/:var/NE/:id    </h5></li>
            <li class="list-group-item"><h5>Observaciones: :var -> variable a seleccionar, :id -> Nodo a seleccionar. Tabla de variables; 1(Temperatura ambiental), 2(Humedad), 3(Velocidad viento), 4(Dirección viento), 5(Temperatura agua), 6(Nivel agua), 7(Caudal), 8(Flujo)) </h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC7.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            8. GET (Ruta para obtener datos de variables por medio de la fecha)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta:  /api/MySql/GET_JSON_Fecha//:AAAA/:MM/:DD </h5></li>
            <li class="list-group-item"><h5>Observaciones: :AAAA -> año, :MM -> mes, :DD -> día</h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC8.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            9. GET (Ruta para obtener datos de variables por medio de la fecha y con nodo específico)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta:  /api/MySql/ GET_JSON_Fecha//:AAAA/:MM/:DD/&/NE/:id  </h5></li>
            <li class="list-group-item"><h5>Observaciones: :AAAA -> año, :MM -> mes, :DD ->día, :id -> Nodo a seleccionar</h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC9.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            10. GET (Ruta para obtener datos de variables por medio de la fecha y un rango de horas cerradas)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta:  /api/MySql/GET_JSON_F//:AAAA/:MM/:DD/H//:H1/:H2   </h5></li>
            <li class="list-group-item"><h5>Observaciones: :AAAA -> año, :MM -> mes, :DD ->día, :H1 -> Hora 1, :H2 -> Hora 2</h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC9.png" class="mx-auto d-block"> 
    </div>
</div>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-sitemap"></i>
            11. GET (Ruta para obtener datos de la API)
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
        </div>
    </div>

    <div class="card-body ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5>Host: <?php echo $Host_Sever;?></h5></li>
            <li class="list-group-item"><h5>Ruta:  /api/MySql/Get_JSON_DA </h5></li>
            <li class="list-group-item"><h5>Observaciones: </h5></li>
            <li class="list-group-item"><h5>Content-type: application/json</h5></li>
            <h5 style="margin-left:2%; margin-top:1%;">Datos solicitud:</h5>
        </ul>
        <img src="../Images/RC11.png" class="mx-auto d-block"> 
    </div>
</div>