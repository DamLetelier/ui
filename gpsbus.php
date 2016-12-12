<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Transportes Tía Carola</title>

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

</div>

<!--Navigation-->
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <ul class="right hide-on-med-and-down">
                    <li><a href="apo.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                    <li><a href="logout.php"><span class="mdi-social-person-outline"></span>  Cerrar Sesión</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="apo.php"><span class="mdi-navigation-arrow-back"></span>   Volver</a></li>
                    <li><a href="logout.php"><span class="mdi-social-person-outline"></span>  Cerrar Sesión</a></li>
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
                <h3 class="center header text_h2"><span class="span_h2">Ubicación actual del bus</span></h3>
                <style>
                    .google-maps {
                        position: relative;
                        padding-bottom: 75%; // This is the aspect ratio
                    height: 0;
                        overflow: hidden;
                    }
                    .google-maps iframe {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100% !important;
                        height: 100% !important;
                    }
                </style>
                <!-- <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13204.879676401468!2d-70.73638166213156!3d-34.16629456046154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1468912385560" width="1000" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>            </div>
                </div> -->
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1QO4tXlJ5AuVMuIxerp4Zk9rThPY" width="1000" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>            </div>
            </div>
    </div>
    </div>
</div>



<!--Footer-->
<footer class="page-footer default_color scrollspy">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <form class="col s12" action="contact.php" method="post">
                    <div class="row" id="contact">
                        <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix white-text"></i>
                            <input id="icon_prefix" name="name" type="text" class="validate white-text">
                            <label for="icon_prefix" class="white-text">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="mdi-communication-email prefix white-text"></i>
                            <input id="icon_email" name="email" type="email" class="validate white-text">
                            <label for="icon_email" class="white-text">Correo</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text"></textarea>
                            <label for="icon_prefix2" class="white-text">Escriba su Mensaje aquí</label>
                        </div>
                        <div class="col offset-s7 s5">
                            <button class="btn waves-effect waves-light red darken-1" type="submit">Enviar
                                <i class="mdi-content-send right white-text"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="caa">
                <br>
                <br>
                <h5 class="white-text" align="right">Tu opinión es importante para nosotros</h5>
                <i> <h6 class="white-text" align="right">Carola Asdfgh<br>
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

</body>
</html>
