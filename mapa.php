
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
</head>

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

                    var coor=  document.getElementById('asdf').innerHTML=+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
                    var dir= results[0]['formatted_address'];
                    $("#dir").load("accion.php",{dir});
                    alert($(".coor").val());


                }
            });
        });



    }

</script>

<body onload="initMap()">
<h1>Obtener Coordenadas a partir de una dirección</h1>
<div id="mapa" style="width: 450px; height: 350px;"> </div>
<div><p id="asdf"></p></div>

</body>
</html>

