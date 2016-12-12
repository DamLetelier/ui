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
    <title>Registrar Apoderado</title>

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
                    <li><a href="apocon.php"><span class="mdi-action-search"></span>    Consultar</a></li>
                    <li><a href="apomod.php"><span class="mdi-action-view-module"></span>   Modificar</a></li>
                    <li><a href="apoeli.php"><span class="mdi-alert-warning"></span>   Eliminar</a></li>
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

            <div class="row">
                <form class="col s12" id="form1" name="form1" method="post" action="aporeg.php" >
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="txtnom" type="text" name="txtnom" class="validate">
                            <label for="txtnom">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <input  id="txtape" type="text" name="txtape" class="validate">
                            <label for="txtape">Apellido</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="txtrut" type="text" name="txtrut" class="validate">
                            <label for="txtrut">Rut</label>
                        </div>

                        <div class="input-field col s6">
                            <input  id="txtfon" type="text" name="txtfon" class="validate">
                            <label for="txtfon">Telefono</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="txtpass" type="password" name="txtpass" class="validate">
                            <label for="txtpass">Contraseña</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="txtdir" type="text" name="txtdir" class="validate">
                            <label for="txtdir">Direccion</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="txtpag" type="number" name="txtpag" class="validate">
                            <label for="txtpag">Pago</label>
                        </div>

                    </div>
                    <br>

                    <div class="col offset-s7 s5">
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btnreg" name="btnreg">Registrar
                        </button>

                    </div>


                </form>
            </div>
            </div>

        <?php
        require("utilidades.php");
        $u = new Utilidades();
        if(isset($_POST['btnreg'])){
            $rut = $_POST['txtrut'];
            $nom = $_POST['txtnom'];
            $ape = $_POST['txtape'];
            $dir = $_POST['txtdir'];
            $pass = $_POST['txtpass'];
            $fon = $_POST['txtfon'];
            $pag = $_POST['txtpag'];
                $u->registrarapoderado($rut,$nom,$ape,$dir,$pass,$fon,$pag);
                $u->regusuapo($rut,$pass);
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
