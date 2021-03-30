<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" >    
<script type="text/javascript"
  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB0Yjxdzk6_na_1ncre_8YSxhTNbAqkPP4&sensor=false">
</script>

 </head>
<body>
<div id="judul">
	<div id="slogan">SIG PERPUSTAKAAN UMUM KOTA YOGYAKARTA</div>
</div>
<div id="banner">

<div id="floating-panel">
<input id="pac-input" class="controls" type="text" placeholder="Kotak Pencarian">
<hr/>
	<table>
	<tr>
		<td><img src='images/star.png' height='16' width='16' align='left'></td>
		<td>
		   <input id="start" class="controls" type="text" placeholder="Masukkan nama jalan" style="width: 250px;">
		</td>
	</tr>
	<tr>
		<td><img src='images/finis.png' height='22' width='16' align='left'></td>
		<td>
		  <select id="end" class="controls" onchange="calcRoute(); " style="width: 250px;">
			  <option value="NONE" >Pilih lokasi</option>
			  <option value="-7.788584, 110.370371">Perpustakaan St. Ignatius</option>
			  <option value="-7.813057, 110.362000">Perpustakaan Gelaran Indonesia Buku</option>
			  <option value="-7.776363, 110.367644">Perpustkaan Unit Badran 1</option>
			  <option value="-7.786596, 110.357315">Perpustakaan Unit Badran 2</option>
			  <option value="-7.792721, 110.365588">Perpustakaan Daerah Unit Malioboro</option>
			  <option value="-7.785603, 110.372019">JSC Perpustakaan</option>
			  <option value="-7.784092, 110.374463">Perpustakaan Kota Yogyakarta</option>
		  </select>
		</td>
	</tr>
	<tr>
		<td><img src='images/direk.png' height='20' width='20' align='left'></td>
		<td>
		   <select id="mode" class="controls" style="width: 250px;" >
			  <option value="NONE">Pilih model perjalanan</option>
			  <option value="DRIVING">Driving</option>
			  <option value="WALKING">Walking</option>
			  <option value="BICYCLING">Bicycling</option>
			  <option value="TRANSIT">Transit</option>
		   </select>	
		</td>
	</tr>
	</table>
	
</div>	
</div>
<div id="right-panel"></div>
<div id="googleMap">

<script>
function load() 
	{
		var directionsService = new google.maps.DirectionsService;
		var directionsDisplay = new google.maps.DirectionsRenderer;
		var map = new google.maps.Map(document.getElementById("map"), 
		{
			center: new google.maps.LatLng(-7.7955798, 110.3694896),
			zoom: 14,
			mapTypeId: 'roadmap'
		});
		directionsDisplay.setMap(map);
		var infoWindow = new google.maps.InfoWindow;
		  
		calculateAndDisplayRoute(directionsService, directionsDisplay);
		document.getElementById('mode').addEventListener('change', function() 
		{
			calculateAndDisplayRoute(directionsService, directionsDisplay);
		});
		
	// Change this depending on the name of your PHP file
		downloadUrl("phpsqlajax_genxml3.php", function(data) 
		{
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName("marker");
			for (var i = 0; i < markers.length; i++) 
			{
			  var name = markers[i].getAttribute("name");
			  var info = markers[i].getAttribute("info");
			  var url = markers[i].getAttribute("url");
			  var address = markers[i].getAttribute("address");
			  var images = markers[i].getAttribute("images");
			  var point = new google.maps.LatLng(
				  parseFloat(markers[i].getAttribute("lat")),
				  parseFloat(markers[i].getAttribute("lng")));
			  var html = "<h4>" + name +"</h4><h5>"+ address +"<br/>Alamat Website: <a href= '"+url+"' target='_blank'>"+ url +"</a>"+
			  "<hr/><p style='text-align:justify'><img src="+images+" height='80' width='80' vspace='7' hspace='5' align='left'>"+ info +"</h5></P>"+
			  "<input id='tombol' type='button' value='Lihat gambar' style='text-align: center' onclick='isi()' />"+
              "<div id='isiform'></div>";
			   
			  //var icon = customIcons[type] || {};
			  var image = 'images/perpus3.png';
			  var marker = new google.maps.Marker({
				map: map,
				position: point,
				icon: image
				//shadow: icon.shadow
			  });
			  
			  bindInfoWindow(marker, map, infoWindow, html);
			}
			
		  });
		  
		  var origin_input = document.getElementById('start');
		 
		 /* function expandViewportToFitPlace(map, place) {
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
        }
		  var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
          origin_autocomplete.bindTo('bounds', map);*/
		  
		  var onChangeHandler = function() {
				calculateAndDisplayRoute(directionsService, directionsDisplay);
				};
				document.getElementById(origin_autocomplete).addEventListener('change', onChangeHandler);
				document.getElementById('end').addEventListener('change', onChangeHandler);
		  
				
	}
	
		  origin_autocomplete.addListener('place_changed', function() {
          var place = origin_autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }
          expandViewportToFitPlace(map, place);

          // If the place has a geometry, store its place ID and route if we have
          // the other place ID
          origin_place_id = place.place_id;
          route(origin_place_id, destination_place_id, travel_mode,
                directionsService, directionsDisplay);
        });

	
function calculateAndDisplayRoute(directionsService, directionsDisplay) 
	{
		var selectedMode = document.getElementById('mode').value;
		directionsService.route(
		{
			origin: document.getElementById('start').value,
			destination: document.getElementById('end').value,
			travelMode: google.maps.TravelMode[selectedMode]
		}, function(response, status) 
		{
			if (status === google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			} else {
				window.alert('Permintaan gagal karena ' + status);
			}
		});
	}
	
function bindInfoWindow(marker, map, infoWindow, html) 
	{
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

function downloadUrl(url, callback) 
	{
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
      request.onreadystatechange = function() 
	  {
          if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
      request.open('GET', url, true);
      request.send(null);
    }
function doNothing() {}
function isi(){
   cForm ="Maaf blum ada gambar....<br/>";
   cForm += "<input id='tombol' type='button' value='Tutup' style='text-align: center' onclick={document.getElementById('isiform').innerHTML=''} />";
   document.getElementById('isiform').innerHTML =cForm;
 };

  </script>
  </head>

  <body onload="load()">
    <div id="map" style="width: auto; height: 100%"></div>
  </body>
</html>