<?php 
	include 'db.php';


$cant=$conn->query("SELECT id,latitud,longitud from parqueaderos");
while($p=$cant->fetch_assoc()){
		$parkid=$p['id'];


		$lat=$p['latitud'];
		$lon=$p['longitud'];
	$query=$conn->query("UPDATE parqueaderos set coordenadas=POINT($lat, $lon) where id='$parkid'");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Google Maps</title>
	<link rel="stylesheet" type="text/css" href="style.css">



	<script src="https://kit.fontawesome.com/3c49f2c180.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anek+Malayalam:wght@100&family=Mr+Bedfort&family=Mr+Dafoe&family=Smooch&family=Josefin+Sans:wght@100;200;300;400;500;600;700;800&&family=Mochiy+Pop+One&display=swap" rel="stylesheet">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>
<body>
	<main id="main">
		<div class="main-item">
			<div class="main-header">
				<i class="fas fa-star" style="font-size:15px;margin-right:10px;color:#fc1"></i><p class="destino-title">Destino</p>
			</div>
			<p class="noruta">Selecciona un punto para comenzar...</p>


			<?php 
				$query=$conn->query("SELECT * from parqueaderos");

				if($query->num_rows>0){
					$cont=0;
					while($p=$query->fetch_assoc()){ $cont++; 
							$mypark=$p['id'];
						?>
						<div class="ruta ruta<?php echo $cont; ?>" style="display:none;">
							<div class="ruta-img">
								<img src="img/<?php echo $p['foto']; ?>">
							</div>
							<?php 
								$calidad=$conn->query("SELECT calidad from aire where park_id='$mypark'");
								$calidad=$calidad->fetch_assoc();
								$calidad=$calidad['calidad'];
							?>
							<p class="co2">Calidad de C02: <span class="aire-text"> <?php echo $calidad; ?></span></p>
							<button type="button" class="startTrip" name="parqueadero" coords="<?php echo $p['latitud']; ?>,<?php echo $p['longitud']; ?>" value="<?php echo $p['id']; ?>">Comenzar Viaje</button>
							<div class="segundaruta">
								<?php 
								$lat=$p['latitud'];
								$long=$p['longitud'];
									$otro=$conn->query("SELECT titulo,foto,latitud,longitud,calidad from parqueaderos as p inner join aire as a on p.id=a.park_id where p.id!='$mypark' and a.calidad<='$calidad' order by (ST_Distance_Sphere(coordenadas, POINT($lat,$long)) / 1000) desc");

									if($otro->num_rows>0){
									$otro=$otro->fetch_assoc();
								?>
								<div class="ruta2-header">
									<p>Otras opciones... a <?php echo $otro['titulo']; ?></p>
								</div>
								<div class="ruta2-body">
									<img src="img/<?php echo $otro['foto']; ?>">
									<p>Índice de Calidad de Aire:ICA <?php echo $otro['calidad']; ?></p>		
								</div>
								<div class="ruta2-footer">
									<button class="startTrip" coords="<?php echo $otro['latitud']; ?>,<?php echo $otro['longitud']; ?>">Ir</button>
								</div>
							<?php }else{
									$otro=$conn->query("SELECT titulo,foto,latitud,longitud,calidad from parqueaderos as p inner join aire as a on p.id=a.park_id where p.id!='$mypark' order by a.calidad asc");
									$otro=$otro->fetch_assoc(); ?>

									<div class="ruta2-header">
										<p>Otras opciones... a <?php echo $otro['titulo']; ?></p>
									</div>
									<div class="ruta2-body">
										<img src="img/<?php echo $otro['foto']; ?>">
										<p>Índice de Calidad de Aire:ICA <?php echo $otro['calidad']; ?></p>		
									</div>
									<div class="ruta2-footer">
										<button class="startTrip" coords="<?php echo $otro['latitud']; ?>,<?php echo $otro['longitud']; ?>">Ir</button>
									</div>
						<?php 	} ?>
							</div>

						</div>
			<?php 	}
				}
			?>
				<div id="sidebar"></div>
		</div>


		<div class="main-cel-item">
			<?php 
				$query=$conn->query("SELECT * from parqueaderos");

				if($query->num_rows>0){
					$cont=0;
					while($p=$query->fetch_assoc()){ $cont++; 
							$mypark=$p['id'];
						?>
			<div class="ruta ruta<?php echo $cont; ?>" style="display:none;">
				<div class="ruta-cel-cont">
					<img src="img/<?php echo $p['foto']; ?>" style="height:100%;height:200px;object-fit:cover;">
					<div>
						<div class="ruta-cel-info">
							<i class="fas fa-star" style="font-size:15px;margin-right:10px;color:#fc1"></i><p class="destino-title">Seleccionar Parqueadero...</p>
						</div>
						<?php 
							$calidad=$conn->query("SELECT calidad from aire where park_id='$mypark'");
							$calidad=$calidad->fetch_assoc();
							$calidad=$calidad['calidad'];
						?>
						<div class="ruta-cel-info">
							Índice de calidad de Aire: <?php echo $calidad; ?>
						</div>
						<button type="button" class="startTrip" name="parqueadero" coords="<?php echo $otro['latitud']; ?>,<?php echo $otro['longitud']; ?>" value="<?php echo $p['id']; ?>">Comenzar Viaje</button>
					</div>
				</div>
				
				
			</div>
		<?php } 
	    	} ?>
				<div id="sidebar2"></div>
		</div>

		<div id="map">
			
		</div>
	</main>
	




	<!-- CONEXION con Api De google MAPS -->
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHhPYF1Y6oQRkT8qfhxbwDYpLl4U9uOi4&libraries=&callback=iniciarMap&v=weekly"></script>
	<script type="text/javascript">
				var mycoords=0;
				//FUNCION LLAMADA POR EL CALLBACK DE LA CONEXIÓN DE ARRIBA.
		function iniciarMap(){

				//Mensaje para el usuario, solicitud/permiso para tomar la ubicación de él.
				navigator.geolocation.getCurrentPosition(encontrado,error);
				

				//En caso de permiso concedido se ejecuta esta función. Caso contrario, se ejecuta la función llamada Error.
				function encontrado(pos){

					// Esto de aquí son las coordenadas del usuario
					var coordenadasUsuario=pos.coords;
					mycoordsLAT=coordenadasUsuario.latitude;
					mycoordsLONG=coordenadasUsuario.longitude;
					mycoords={lat:mycoordsLAT, lng:mycoordsLONG};

					panel=document.getElementById("sidebar");
					panel2=document.getElementById("sidebar2");
					const directionsService=new google.maps.DirectionsService();
					const directionsRenderer=new google.maps.DirectionsRenderer({
						suppressMarkers: true
					});

					//centro de la ciudad de popayan – cauca - colombia. latitud 2.44191217950892,longitud -76.60622040196694
					var coord={lat:2.44191217950892, lng:-76.60622040196694}


					//Generando el mapa que se muestra en la página e imprimiéndolo en el elemento(div) con id map
					var map=new google.maps.Map(document.getElementById('map'),{
						zoom:17,
						center:coord,
						disableDefaultUI: true,
					});

					directionsRenderer.setMap(map);
					if (screen.width < 800){
						directionsRenderer.setPanel(panel2);
					}else{
						directionsRenderer.setPanel(panel);
					}
					

					
					var markerp = new google.maps.Marker({
						position:coord,
						color:'#999',
						map:map,
					});

					var circleP = new google.maps.Circle({
						map:map,
						radius:300,
						fillColor:'#0000',
						strokeOpacity: 1,
      					strokeWeight: 1
					});
					circleP.bindTo('center',markerp,'position');


					//LUGARES

					<?php 
						$lugares=$conn->query("SELECT * from parqueaderos");
						if($lugares->num_rows>0){
							$i=0;
							while($l=$lugares->fetch_assoc()){
								$i++;
					?>
					var c<?php echo $i; ?>={lat:<?php echo $l['latitud']; ?>,lng:<?php echo $l['longitud']; ?>}
					var m<?php echo $i; ?> = new google.maps.Marker({
						position:c<?php echo $i; ?>,
						color:'#999',
						map:map,
						icon:'img/parker3.png',
					});

					<?php 
						$mypark=$l['id'];
						$calidad=$conn->query("SELECT calidad from aire where park_id='$mypark'");
						$calidad=$calidad->fetch_assoc();
						$calidad=$calidad['calidad'];
					?>
					var r<?php echo $i; ?> = new google.maps.Circle({
						map:map,
						radius:180,
						zIndex:<?php echo 1+$calidad; ?>,
						fillColor:'#0000',
						strokeOpacity: 0,
      					strokeWeight: 0,
      					cursorPointer:0
					});
					r<?php echo $i; ?>.bindTo('center',m<?php echo $i; ?>,'position');

					const p<?php echo $i; ?> =
				    '<div id="content">' +
				    '<div id="siteNotice">' +
				    "</div>" +
				    '<h1 id="firstHeading" class="firstHeading"><?php echo $l['titulo']; ?></h1>' +
				    '<div id="bodyContent">' +
				    "<img src='img/<?php echo $l['foto']; ?>' style='width:100%;height:120px;object-fit:cover;'>" + 
				    "</div>" +
				    "</div>";

					  const window<?php echo $i; ?> = new google.maps.InfoWindow({
					    content: p<?php echo $i; ?>,
					  });

					  r<?php echo $i; ?>.addListener("click", () => {
					    window<?php echo $i; ?>.open({
					      anchor: m<?php echo $i; ?>,
					      map,
					      shouldFocus: false,
					    });
					    showinfo<?php echo $i; ?>();
					  });

					  m<?php echo $i; ?>.addListener("click", () => {
					    window<?php echo $i; ?>.open({
					      anchor: m<?php echo $i; ?>,
					      map,
					      shouldFocus: false,
					    });
					    showinfo<?php echo $i; ?>();
					  });
					//FIN LUGARES
						<?php } ?>
				<?php } ?>



						var um = new google.maps.Marker({
							position:mycoords,
							color:'#999',
							map:map,
							icon:'img/usericon.png'
						});

						$('.startTrip').on('click',function(){
							$('.segundaruta').css('display','none');
							$('.ruta-img').css('height','200px');
							destino=$(this).attr('coords');
							// calculateAndDisplayRoute(directionsService,directionsRenderer,destino);
							inicio=mycoordsLAT+','+mycoordsLONG;
							calculateAndDisplayRoute(inicio,
							    destino,
							    directionsService,
							    directionsRenderer
							  );
						});
				}
					
				
			function error(){
				iniciarMap();
				console.log('permiso denegado');
			}

		}

		function calculateAndDisplayRoute(inicio,destino,directionsService,directionsRenderer){
			directionsService
			.route({
				origin:inicio,
				destination:destino,
				avoidTolls: true,
				travelMode: google.maps.TravelMode.DRIVING,
			}).then((response) =>{
				directionsRenderer.setDirections(response);
			}).catch((e)=> window.alert('Solicitud de dirección fallida a causa de:' + status));
		}

	</script>
	<script type="text/javascript" src="js.js"></script>

</body>
</html>