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

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/jquery-3.1.1.min" type="text/javascript"></script>
    <script src="js/materialize.js" type="text/javascript"></script>
    <script src="js/gmaps" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <?php
    $u="";

    ?>
    <script language="JavaScript" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ_EB35RiMtVI3d7m-DfQJsbZEfe6M7zQ"></script>





    <title>Registrar Alumnos</title>

    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >




</head>
<body id="top" class="scrollspy" onload="initMap()">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<?php
require("utilidades.php");
$u = new Utilidades();

$rs="";
$rut="";
$nom="";
$ape = "";
$dir = "";
$apo = "";
$col = 1;
$fec ="";
$cor="";



$existe = 0;


?>
<script>


    function initMap() {



        // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
        var map = new google.maps.Map(document.getElementById('mapa'), {
            center: {lat: -34.170263, lng: -70.740725},
            scrollwheel: true,
            zoom: 17,
            zoomControl: true,
            rotateControl : false,
            mapTypeControl: true,
            streetViewControl: false,
        });
        // Creamos el marcador
        var marker = new google.maps.Marker({
            position: {lat: -34.170263, lng: -70.740725},
            draggable: true
        });
        // Le asignamos el mapa a los marcadores.
        marker.setMap(map);
        // creamos el objeto geodecoder
        var geocoder = new google.maps.Geocoder();




        // le asignamos una funcion al eventos dragend del marcado


                google.maps.event.addListener(marker, 'dragend', function() {
                geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    // Mostramos las coordenadas obtenidas en el p con id coordenadas

                    var coor=  document.getElementById('txtdiv').innerHTML=+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
                    var dir= results[0]['formatted_address'];
                    $("#dir").load("accion.php",{dir});
                    alert($(".coor").val());


                }
            });
        });



    }

</script>

<!--Navigation-->
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><a href="adminindex.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                </ul>
                <ul class="right">
                    <li><a href="alucon.php"><span class="mdi-action-search"></span>    Consultar</a></li>
                    <li><a href="alumod.php"><span class="mdi-action-view-module"></span>   Modificar</a></li>
                    <li><a href="alueli.php"><span class="mdi-alert-warning"></span>   Eliminar</a></li>
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
                <form class="col s12" id="form1" name="form1" method="post" action="alureg.php" >
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
                            <input  id="fecha " name="txtfecha" type="date" class="datepicker">
                            <label for="fecha ">Fecha de Nacimiento</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="txtdir" type="text" name="txtdir" class="validate">
                            <label for="txtdir">Direccion</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select id="cboapo" name="cboapo">
                                <option value="" disabled selected></option>
                                <?php
                                $u->llenarcomborut($apo);
                                ?>
                            </select>
                            <label>Elegir Rut Apoderado</label>
                        </div>

                        <div class="input-field col s6">
                            <select id="cbocol" name="cbocol">
                                <option value="" disabled selected></option>
                                <?php
                                $u->llenarcombocolegio($col);
                                ?>
                            </select>
                            <label>Elegir Colegio</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="txtcoor" type="text" name="txtcoor" class="validate">
                                <label for="txtcoor">Coordenadas</label>
                            </div>
                            <button class="btn waves-effect waves-light default_color right" >Buscar
                            </button>

                        </div>

                        <div id="mapa" style="width: 450px; height: 350px;"> </div>
                        <div><p id="coordenadas" name="coordenadas" ></p></div>
                        <div><p id="dir" name="dir"></p></div>






   

                    <br>

                    <div class="col offset-s7 s5">
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btnreg" name="btnreg">Registrar
                        </button>

                    </div>


                </form>

            </div>
        </div>

        <?php

        if(isset($_POST['btnreg'])){
            $rut = $_POST['txtrut'];
            $nom = $_POST['txtnom'];
            $ape = $_POST['txtape'];
            $fec = $_POST['txtfecha'];
            $dir = $_POST['txtdir'];
            $apo = $_POST['cboapo'];
            $col = $_POST['cbocol'];
            $cor = $_POST['txtcoor'];
            $u->registraralumno($rut,$nom,$ape,$fec,$dir,$apo,$col,$cor);
        }
        ?>


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
