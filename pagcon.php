<?php
session_start();
if(!isset($_SESSION['logged'])){ // PREGUNTAR SI NO ESTA CREADA LA SESION LOGIN
    header("Location:login.php");
}
if(isset($_GET['cerrar'])){
    session_unset(); //vaciar el contenido de las sesiones
    session_destroy(); // destruye las sesiones
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Consultar Pagos Totales</title>

    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>


<?php
require("utilidades.php");
$u = new Utilidades();
?>

<!--Navigation-->
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><a href="adminindex.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                </ul>
                <ul class="right">
                    <li><a href="pagreg.php"><span class="mdi-action-account-circle"></span>    Registrar Pagos</a></li>
                    <li><a href="pagmod.php"><span class="mdi-action-view-module"></span>   Pagos Morosos</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<!--Hero-->


<!--Intro and service-->

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">


            </div>

            <form id="form1" name="form1" method="post" action="pagcon.php">
                <div class="input-field col s6">
                    <input  id="consulta" type="text" class="validate" name="consulta">
                    <button class="btn waves-effect waves-light default_color right" type="submit" id="btncon" name="btncon">Consultar
                    </button>

                    <br><br><br><br><br><br>
                    <label for="consulta">Ingrese rut del Apoderado</label>
                </div>
                <br>
            </form>
            <br>
            <br>
            <table id="tabla" class="striped ">
            <caption style="font-size: large">LISTADO DE APODERADOS</caption>
            <tr style="border: 2px solid blue">
                <th style="border: 2px solid blue">RUT</th>
                <th style="border: 2px solid blue">NOMBRE</th>
                <th style="border: 2px solid blue">APELLIDO</th>
                <th style="border: 2px solid blue">TELEFONO</th>
                <th style="border: 2px solid blue">PAGO</th>
                <th style="border: 2px solid blue">ABONO A LA FECHA</th>


            </tr>
            <?php

            if(isset($_POST['btncon'])){
                $rut = $_POST['consulta'];
                $u->consulatarapoderadoabono($rut);
            }else{

                $u->listarapoderadoabono();

            }
            ?>


            </table>

            <div class="row">
                <div class="input-field col s12">
                    <a  class="btn waves-effect default_color col s12" >Imprimir Consulta</a>
                </div>
            </div>
        </div>
    </div>
</div>





<!--  Scripts-->
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>

</body>
</html>