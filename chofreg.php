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
<?php
require("utilidades.php");
$u = new Utilidades();
$com=1;
?>
<script> $(document).ready(function() {
        $('select').material_select();
    });
</script>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Registro de Choferes</title>

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
                    <li><a href="chofcon.php"><span class="mdi-action-search"></span>    Consultar</a></li>
                    <li><a href="chofmod.php"><span class="mdi-action-view-module"></span>   Modificar</a></li>
                    <li><a href="chofeli.php"><span class="mdi-alert-warning"></span>   Eliminar</a></li>
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
            <div class="row">
                <form class="col s12" id="form1" name="form1" method="post" action="chofreg.php" enctype="multipart/form-data">

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
                        </br>
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
                            <input id="txtex" type="text" name="txtex" class="validate">
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
                    <div class="col offset-s7 s5">
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btnreg" name="btnreg">Registrar
                        </button>
                    </div>
                </form>
            </div>



            <?php
            if(isset($_POST['btnreg'])){
                $rut = $_POST['txtrut'];
                $nom = $_POST['txtnom'];
                $ape = $_POST['txtape'];
                $dir = $_POST['txtdir'];
                $pass = $_POST['txtpass'];
                $fon = $_POST['txtfon'];
                $info = $_POST['txtex'];
                $pat = $_POST['cbopat'];

                // Recibo los datos de la imagen
                $nombre_img = $_FILES['imagen']['name'];
                $tipo = $_FILES['imagen']['type'];
                $tamano = $_FILES['imagen']['size'];

                //Si existe imagen y tiene un tamaño correcto
                if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000))
                {
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if (($_FILES["imagen"]["type"] == "image/gif")
                        || ($_FILES["imagen"]["type"] == "image/jpeg")
                        || ($_FILES["imagen"]["type"] == "image/jpg")
                        || ($_FILES["imagen"]["type"] == "image/png"))
                    {
                        // Ruta donde se guardarán las imágenes que subamos
                        $directorio = $_SERVER['DOCUMENT_ROOT'].'/pagina2/img/';
                        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
                    }
                    else
                    {
                        //si no cumple con el formato
                        echo "No se puede subir una imagen con ese formato ";
                    }
                }
                else
                {
                    //si existe la variable pero se pasa del tamaño permitido
                    if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
                }
                $u->registrochofer($rut,$nom,$ape,$dir,$pass,$fon,$info,$pat,$nombre_img);
                $u->regusuchof($rut,$pass);
            }
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
</body>
</html>
