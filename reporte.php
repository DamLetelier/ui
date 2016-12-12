<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Ver Reportes</title>

    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
    <link href="css/style.css" type="text/css" rel="stylesheet" >
</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
    <script> $(document).ready(function() {
            $('select').material_select();
        });
    </script>
</div>
<?php

require("utilidades.php");
$u = new Utilidades();

$rs="";
$alert="";
$obs="";
$existe = 0;
?>


<!--Navigation-->
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <!--   <a href="index.php" id="logo-container" class="brand-logo">SB System</a>-->
                <ul class="leftt hide-on-med-and-down">
                    <li><a href="adminindex.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">

            </div>

            <div class="row">
                    <div class="row">
                        <div class="input-field col s6">
                            <div class="card hoverable small">
                                <div class="card-image">
                                    <img src="img/inasistencia.jpg">
                                    <span class="card-title black-text" id="cosa" name="cosa" >Asistencia</span>
                                </div>
                                <div class="card-content">
                                    <center><p>Aquí se puede generar un reporte de Inasistencia de acuerdo a las fechas indicadas por usted.</p></center>
                                </div>
                                <div class="card-action">


                                    <form type="get" id="formcsm" name="formcsm" action="reporte.php">
                                        <center> <a href="reporteasis.php" target="_blank">Ver Reporte</a></center>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="input-field col s6">
                            <div class="card hoverable small">
                                <div class="card-image">
                                    <img src="img/quiebra.jpg">
                                    <span class="card-title black-text" id="cosa" name="cosa">Reporte Moroso</span>
                                </div>
                                <div class="card-content">
                                    <center><p>Aquí se puede generar un reporte de Morosidad de acuerdo a las fechas indicadas por usted.</p></center>
                                </div>
                                <div class="card-action">
                                    <center> <a href="reportemoroso.php" target="_blank">Ver Reporte</a><center>
                                </div>
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <label>Seleccione el Mes que desea ver</label>
                            <br><br>
                            <!--SOY RE PAJERA MEN-->
                            <select class="browser-default">
                                <option value="" disabled selected>Indique el mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <br>
                    <br><br>



            </div>
        </div>
    </div>
    <!--  Scripts-->
    <script src="min/plugin-min.js"></script>
    <script src="min/custom-min.js"></script>
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30 // Creates a dropdown of 15 years to control year
        });
    </script>

    <script>  $(document).ready(function() {
            $('select').material_select();
        });
    </script>

</body>
</html>
