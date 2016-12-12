<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Listar Alertas</title>

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
                <form class="col s12" id="form1" name="form1" method="post" action="alertas.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
                            <select id="cboale" name="cboale">
                                <option value="" disabled selected></option>
                                <?php
                                $u->llenarcomboalerta($alert);
                                ?>
                            </select>
                            <label>Seleccione tipo de alerta</label>
                        </div>
                        <div class="input-field col s4">
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btncon" name="btncon">Filtrar
                        </button>
                        </div>
                    </div>

<br>
                <br><br>
                    <div class="tabla" class="picker__day--highlighted">
                        <table id="tabla" ">
                        <caption style="font-size: large"></caption>
                        <tr style="border: 2px solid blue">
                            <th style="border: 2px solid blue">Tipo de Alerta</th>
                            <th style="border: 2px solid blue">Observación</th>
                            <th style="border: 2px solid blue">Fecha y Hora</th>
                        </tr>

                        <?php
                        if(isset($_POST['btncon'])){
                            $alert = $_POST['cboale'];
                            $u->consultaralertas($alert);
                        }else {
                            $u->listaralertas();
                        }
                        ?>
                        <?php

                        ?>
                    </div>


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
