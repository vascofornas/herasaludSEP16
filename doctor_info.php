<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comparte y Busca a los mejores especialistas m�dicos de tu localidad</title>
	<meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
	<meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
	<meta name="author" content="Luka Cvetinovic for Codrops" />
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="css/cardio.css">
	
	<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
	
 
 

 
<!-- Scripts -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/typewriter.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>
	<script src="js/validator.js"></script>
	

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	
   <script src="js/location.js"></script>   
  
 
   
 

 

	
	
<!-- STAR RATING -->

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
 
<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<link href="themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="js/star-rating.js" type="text/javascript"></script>
 
<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<script src="themes/krajee-svg/theme.js"></script>
 


<!-- MAPA -->
	<style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
   
<script>

	function cargarEspecialidades(){
		
		var select = document.getElementById("listaEspecialidades");
		var options = ["Alergolog�a", "Anatom�a Patol�gica", "Anestesiolog�a", "Angiolog�a", "Antropolog�a M�dica"];
		for(var i = 0; i < options.length; i++) {
		    var opt = options[i];
		    var el = document.createElement("option");
		    el.textContent = opt;
		    el.value = opt;
		    select.appendChild(el);
		}
		var select = document.getElementById("listaEspecialidades_buscar");
		var options = ["Alergolog�a", "Anatom�a Patol�gica", "Anestesiolog�a", "Angiolog�a", "Antropolog�a M�dica"];
		for(var i = 0; i < options.length; i++) {
		    var opt = options[i];
		    var el = document.createElement("option");
		    el.textContent = opt;
		    el.value = opt;
		    select.appendChild(el);
		}
	}
	function jsFunction(){
		document.getElementById("name").value='';
		}
      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: {lat: 44.540, lng: -78.546},
            zoom: 2
        });
        
        geocoder = new google.maps.Geocoder();
        var country = "Mexico";
        var geocoder;

        geocoder.geocode( {'address' : country}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
            }
        });
        var geocoder = new google.maps.Geocoder();

        google.maps.event.addListener(map, 'click', function(event) {
        
          geocoder.geocode({
            'latLng': event.latLng
          }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                var direccion = (results[0].formatted_address);
                document.getElementById("direccion_doctor").value = direccion;
              }
            }
          });
        });
      }
      function cambiar_pais_mapa() {
    	
          var mapDiv = document.getElementById('map');
          var map = new google.maps.Map(mapDiv, {
              center: {lat: 44.540, lng: -78.546},
              zoom: 4
          });
          
          geocoder = new google.maps.Geocoder();
          
          var e = document.getElementById("countryId");
    	  var strUser = e.options[e.selectedIndex].text;
      
    	 
          var country =  e.options[e.selectedIndex].text;
          var geocoder;

          geocoder.geocode( {'address' : country}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  map.setCenter(results[0].geometry.location);
              }
          });
          var geocoder = new google.maps.Geocoder();

          google.maps.event.addListener(map, 'click', function(event) {
          	
            geocoder.geocode({
              'latLng': event.latLng
            }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                	var direccion = (results[0].formatted_address);
                    document.getElementById("direccion_doctor").value = direccion;
                }
              }
            });
          });
        }
      
      function cambiar_estado_mapa() {
      	
          var mapDiv = document.getElementById('map');
          var map = new google.maps.Map(mapDiv, {
              center: {lat: 44.540, lng: -78.546},
              zoom: 10
          });
          
          geocoder = new google.maps.Geocoder();
          
          var e = document.getElementById("stateId");
    	  var strUser = e.options[e.selectedIndex].text;
      
    	 
          var country =  e.options[e.selectedIndex].text;
          var geocoder;

          geocoder.geocode( {'address' : country}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  map.setCenter(results[0].geometry.location);
              }
          });
          var geocoder = new google.maps.Geocoder();

          google.maps.event.addListener(map, 'click', function(event) {
         
            geocoder.geocode({
              'latLng': event.latLng
            }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                	var direccion = (results[0].formatted_address);
                    document.getElementById("direccion_doctor").value = direccion;
                }
              }
            });
          });
        }
      function cambiar_ciudad_mapa() {
        	
          var mapDiv = document.getElementById('map');
          var map = new google.maps.Map(mapDiv, {
              center: {lat: 44.540, lng: -78.546},
              zoom: 13
          });
          
          geocoder = new google.maps.Geocoder();
          
          var e = document.getElementById("cityId");
          var es = document.getElementById("stateId");
    	  var strUseres = es.options[es.selectedIndex].text;
      
          var country =  e.options[e.selectedIndex].text+", "+strUseres;
          var geocoder;

          geocoder.geocode( {'address' : country}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  map.setCenter(results[0].geometry.location);
              }
          });
          var geocoder = new google.maps.Geocoder();

          google.maps.event.addListener(map, 'click', function(event) {
          	
            geocoder.geocode({
              'latLng': event.latLng
            }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                	var direccion = (results[0].formatted_address);
                    document.getElementById("direccion_doctor").value = direccion;
                }
              }
            });
          });
        }
    </script>
    

    <!-- AUTOCOMPLETE -->
    
    <style>
.typeahead-devs, .tt-hint,.country,.allcountry  {
 	border: 2px solid #CCCCCC;
    border-radius: 8px 8px 8px 8px;
    font-size: 24px;
    height: 45px;
    line-height: 30px;
    outline: medium none;
    padding: 8px 12px;
    width: 400px;
}

.tt-dropdown-menu {
  width: 400px;
  margin-top: 5px;
  padding: 8px 12px;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px;
  font-size: 18px;
  color: #111;
  background-color: #F1F1F1;
}
.navbar .navbar-nav {
    display: inline-block;
    float: none;
}

.navbar .navbar-collapse {
    text-align: center;
}
.opinar_div {
background: url(../img/fondo_form.png) ;
background-size:100% auto;
}

    </style>


  <!-- load jquery ui css-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>       
<script type="text/javascript">
$(document).ready(function() {	
	
	// submit form using $.ajax() method
	
	
	$('#reg-form').submit(function(e){
	
		
		e.preventDefault(); // Prevent Default Submission
		var e = document.getElementById("listaEspecialidades");
		var esp =  e.options[e.selectedIndex].text;
		
		
		$.ajax({
			url: 'nuevo_doctor.php',
			type: 'POST',
			data: $(this).serialize() // it will serialize the form data
		})
		.done(function(data){
			$('#form-content').fadeOut('slow', function(){
				$('#form-content').fadeIn('slow').html(data);
			});
			
		})
		.fail(function(){
			alert('Ajax Submit Failed ...');	
		});
	});
	

	
});
</script>

</head>

<body onload="cargarEspecialidades()">
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="img/herasaludlogo.png" data-active-url="img/herasaludlogo.png" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-center main-nav ">
					<li ><span class="menu_items"><span class="menu_items"><a href="index.html#intro">Portada</a></span></span></li>
					<li><span class="menu_items"><span class="menu_items"><a href="index.html#doctores">Opinar</a></span></span></li>
					<li><span class="menu_items"><span class="menu_items"><a href="index.html#buscar">Buscar</a></span></span></li>
					
					<li><span class="menu_items"><span class="menu_items"><a href="index.html#ver">Ver Opiniones</a></span></span></li>
					
					
					
					
				  
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	
	
	<section id="buscar" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Buscar un Doctor</h2>
				<h4 class="light muted">Busca a los mejores especialistas m�dicos de tu localidad.</h4>
				
			</div>
			<div class="row services">

  <div class="row" >
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group ">
     
      <p> Selecciona la especialidad del doctor</p>
     
     <select class="form-control" id="listaEspecialidades_buscar" name="listaEspecialidades_buscar"  onchange="jsFunction()" ><option></option></select>  
      
     </div>
     </div>
     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p>Introduce los datos que deseas buscar</p>
								<form class="form-horizontal" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
									<div class="input-group col-sm-11">
										<input id="name" name="name" type="text" class="form-control" placeholder="Buscar..." autocomplete="off"/>
										<span class="input-group-btn">
											<button type="button" class="btn btn-default btnSearch">
												<span class="glyphicon glyphicon-search"> </span>
											</button> </span>
									</div>
								</form>
						</div>
     </div>
     <!--main content start-->
			<section id="main-content" style="margin-left: 0px;">
				<section class="wrapper">

					

					<div class="row mt">
						<div class="col-lg-12">
							<div class="content-panel tablesearch">

								<section id="unseen">
									<table id="resultTable" class="table table-bordered table-hover table-condensed">
										<thead>
											<tr>
									
												<th class="small">Nombre</th>
												<th class="small">Especialidad</th>
												<th class="small">Ciudad</th>
												<th class="small">Estado</th>
												<th class="small">Pais</th>
									
											</tr>
										</thead>
									
										<tbody></tbody>
									</table>
								</section>

							</div><!-- /content-panel -->
						</div><!-- /col-lg-4 -->
					</div><!-- /row -->
					

				

					
			
					

				</section>
			
			</section><!-- /MAIN CONTENT -->

			
		</section>

 

				
			
				
				
				
				
				
				
				
				
				
				
		
	<section id="ver" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Leer opiniones</h2>
				<h4 class="light muted">Lee las opiniones de otros usuarios sobre especialistas m�dicos de tu localidad.</h4>


  
			</div>
		</div>
	</section>
	
		<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Sign Up</h3>
				<form action="" class="popup-form">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pricing Plan
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
							<li class="animated lightSpeedIn"><a href="#">1 month membership ($150)</a></li>
							<li class="animated lightSpeedIn"><a href="#">3 month membership ($350)</a></li>
							<li class="animated lightSpeedIn"><a href="#">1 year membership ($1000)</a></li>
							<li class="animated lightSpeedIn"><a href="#">Free trial class</a></li>
						</ul>
					</div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Enviar </button>
				</form>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Registrate y te enviaremos todas las novedades</h3>
					<h5 class="light regular light-white">Comparte y Busca a los mejores especialistas m�dicos de tu localidad.</h5>
					<a href="#" class="btn btn-blue ripple trial-button">Iniciar Sesi�n</a>
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Horario de Apertura <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Lunes - Domingo</h5>
							<h3 class="regular white">0:00 - 24:00</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2016 All Rights Reserved. Powered by <a href="http://www.webjuarez.com/">WebJuarez</a> exclusively for <a href="http://herasalud.com">HeraSalud</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	
	

<script 
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf5FW36X3eb1wWoqpJ0MaiPYmOVvyJ_Ro&callback=initMap">
    </script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="js/triggers.js"></script>
    <script type="text/javascript" src="js/triggers_ver.js"></script>

		<!--script for this page-->
		
</body>

</html>
