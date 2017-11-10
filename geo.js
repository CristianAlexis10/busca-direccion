function init_map() {
 
            var myOptions = {
                zoom: 18,
 
                center: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
 
            };
            map = new google.maps.Map(document.getElementById("mapa"), myOptions);
 
            marker = new google.maps.Marker({
                map: map,
 
                position: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>)
            });
 
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $localizacion; ?>"
 
            });
            google.maps.event.addListener(marker, "click", function () {
 
                infowindow.open(map, marker);
            });
 
            infowindow.open(map, marker);
        }
 
        google.maps.event.addDomListener(window, 'load', init_map);