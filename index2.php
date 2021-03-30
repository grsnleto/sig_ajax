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
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
<hr/>
	<table>
	<tr>
		<td><img src='images/direk.png' height='18' width='18' align='left'></td>
		<td>
		   <select id="mode">
			  <option value="NONE">Pilih</option>
			  <option value="DRIVING">Driving</option>
			  <option value="WALKING">Walking</option>
			  <option value="BICYCLING">Bicycling</option>
			  <option value="TRANSIT">Transit</option>
		   </select>	
		</td>
	</tr>
	<tr>
		<td><img src='images/star.png' height='14' width='14' align='left'></td>
		<td>
		  <select id="start" onchange="calcRoute();">
			  <option value="NONE" >Pilih</option>
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
		<td><img src='images/finis.png' height='20' width='14' align='left'></td>
		<td>
		  <select id="end" onchange="calcRoute();">
			  <option value="NONE" >Pilih</option>
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
	</table>
	
</div>	
</div>
<div id="right-panel"></div>
<div id="googleMap">

    <script>
	
		
      // Change this depending on the name of your PHP file
      downloadUrl("phpsqlajax_genxml3.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
                    var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));

	    var objek = [
            {
                "title": "Perpustkaan Unit Badran 1",
                "lat": -7.776363,
                "lng": 110.367644,
                "description": "<h4>Unit Badran I</h4> <h5>Jl Tentara Rakyat Mataram No. 4. Yogyakarta.Telp :"+
				"(0274) 588219<hr/>"+
				"<p style='text-align:justify'><img src='images/perpus.png' height='80' width='80' vspace='7' hspace='5' align='left'>"+
				"Jam Buka :</br> Senin-Kamis= 08.00 s/d 21.00 WIB "+
				"</br> Jumat= 08.00 s/d 11.00 WIB</br>Sabtu= 18.00 s/d 13.00 WIB</h5></p>"
            },
            {
                "title": "Perpustakaan Unit Badran 2",
                "lat": -7.786596,
                "lng": 110.357315,
                "description": "<h4>Unit Badran II</h4><h5>Jl. Tentara Rakyat Mataram No. 29 Yogyakarta.Telp."+
				" (0274) 513969, 563367.<hr/>"+
				"<p style='text-align:justify'><img src='images/perpus.png' height='80' width='80' vspace='7' hspace='5' align='left'>"+
				"Jam Buka :</br>Senin-Kamis= 08.00 s/d 14.00 WIB"+
				"</br>Jumat= 08.00 s/d 11.00 WIB</br>Sabtu= 18.00 s/d 12.00 WIB</h5></P>"
            },
            {
                "title": "Perpustakaan Daerah Unit Malioboro",
                "lat": -7.792721,
                "lng": 110.365588,
                "description": "<h4>Unit Malioboro</h4><h5> Jl. Malioboro 175 Yogyakarta.Telp."+
				"(0274) 512473<hr/>"+
				"<p style='text-align:justify'><img src='images/perpus.png' height='80' width='80' vspace='7' hspace='5' align='left'>"+
				"Jam Buka :</br>Senin-Kamis= 08.00 s/d 14.00 WIB"+
				"</br>Jumat= 08.00 s/d 11.00 WIB</br>Sabtu = 18.00 s/d 12.00 WIB</h5></P>"
            },
			{
                "title": "Jogja Study Center (JSC)Perpustakaan",
                "lat": -7.785603,
                "lng": 110.372019,
                "description":"<h4>Unit Jogja Study Centre (JSC)</h4><h5>Jl. Faridan M. Noto No. 21 Kotabaru, Yogyakarta.Telp."+
				"(0274) 556920, 556921<hr/>"+
				"<p style='text-align:justify'><img src='images/perpus.png' height='80' width='80' vspace='7' hspace='5' align='left'>"+
				"Jam Buka :</br>Senin-Kamis = 08.00 s/d 17.00 WIB"+
				"</br>Jumat = 08.00 s/d 11.00 WIB</br>Sabtu = 18.00 s/d 13.00 WIB</h5></P>"
            },
			{
                "title": "Perpustakaan Kota Yogyakarta",
                "lat": -7.784092,
                "lng": 110.374463,
                "description":"<h4>Perpuskot [Perpustakaan Kota yogyakarta]</h4>"+
				"<h5>Jalan Suroto No.9 Kotabaru Yogyakarta.Telep.0274-511314</br>"+
				"Alamat website : <a href= 'http://perpustakaan.jogjakota.go.id/' target='_blank'>http://perpustakaan.jogjakota.go.id/</a><hr/>"+
				"<p style='text-align:justify'><img src='images/perpus.png' height='80' width='80' vspace='7' hspace='5' align='left'>"+
				"Jam Buka:</br>Senin = 08.00 s/d 15.30 WIB</br>Selasa-Jumat = 08.00 s/d 17.00 WIB"+
				"</br>Sabtu = 08.00 s/d 15.00 WIB</br>Minggu = 09.00 s/d 14.00 WIB</h5></p>"
            },
			{
                "title": "Perpustakaan St. Ignatius Yogyakarta",
                "lat": -7.788584,
                "lng": 110.370371,
                "description":"<h4>Perpustakaan St. Ignatius Yogyakarta</h4><h5>Jalan Abu Bakar Ali No.1"+
				"</br>Kotabaru, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta<hr/>"+
				"<p style='text-align:justify'><img src='images/perpus.png' height='80' width='80' vspace='7' hspace='5' align='left'>"+
				"</br>Perpustakaan St.Ignatius yang juga dikenal dengan nama Perpustakaan Kolsani,"+
				" terletak di samping toko puskat, di belakang Gereja Kotabaru.  Perpustakaan ini"+
				" kaya dengan beragam koleksi literatur akademik, mulai dari Filsafat, Agama, Politik,"+
				" Pendidikan, Sejarah, Bahasa, dlsb.erpustakaan ini juga menyediakan literatur mengenai"+
				" Islam abad 20 yang bahkan lebih lengkap dari perpustakaan non-universitas lain.</h5></p>"
			},
			{
                "title": "Perpustakaan Gelaran Indonesia Buku",
                "lat": -7.813057,
                "lng": 110.362000,
                "description": 
				"<h4>Perpustakaan Gelaran Indonesia Buku Yogyakarta</h4>"+
				"<h5>Jl. Patehan Wetan,Patehan,Kraton,Kota Yogyakarta, Daerah Istimewa Yogyakarta<hr/>"+
				"<p style='text-align:justify'><img src='images/perpus.png' height='80' width='80' vspace='7' hspace='5' align='left'>"+
				"Perpustakaan ini terletak di Indonesia Buku @radiobuku."+
				"Di Perpustakaan Gelaran Indonesia Buku, kamu bisa menikmati buku-buku yang dipajang di sana. Beragam"+
				"koleksi bisa kita akses, dari sejarah, etnografi, antropologi, biografi, tata kota, sastra, sains dan lain"+
				"sebagainya. Di perpus ini disimpan juga koleksi khusus Prof. George Junus Aditjondro.</h5></p>"
			}
		];

		
        var myCenter=new google.maps.LatLng(-7.7955798, 110.3694896);
        function initialize() 
		{
			//variabel untuk direction
			var directionsService = new google.maps.DirectionsService;
			var directionsDisplay = new google.maps.DirectionsRenderer;
			var mapProp = {
				center:myCenter,
				zoom:13,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			directionsDisplay.setMap(map);
			//directionsDisplay.setPanel(document.getElementById('right-panel'));
			
			//var control = document.getElementById('banner');
			//control.style.display = 'block';
			//map.controls[google.maps.ControlPosition.TOP_LEFT].push(control);
			
			
			
			calculateAndDisplayRoute(directionsService, directionsDisplay);
			document.getElementById('mode').addEventListener('change', function() {
			calculateAndDisplayRoute(directionsService, directionsDisplay);
			});
			
			//fungsi untuk infowindow
			var infowindow =  new google.maps.InfoWindow(
			{
			});

			for (var i = 0, length = objek.length; i < length; i++) 
			{
				var data=objek[i];
				var latLng = new google.maps.LatLng(data.lat, data.lng); 
				// Creating a marker and putting it on the map
				var image = 'images/perpus3.png';
				var marker = new google.maps.Marker(
				{
					position: latLng,
					icon: image,
					draggable: true,
					animation: google.maps.Animation.DROP,
					map: map,
					title: data.title
				});
				bindInfoWindow(marker, map, infowindow, data.description);
				
			} 
			
			//rute jalan
			var onChangeHandler = function() {
			calculateAndDisplayRoute(directionsService, directionsDisplay);
			};
			document.getElementById('start').addEventListener('change', onChangeHandler);
			document.getElementById('end').addEventListener('change', onChangeHandler); 
		
		}
		
		function calculateAndDisplayRoute(directionsService, directionsDisplay) {
		var selectedMode = document.getElementById('mode').value;
		directionsService.route({
		origin: document.getElementById('start').value,
		destination: document.getElementById('end').value,
		travelMode: google.maps.TravelMode[selectedMode]
		}, function(response, status) {
			if (status === google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			} else {
				window.alert('Permintaan gagal karena ' + status);
			}
		});
		}
		
				
		function bindInfoWindow(marker, map, infowindow, description) 
		{
			marker.addListener('click', function() {
				infowindow.setContent(description);
				infowindow.open(map, this);
			}, toggleBounce);
		}
        google.maps.event.addDomListener(window, 'load', initialize);
		
		function toggleBounce() 
		{
			if (marker.getAnimation() !== null) {
			marker.setAnimation(null);
			} else {
			marker.setAnimation(google.maps.Animation.BOUNCE);
			}
		}
		
		

	
	</script>
</div>
</body>

</html>