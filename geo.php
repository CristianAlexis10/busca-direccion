<html>
<head>
      <script src="https://maps.googleapis.com/maps/api/js"></script>
</head>
<body>

<div id="mapa"></div>
<strong>Mapa según Dirección</strong>
<!-- Datos a buscar -->
<form action="" method="post">
    <input type='text' name='direccion' placeholder='Dirección' /><br>
    <input type='text' name='ciudad' placeholder='Ciudad' /><br>
    <input type='text' name='pais' placeholder='País' /><br>
    <input type='submit' value='Buscar' />
</form>
 <?php 
include("funciones.php");  
if($_POST){
    // Buscamos la latitud, longitud en base a la direccion calle y número, ciudad, país
    $localizar=$_POST['direccion'].", ".$_POST['ciudad'].", ".$_POST['pais'];
 	$datosmapa = geolocalizar($localizar);
 	echo "<br><br><strong></stroing>Consulta: </strong>".$localizar;
	// Tomamos los datos que encontro la funcion
    if($datosmapa){
        $latitud = $datosmapa[0];
        $longitud = $datosmapa[1];
        $localizacion = $datosmapa[2];
 	}
}
?> 
 <script type="text/javascript">
        function init_map() {
		var myOptions = {
                zoom: 18,
 				center: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
			};
            map = new google.maps.Map(document.getElementById("mapa"), myOptions);
            //para el simbolo de ubicacion
            marker = new google.maps.Marker({
                map: map,
 				position: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>)
            });
            //informacion del lugar
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $localizacion; ?>"
 
            });
  
            infowindow.open(map, marker);
        }
 
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
   
</body>
</html>
 <style type="text/css">
 	#mapa {
 
        width: 620px;
        height: 400px;
 
        border: #000000 solid 1px;
        margin-top: 10px;
 
      }
 </style>
