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
    <title>Modificar Alumno</title>

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
                    <li><a href="alureg.php"><span class="mdi-action-account-circle"></span>    Registrar</a></li>
                    <li><a href="alucon.php"><span class="mdi-action-search"></span>   Consultar</a></li>
                    <li><a href="alueli.php"><span class="mdi-alert-warning"></span>   Eliminar</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- -->
<?php
require("utilidades.php");
$u = new Utilidades();

$rs="";
$rut="";
$nom="";
$ape = "";
$dir = "";
$fech = "";
$apo = 1;
$col =1;
$cor="";
$cau="";

$existe = 0;

if(isset($_POST['btncon'] )){ // PINCHADO EL BOTON PARA MODIFICAR
    $rut = $_POST['consulta'];
    $rs = $u->consultaralumno($rut);
    if(!empty($rs)){   // LO ENCONTRO
        $rut = $rs[0];
        $nom = $rs[1];
        $ape = $rs[2];
        $fech = $rs[3];
        $dir = $rs[4];
        $apo = $rs[5];
        $col = $rs[6];
        $cor=  $rs[7];
        $cau=  $rs[8];
        $existe = 1;
    }else{
        $existe = 2;
    }
}
if(isset($_POST['btnmod'])){
    $rut = $_POST['txtrut1'];
    $nom = $_POST['txtnom'];
    $ape = $_POST['txtape'];
    $fech = $_POST['txtfecha'];
    $apo = $_POST['cboapo'];
    $dir = $_POST['txtdir'];
    $col = $_POST['cbocol'];
    $cor=$_POST['txtcoor'];
    $cau= $_POST['txtcau'];

    $u->modificaralumno($rut, $nom, $ape,$fech, $dir,$apo,$col,$cor,$cau);
    $rs="";
    $rut="";
    $nom="";
    $ape = "";
    $dir = "";
    $fech = "";
    $apo = 1;
    $col =1;
    $cor="";
    $cau="";

    $existe = 0;
}


?>

<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <div class="input-field col s12">
                    <form id="form1" name="form1" method="post" action="alumod.php">

                        <input  id="consulta" name="consulta" type="text" class="validate" required value="<?php echo $rut;?>">


                        <label for="consulta">Ingresar Rut del Alumno</label>
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btncon" name="btncon">Consultar
                        </button>
                        <br>
                        <br>
                        <br>
                </div>
                </form>
            </div>

            <div class="row">
                <form id="form2" name="form2" method="post" action="alumod.php">
                    <div class="col s12">
                        <div class="row">



                        </div>
                        <form class="col s12" id="form1" name="form1" method="post" action="alumod.php" >
                            <div class="row">
                                <div class="input-field col s6">
                                    <input  id="txtnom" type="text" name="txtnom" class="validate" value="<?php echo $nom;?>">
                                    <label for="txtnom">Nombre</label>
                                    <input  id="txtrut1" type="hidden" name="txtrut1" class="validate" value="<?php echo $rut;?>">
                                </div>
                                <div class="input-field col s6">
                                    <input  id="txtape" type="text" name="txtape" class="validate" value="<?php echo $ape;?>">
                                    <label for="txtape">Apellido</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input  id="fecha " name="txtfecha" type="date" class="datepicker"<?php echo $fech;?>>
                                    <label for="fecha ">Fecha de Nacimiento</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="txtpass" type="text" name="txtdir" class="validate" value="<?php echo $dir;?>">
                                    <label for="txtpass">Direccion</label>
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
                                        <input id="txtcoor" type="text" name="txtcoor" class="validate" value="<?php echo $cor;?>">
                                        <label for="txtcoor">Coordenadas</label>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="txtcau" type="text" name="txtcau" class="validate" value="<?php echo $cau;?>">
                                        <label for="txtcau">Causal de modificacion</label>
                                    </div>

                                </div>

                            </div>
                            <div class="col offset-s7 s5">
                                <button class="btn waves-effect waves-light default_color right" type="submit" id="btnmod" name="btnmod">Modificar
                                </button>

                            </div>




                    </div>
                    <br><br>
            </div>
            </form>
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
