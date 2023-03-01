



		function showinfo1(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta1').css('display','block');

			$('.ruta1').find('.ruta-img').html('<img src="img/p1.png">');

			$('.destino-title').html('Calle 3 con 7');

		}

		function showinfo2(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta2').css('display','block');
			$('.ruta2').find('.ruta-img').html('<img src="img/p2.png">');

			$('.destino-title').html('Calle 3 con 8');
		}

		function showinfo3(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta3').css('display','block');
			$('.ruta3').find('.ruta-img').html('<img src="img/p3.png">');
			
			$('.destino-title').html('Parqueadero JR');
		}

		function showinfo4(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta4').css('display','block');
			$('.ruta4').find('.ruta-img').html('<img src="img/p4.png">');
			
			$('.destino-title').html('Calle 7 con 7');
		}

		function showinfo5(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta5').css('display','block');
			$('.ruta5').find('.ruta-img').html('<img src="img/p5.png">');
			
			$('.destino-title').html('Parqueadero Acueducto');
		}

		function showinfo6(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta6').css('display','block');
			$('.ruta6').find('.ruta-img').html('<img src="img/p6.png">');
			
			$('.destino-title').html('Parqueadero Casa Caldas');
		}

		function showinfo7(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta7').css('display','block');
			$('.ruta7').find('.ruta-img').html('<img src="img/p7.png">');
			
			$('.destino-title').html('Parqueadero calle 3 con 6');
		}

		function showinfo8(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta8').css('display','block');
			$('.ruta8').find('.ruta-img').html('<img src="img/p8.png">');
			
			$('.destino-title').html('Parqueadero Cama y Comercio');
		}

		function showinfo9(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta9').css('display','block');
			$('.ruta9').find('.ruta-img').html('<img src="img/p9.png">');
			
			$('.destino-title').html('Parqueadero Unicomfacauca');
		}

		function showinfo10(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta10').css('display','block');
			$('.ruta10').find('.ruta-img').html('<img src="img/p10.png">');
			
			$('.destino-title').html('Parqueadero 5 con 7');
		}

		function showinfo11(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta11').css('display','block');
			$('.ruta11').find('.ruta-img').html('<img src="img/p11.png">');
			
			$('.destino-title').html('Parqueadero Éxito Centro');
		}

		function showinfo12(){
			$('.ruta').css('display','none');
			$('.noruta').css('display','none');
			$('.ruta12').css('display','block');
			$('.ruta12').find('.ruta-img').html('<img src="img/p12.png">');
			
			$('.destino-title').html('Parqueadero Achalay');
		}


		$('.main-flecha').on('click',function(){
			$('.main-item').toggleClass('main-inside');
		});