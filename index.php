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
    <title>Transportes Tía Carola</title>

    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                    <li><a href="#intro">Nuestra Empresa</a></li>
                    <li><a href="#workweno">Servicios</a></li>
                    <li><a href="#teamweno">Comunidad</a></li>
                    <li><a href="#contact">Contáctenos</a></li>
                    <li><a href="login.php">Login</a></li>

                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#intro">Nuestra Empresa</a></li>
                    <li><a href="#workweno">Servicios</a></li>
                    <li><a href="#teamweno">Comunidad</a></li>
                    <li><a href="#contact">Contáctenos</a></li>
                    <li><a href="login.php">Login</a></li>


                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!--Hero-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>Nos Gusta Entregar</span>
            <br>
            <span class="cd-words-wrapper waiting">
                <b class="is-visible">Seguridad</b>
                <b>Confianza</b>
                <b>Economía</b>

            </span>
        </h1>
    </div>
</div>

<!--Intro and service-->
<div class="section scrollspy">
    <div class="container" id="intro">
        <div class="row">
            <div class="col s12">
                <h2 class="center header text_h2"><span class="span_h2">Transportes Tía Carola</span></h2> <br>
                <h3 class="center">La seguridad es lo primero</h3>
            </div>

            <div  class="col s12 m4 l4">
                <div class="center promo promo-example">

                    <i class="mdi-action-accessibility"></i>
                    <h5 class="promo-caption">Misión</h5>
                    <p class="light center">Brindar un servicio de transporte escolar de excelencia, calidad y oportunidad; basado en la satisfacción de las exigencias de nuestros clientes. Entregando tarifas, recorridos, y antecedentes de nuestros empleados de manera clara y transparente.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-image-flash-on"></i>
                    <h5 class="promo-caption">Visión</h5>
                    <p class="light center">Ser reconocidos en el medio como una flota seria, líder e innovadora en el transporte escolar, enfocada al logro, basada en una continua mejora. Además de mantener este compromiso con nuestros clientes y sus hijos.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-social-group"></i>
                    <h5 class="promo-caption">Oficina</h5>
                    <br>
                    <p class="light center">Ruta H-40 #490, Olivar</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Work-->
<div class="section scrollspy" id="work">
    <div class="container" id="workweno">
        <div class="row">
            <h2 class="center header text_b">Servicios</h2>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/bus.png" height="180">
                    </div>
                    <div class="card-content">
                        <span class="center card-title activator grey-text text-darken-4">GPS<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#contact"><center>Se parte de la comunidad</center></a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">School Bus System<i class="mdi-navigation-close right"></i></span>
                        <p><center>Monitoreo inteligente del transporte escolar, basado en tecnología GPS el cual permite que los apoderados tengan mayor control sobre la ubicación de los buses</center></center></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/asistente.png" height="180">
                    </div>
                    <div class="card-content">
                        <span class="center card-title activator grey-text text-darken-4">Usuarios<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#contact"><center>Se parte de la comunidad</center></a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">School Bus System<i class="mdi-navigation-close right"></i></span>
                        <p><center>Información relevante sobre alumnos y apoderados para mayor seguridad</center></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/inhabilidades.png" height="180">
                    </div>
                    <div class="card-content">
                        <span class="center card-title activator grey-text text-darken-4">Choferes<i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#contact"><center>Se parte de la comunidad</center></a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">School Bus System<i class="mdi-navigation-close right"></i></span>
                        <p><center>Información relevante sobre los choferes y seguridad ante su capacidad para trabajar con menores</center></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="img/mapa.jpg"></div>
</div>

<!--Team-->
<div class="section scrollspy" id="team">
    <div class="container" id="teamweno">
        <div class="row">
            <h2 class="header center text_b">Comunidad</h2>
            <div class="col s12 m3">
                <div class="card card-avatar">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="img/maria.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Carola Mora<br/>
                            <small><em><a class="red-text text-darken-1" href="#">Fundadora</a></em></small></span>
                        <p>
                            <a class="blue-text text-lighten-2" href="https://www.facebook.com/joash.c.pereira">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://twitter.com/im_joash">
                                <i class="fa fa-twitter-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://plus.google.com/u/0/+JoashPereira">
                                <i class="fa fa-google-plus-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://www.linkedin.com/in/joashp">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card card-avatar">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="img/maria2.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Maria Perez<br/>
                            <small><em><a class="red-text text-darken-1" href="#">Asistente</a></em></small>
                        </span>
                        <p>
                            <a class="blue-text text-lighten-2" href="https://www.facebook.com/joash.c.pereira">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://twitter.com/im_joash">
                                <i class="fa fa-twitter-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://plus.google.com/u/0/+JoashPereira">
                                <i class="fa fa-google-plus-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://www.linkedin.com/in/joashp">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card card-avatar">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="img/maria3.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Juan Perez<br/>
                            <small><em><a class="red-text text-darken-1" href="#">Asistente</a></em></small></span>
                        <p>
                            <a class="blue-text text-lighten-2" href="https://www.facebook.com/joash.c.pereira">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://twitter.com/im_joash">
                                <i class="fa fa-twitter-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://plus.google.com/u/0/+JoashPereira">
                                <i class="fa fa-google-plus-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://www.linkedin.com/in/joashp">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card card-avatar">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="img/maria4.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Carlos Perez<br/>
                            <small><em><a class="red-text text-darken-1" href="#">Asistente</a></em></small></span>
                        <p>
                            <a class="blue-text text-lighten-2" href="https://www.facebook.com/joash.c.pereira">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://twitter.com/im_joash">
                                <i class="fa fa-twitter-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://plus.google.com/u/0/+JoashPereira">
                                <i class="fa fa-google-plus-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://www.linkedin.com/in/joashp">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </p>
                    </div>
                </div>
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
            <div class="col l3 s12">
                <h5 class="white-text">Tu opinión es importante</h5>
                <ul>
                    <!--
                    <li><a class="white-text" href="index.html">Inicio</a></li>
                    -->
                    <!--
                    <li><a class="white-text" href="http://www.joashpereira.com/blog">Blog</a></li>
                    -->
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Redes Sociales</h5>
                <ul>
                    <li>
                        <a class="white-text" href="https://www.facebook.com/joash.c.pereira">
                            <i class="small fa fa-facebook-square white-text"></i> Facebook
                        </a>
                    </li>
                    <li>
                        <a class="white-text" href="https://github.com/joashp">
                            <i class="small fa fa-twitter-square white-text"></i> Twitter
                        </a>
                    </li>
                    <li>
                        <a class="white-text" href="https://www.linkedin.com/in/joashp">
                            <i class="small fa fa-linkedin-square white-text"></i> LinkedIn
                        </a>
                    </li>
                    <!--
                    <li>
                        <a class="white-text" href="https://www.linkedin.com/in/joashp">
                            <i class="small fa fa-tumblr-square white-text"></i> topkek
                        </a>
                    </li>
                    -->
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
