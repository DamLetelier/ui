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
    <title>Registrar Patente</title>

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

$rs="";
$rut="";
$nom="";
$ape = "";
$dir = "";
$apo = "";
$col = 1;
$fech ="";

$existe = 0;
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
                    <li><a href="asiale.php"><span class="mdi-alert-warning"></span>   Alertas</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="responsive-image">
                <center><img src="img/escolar.jpg" class="animated infinite bounceInRight responsive-image" width="200"></center>
            </div>
            <h5></h5>
            <hr><hr><hr>
            <br><br>
            <div class="row">
                
                
                <form class="col s12" id="form1" name="form1" method="post" action="patente.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s7">
                            <input  id="txtpat" type="text" name="txtpat" class="validate">
                            <label for="txtpat">Registre Patente</label>
                        </div>
                    <br>
                        <br>
                        <br> <br> <br><br>
                        <div class="file-field input-field col s8">
                            <div class="btn">
                                <span>Subir</span>
                                <input input id="imagen" name="imagen" size="30" type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Elija una o más imágenes">
                            </div>
                        </div>
                        <br>

                    <div class="col offset-l0 s3">
                        <button class="btn waves-effect waves-light default_color right" type="submit" id="btnreg" name="btnreg">Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>


<?php

if(isset($_POST['btnreg'])){
    $num = $_POST['txtpat'];

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
    $u->registrarpatente($num,$nombre_img);
}
?>
<!--  Scripts-->
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>


</body>
</html>
