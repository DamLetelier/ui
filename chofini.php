
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
    <link href="css/style.css" type="text/css" rel="stylesheet" >
    <link href="css/animate.css" type="text/css" rel="stylesheet" >
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
                <a href="index.php" id="logo-container" class="brand-logo">SB System</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="chof.php"><span class="mdi-action-settings-power"></span>   Finalizar Recorrido</a></li>
                    <li><a href="logout.php"><span class="mdi-social-person-outline"></span>  Cerrar Sesión</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="chof.php">Finalizar Recorrido</a></li>
                    <li><a href="index.php">Cerrar Sesión</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!--Hero-->


<!--Intro and service-->
<div class="section scrollspy">
    <div class="container">
        <div class="row" id="intro">

            <div  class="col s12">
                <h1 class="center header text_h1"><span class="animated infinite bounceInRight span_h2 ">EN RUTA</span></h1>
            </div>
            <div  class="responsive-image">
                <center><img src="img/bus2.gif" class="animated infinite bounceInLeft responsive-image" width="300"></center>
            </div>
        </div>
    </div>
</div>

<!--Work-->




<!--Parallax-->
    <div class="parallax-container">
    <div class="parallax"><img src="img/mapa.jpg"></div>

</div>


<!--Footer-->
<footer class="page-footer default_color scrollspy">
    <div class="container">


        <div class="caa">
            <br>
            <br>
            <h5 class="white-text" align="right">¿Problemas en la Ruta?</h5>
            <i> <h6 class="white-text" align="right">Llama a Carola Mora o a la persona encargada<br>
                    Número Teléfono: 12345678<br>
                    Número Celular: 87654321</h6></i>
            </ul>
        </div>
    </div>
    </div>
    <div class="footer-copyright default_color">
        <div class="container">

        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>
<script>$.fn.extend({
        animateCss: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $(this).addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);
            });
        }
    });</script>

<script>$('#yourElement').animateCss('bounce');</script>

</body>
</html>
