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
    <title>Eliminar Chofer</title>

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

if(isset($_GET['ruteli'])){
    $rut = $_GET['ruteli'];
    $u->estadochofer($rut);
}?>

<!--Navigation-->
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><a href="adminindex.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                </ul>
                <ul class="right">
                    <li><a href="chofreg.php"><span class="mdi-action-account-circle"></span>    Registrar</a></li>
                    <li><a href="chofcon.php"><span class="mdi-action-search"></span>    Consultar</a></li>
                    <li><a href="chofmod.php"><span class="mdi-action-view-module"></span>   Modificar</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--Hero-->
<!--Intro and service-->

<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">


            </div>

            <form id="form1" name="form1" method="post" action="chofeli.php">
                <div class="input-field col s6">
                    <input  id="consulta" type="text" class="validate" name="consulta">
                    <button class="btn waves-effect waves-light default_color right" type="submit" id="btncon" name="btncon">Consultar
                    </button>

                    <br><br><br><br><br><br>
                    <label for="consulta">Ingrese rut del Chofer</label>
                </div>
                <br>
            </form>
            <br>
            <br>
            <table id="tabla" ">
            <caption style="font-size: large">LISTADO DE CHOFERES</caption>
            <tr style="border: 2px solid blue">
                <th style="border: 2px solid blue">RUT</th>
                <th style="border: 2px solid blue">NOMBRE</th>
                <th style="border: 2px solid blue">APELLIDO</th>
                <th style="border: 2px solid blue">DIRECCION</th>
                <th style="border: 2px solid blue">TELEFONO</th>
                <th style="border: 2px solid blue">INFORMACION ADICIONAL</th>
                <th style="border: 2px solid blue">Desvincular</th>

            </tr>
            <?php

            if(isset($_POST['btncon'])){
                $rut = $_POST['consulta'];
                $u->consultarchofer2($rut);
            }else{

                $u->listarchoferes2();

            }
            ?>



            </table>




<br>



        </div>
    </div>






</div>
</div>







<!--  Scripts-->
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>
<script>
    $(document).ready(function() {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>

</body>
</html>
