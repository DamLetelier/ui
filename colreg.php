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
    <title>Registrar Colegio</title>

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

                <ul class="left">
                    <li><a href="adminindex.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                </ul>
                <ul class="right">
                    <li><a href="patente.php"><span class="mdi-action-info"></span>   Patentes</a></li>
                    <li><a href="asiale.php"><span class="mdi-alert-warning"></span>   Alertas</a></li>
                </ul>
            </div>
            </div>
    </nav>
</div>

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="responsive-image">
                <center><img src="img/colegio.jpg" class="animated infinite bounceInLeft responsive-image" width="200"></center>
            </div>
                <h5></h5>
                <hr><hr><hr>
                    <br><br>

            <div class="row">
                <form class="col s12" id="form1" name="form1" method="post" action="colreg.php" >
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="txtnom" type="text" name="txtnom" class="validate">
                            <label for="txtnom">Nombre de Establecimiento</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="txtdir" name="txtdir" type="text" class="validate">
                            <label for="txtdir">Direccion del Establecimiento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="txtcoor" type="text" name="txtcoor" class="validate">
                            <label for="txtcoor">Coordenadas</label>
                        </div>

                    </div>

                    <div class="col offset-s7 s5">
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btnreg" name="btnreg">Registrar
                        </button>

                    </div>
                </form>
            </div>

            <?php
            require("utilidades.php");
            $u = new Utilidades();
            if(isset($_POST['btnreg'])){
                $nom = $_POST['txtnom'];
                $dir = $_POST['txtdir'];
                $cor = $_POST['txtcoor'];
                $u->registrarcolegio($nom,$dir,$cor);
            }
            ?>



        </div>
    </div>
</div>



<!--  Scripts-->
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>

</body>
</html>
