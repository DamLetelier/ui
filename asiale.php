<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Registrar Alertas</title>

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
                <a href="index.php" id="logo-container" class="brand-logo">SB System</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="asis.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                    <li><a href="index.php"><span class="mdi-social-person-outline"></span>  Cerrar Sesión</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="asis.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                    <li><a href="index.php"><span class="mdi-social-person-outline"></span>   Cerrar Sesión</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">

<br><br><br><br><br>
            </div>

            <div class="row">
                <form class="col s12" id="form1" name="form1" method="post" action="asiale.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
                            <select id="cboale" name="cboale">
                                <option value="" disabled selected></option>
                                <?php
                                $u->llenarcomboalerta($alert);
                                ?>
                            </select>
                            <label>Elegir el tipo de Alerta</label>
                        </div>

                    </div>



                    <div class="row">
                        <div class="input-field col s11">
                            <input id="txtobs" name="txtobs" type="text" class="validate">
                            <label for="txtobs">Información detallada acerca de la Alerta</label>

                        </div>
                    </div>
                    <br>
                    <div class="col offset-s7 s4">
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btnreg" name="btnreg">Registrar
                        </button>
                    </div>
                </form>
            </div>
<?php

    if(isset($_POST['btnreg'])) {
            $obs = $_POST['txtobs'];
            $alert = $_POST['cboale'];
            $u->regaler($alert,$obs);
            }

            // date_default_timezone_set('America/Santiago');
            //$datetime=date('Y-m-d H:i:s');
            //$position_fecha=explode(" ",$datetime);
            //$solo_fecha=$position_fecha[0];
            //$solo_hora=$position_fecha[1];
            ?>


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
<script> $('#textarea1').val('New Text');
    $('#textarea1').trigger('autoresize');</script>
</body>
</html>
