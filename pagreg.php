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
    <title>Registro De Pagos</title>

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

$abono="0";
$rut="";
$apo="";
$var="";
$existe="0";


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
                    <li><a href="pagcon.php"><span class="mdi-action-search"></span>    Consultar Pagos Totales</a></li>
                    <li><a href="pagmod.php"><span class="mdi-action-view-module"></span>    Pagos Morosos</a></li>
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
                <form class="col s12" id="form1" name="form1" method="post" action="pagreg.php" >



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
                            <input id="txtpag" type="number" name="txtpag" class="validate">
                            <label for="txtpag">Pago</label>
                        </div>
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
        </div>
    </div>
<div class="row">
    <div class="input-field col s6">
        <?php
        if(isset($_POST['btnreg'])) {



            $rut = $_POST['cboapo'];
            $abono = $_POST['txtpag'];
            $u->registrarabono2($rut, $abono);
            $rs = $u->sumaabonos($rut);
            if (!empty($rs)) {   // LO ENCONTRO
                $var = $rs[0];
                $existe = 1;
            } else {
                $existe = 2;
            }


            $u->registrarabono($rut,$var);

            

        }

        ?>

    </div>
</div>
        


        <!--  Scripts-->
        <script src="min/plugin-min.js"></script>
        <script src="min/custom-min.js"></script>

        <script>  $(document).ready(function() {
                $('select').material_select();
            });
        </script>


</body>
</html>
