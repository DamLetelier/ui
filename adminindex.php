<?php
/*session_start();
if(!isset($_SESSION['logged'])){ // PREGUNTAR SI NO ESTA CREADA LA SESION LOGIN
    header("Location:login.php");
}
if(isset($_GET['cerrar'])){
    session_unset(); //vaciar el contenido de las sesiones
    session_destroy(); // destruye las sesiones
    header("location:login.php");
}*/
?>

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
                <ul class="left">
                <a href="logout.php" id="logo-container" name="cerrar" class="brand-logo">Cerrar Sesión</a><br>
                </ul>
                <ul class="right">
                        <li><a href="reporte.php"><span class="mdi-action-info"></span>   Reportes</a></li>
                        <li><a href="alertas.php"><span class="mdi-alert-warning"></span>   Alertas</a></li>


                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a class='dropdown-button' href="#asistente" data-activates='asistente1'>Asistente<i class="mdi-navigation-arrow-drop-down  right"></i></a></li>
                    <!-- Dropdown Structure -->
                    <ul id='asistente1' class='dropdown-content'>
                        <li><a href="asisreg.php">Registrar</a></li>
                        <li><a href="asiscon.php">Consultar</a></li>
                        <li><a href="asismod.php">Modificar</a></li>
                        <li><a href="asiseli.php">Eliminar</a></li>

                    </ul>
                    <li><a class='dropdown-button' href="#choferes1" data-activates='choferes1'>Choferes<i class="mdi-navigation-arrow-drop-down  right"></i></a></li>
                    <!-- Dropdown Structure -->
                    <ul id='choferes1' class='dropdown-content'>
                        <li><a href="chofreg.php">Registrar</a></li>
                        <li><a href="chofcon.php">Consultar</a></li>
                        <li><a href="chofmod.php">Modificar</a></li>
                        <li><a href="chofeli.php">Eliminar</a></li>
                        
                    </ul>
                    <li><a class='dropdown-button' href="#apoderado" data-activates='apoderado1'>Apoderado<i class="mdi-navigation-arrow-drop-down  right"></i></a></li>
                    <!-- Dropdown Structure -->
                    <ul id='apoderado1' class='dropdown-content'>
                        <li><a href="aporeg.php">Registrar</a></li>
                        <li><a href="apocon.php">Consultar</a></li>
                        <li><a href="apomod.php">Modificar</a></li>
                        <li><a href="apoeli.php">Eliminar</a></li>
                    </ul>
                    <li><a class='dropdown-button' href="#alumno" data-activates='alumno1'>Alumno<i class="mdi-navigation-arrow-drop-down  right"></i></a></li>
                    <!-- Dropdown Structure -->
                    <ul id='alumno1' class='dropdown-content'>
                        <li><a href="alureg.php">Registrar</a></li>
                        <li><a href="alucon.php">Consultar</a></li>
                        <li><a href="alumod.php">Modificar</a></li>
                        <li><a href="alueli.php">Eliminar</a></li>
                    </ul><li><a class='dropdown-button' href="#colegio1" data-activates='colegio1'>Otros<i class="mdi-navigation-arrow-drop-down  right"></i></a></li>
                    <!-- Dropdown Structure -->
                    <ul id='colegio1' class='dropdown-content'>
                        <li><a href="colreg.php">Colegios</a></li>
                        <li><a href="patente.php">Patentes</a></li>
                    </ul><li><a class='dropdown-button' href="#pago1" data-activates='pago1'>Pago<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                    <!-- Dropdown Structure -->
                    <ul id='pago1' class='dropdown-content'>
                        <li><a href="pagreg.php">Registrar</a></li>
                        <li><a href="pagcon.php">Consultar</a></li>
                        <li><a href="pagmod.php">Morosos</a></li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!--Hero-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
                <span>Transportes Tía Carola</span>
                <span class="cd-words-wrapper waiting">
                    <b class="is-visible">Bienvenido Administrador</b>
                </span>
        </h1>
    </div>
</div>

<!--Intro and service-->






<!--  Scripts-->
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>

</body>
</html>
