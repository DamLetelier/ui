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
    <title>Transporte Tía Carola</title>

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
                    <li><a href="asisreg.php"><span class="mdi-action-account-circle"></span>    Registrar</a></li>
                    <li><a href="asiscon.php"><span class="mdi-action-search"></span>    Consultar</a></li>
                    <li><a href="asiseli.php"><span class="mdi-alert-warning"></span>   Eliminar</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<br>
<br>
<!--Intro and service-->
<?php
require("utilidades.php");
$u = new Utilidades();

$rs="";
$rut="";
$nom="";
$ape = "";
$dir = "";
$fon = "";
$pass = "";
$info ="";
$cau="";


$existe = 0;

if(isset($_POST['btncon'] )){ // PINCHADO EL BOTON PARA MODIFICAR
    $rut = $_POST['consulta'];
    $rs = $u->consultarasistente($rut);
    if(!empty($rs)){   // LO ENCONTRO
        $rut = $rs[0];
        $nom = $rs[1];
        $ape = $rs[2];
        $dir = $rs[3];
        $pass = $rs[4];
        $fon = $rs[5];
        $info = $rs[6];
        $cau = $rs[7];
        $existe = 1;
    }else{
        $existe = 2;
    }
}
if(isset($_POST['btnmod'])){
    $rut = $_POST['txtrut1'];
    $nom = $_POST['txtnom'];
    $ape = $_POST['txtape'];
    $fon = $_POST['txtfon'];
    $pass = $_POST['txtpass'];
    $dir = $_POST['txtdir'];
    $info = $_POST['txtex'];
    $pat = $_POST['cbopat'];
    $cau = $_POST['txtcau'];



    $u->modificarasistente($rut, $nom, $ape,$dir,$pass,$fon,$info,$pat,$cau);
    $rs="";
    $rut="";
    $nom="";
    $ape = "";
    $dir = "";
    $fon = "";
    $pass = "";
    $info ="";
    $cau="";

    $existe = 0;
}


?>

<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <div class="input-field col s12">
                    <form id="form1" name="form1" method="post" action="asismod.php">

                    <input  id="consulta" name="consulta" type="text" class="validate" required value="<?php echo $rut;?>">


                        <label for="consulta">Ingresar Rut de Asistente</label>
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btncon" name="btncon">Consultar
                        </button>
                        <br>
                    <br>
                    <br>
                </div>
</form>
            </div>

            <div class="row">
                <form id="form2" name="form2" method="post" action="asismod.php">
                <div class="col s12">
          
                    <form class="col s12" id="form1" name="form1" method="post" action="asisreg.php" >
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
                            <div class="input-field col s6">
                                <input  id="txtfon" type="text" name="txtfon" class="validate" value="<?php echo $fon;?>">
                                <label for="txtfon">Telefono</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="txtpass" type="text" name="txtpass" class="validate" value="<?php echo $pass;?>">
                                <label for="txtpass">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="txtdir" type="text" name="txtdir" class="validate" value="<?php echo $dir;?>">
                                <label for="txtdir">Direccion</label>
                            </div>
                            <div class="input-field col s6">
                                <select id="cbopat" name="cbopat">
                                    <option value="" disabled selected></option>
                                    <?php
                                    $u->llenarcombopatente($pat);
                                    ?>
                                </select>
                                <label>Elegir Patente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="txtex" type="text" name="txtex" class="validate" value="<?php echo $info;?>">
                                <label for="txtex">Informacion Adicional</label>
                            </div>

                        </div>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Subir</span>
                                <input id="imagen" name="imagen" size="30" type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" placeholder="Elija una imagen">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="txtcau" type="text" name="txtcau" class="validate" value="<?php echo $cau;?>">
                                <label for="txtcau">Causal de modificacion</label>
                            </div>

                        </div>

                        <div class="col offset-s7 s5">
                            <button class="btn waves-effect waves-light default_color right" type="submit" id="btnmod" name="btnmod">Modificar
                            </button>

                        </div>


                    </form>

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
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 30 // Creates a dropdown of 15 years to control year
    });
</script>

<script>  $(document).ready(function() {
        $('select').material_select();
    });
</script>
<script>
    $('#textarea1').val('New Text');
    $('#textarea1').trigger('autoresize');
</script>
</body>
</html>
