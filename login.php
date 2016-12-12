<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>School Bus System</title>

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

<!--Navigation-->
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" id="logo-container" class="brand-logo">SB System</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">   <span class="mdi-navigation-arrow-back"></span>      Volver  </a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="index.php"> <span class="mdi-navigation-arrow-back"></span>        Volver   </a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>


<?php
require("utilidades.php");
$u = new Utilidades();
if(isset($_POST["btnent"])){
    $log = $_POST["txtlog"];
    $pas = $_POST["txtpas"];

    $u->validar($log,$pas);
}
if(isset($_GET['error'])){
    echo "DEBE LOGUEARSE PARA ACCEDER AL SISTEMA";
}
if(isset($_GET['salir'])){
    echo "Gracias por Preferirnos....";
}
?>
<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">

            </div>


            <div  class="responsive-image">
                <center><img src="img/logoinst1.png" class="responsive-image" width="200"></center>
            </div>

            <div class="row">
                <form class="col s12" id="form1" action="login.php" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="txtlog" type="text" class="validate" name="txtlog">
                            <label for="password">Ingrese su Rut</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="txtpas" type="password" class="validate" name="txtpas">
                            <label for="password">Ingrese su Contraseña</label>
                        </div>
                    </div>
<br>                <div class="row">

                        <div class="input-field col s12">
                          <input type="submit" id="btnent" name="btnent" class="btn default_color col s12" value="Iniciar Sesión">
                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>

<!--Footer-->

<!--  Scripts-->
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>

</body>
