<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">

    <script src="js/jquery-3.1.1.min" type="text/javascript"></script>
    <script src="js/materialize.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ_EB35RiMtVI3d7m-DfQJsbZEfe6M7zQ"></script>



    <title>Registrar Alumnos</title>

    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet">

<script>



    $(document).ready(function() {
        load_map();
    });

    var map;

    function load_map() {
        var myLatlng = new google.maps.LatLng(20.68009, -101.35403);
        var myOptions = {
            zoom: 4,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    }

    $('#search').live('click', function() {
        // Obtenemos la dirección y la asignamos a una variable
        var address = $('#address').val();
        // Creamos el Objeto Geocoder
        var geocoder = new google.maps.Geocoder();
        // Hacemos la petición indicando la dirección e invocamos la función
        // geocodeResult enviando todo el resultado obtenido
        geocoder.geocode({ 'address': address}, geocodeResult);
    });

    function geocodeResult(results, status) {
        // Verificamos el estatus
        if (status == 'OK') {
            // Si hay resultados encontrados, centramos y repintamos el mapa
            // esto para eliminar cualquier pin antes puesto
            var mapOptions = {
                center: results[0].geometry.location,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
            // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
            map.fitBounds(results[0].geometry.viewport);
            // Dibujamos un marcador con la ubicación del primer resultado obtenido
            var markerOptions = { position: results[0].geometry.location }
            var marker = new google.maps.Marker(markerOptions);
            marker.setMap(map);
        } else {
            // En caso de no haber resultados o que haya ocurrido un error
            // lanzamos un mensaje con el error
            alert("Geocoding no tuvo éxito debido a: " + status);
        }
    }
</script>


</head>
<body onload="load_map()">

<div><input type="text" maxlength="100" id="address" placeholder="Dirección" /> <input type="button" id="search" value="Buscar" />
</div>
<br/>
<div id='map_canvas' style="width:600px; height:400px;">

</div>


</body>
</html>