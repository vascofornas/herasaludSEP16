<?php header('Content-Type: charset=utf-8'); 
require_once 'php/db.php';
require_once 'php/pdo_connect.php';
$doctor = $_GET['cod'];
$getID = mysqli_fetch_assoc(mysqli_query($test_db, "SELECT * FROM tb_doctores WHERE codigo_doctor = '".$doctor."'"));
$userID = $getID['id_doctor'];
$lat = $getID['latitud_doctor'];

$lng = $getID['longitud_doctor'];


$results = mysqli_query($test_db, "SELECT * FROM tb_opiniones_doctor WHERE codigo_doctor = '".$doctor."'");
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comparte y Busca a los mejores especialistas médicos de tu localidad</title>
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
   
    

    <!-- AUTOCOMPLETE -->
    
    <style>
    
    p {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 600px;
}
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

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: parseFloat('<?php echo $lat;?>'), lng: parseFloat('<?php echo $lng;?>')},
    zoom: 13
  });
  var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lng; ?>);
  
  var marker = new google.maps.Marker({
      position: myLatlng, 
      map: map,
      title:"Hello World!"
  }); 
}

    </script>
<script type="text/javascript">
$(document).ready(function() {	
	
	
	
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
					<li ><span class="menu_items"><span class="menu_items"><a href="http://herasalud.com/#intro">Portada</a></span></span></li>
					<li><span class="menu_items"><span class="menu_items"><a href="http://herasalud.com/#doctores">Opinar</a></span></span></li>
					<li><span class="menu_items"><span class="menu_items"><a href="http://herasalud.com/#buscar">Buscar</a></span></span></li>
					
					<li><span class="menu_items"><span class="menu_items"><a href="http://herasalud.com/#ver">Ver Opiniones</a></span></span></li>
					
					
					
					
				  
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	
	
	
				
				
			
				
				
		
	<section id="doctor" class="section section-padded">
	
	<div class="container">
			<div class="row text-center title">
				<h2>Leer opiniones </h2>
				<h4 class="light muted">Lee las opiniones de otros usuarios sobre especialistas médicos de tu localidad.</h4>
<br><br><br>
  <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="doctor.png" alt="Generic placeholder image" width="140" height="140">
          <h2><?php echo $getID['nombre_doctor']?></h2>
          <h2><?php echo $getID['apellidos_doctor']?></h2>
          
          <h3><?php echo $getID['especialidad_doctor']?></h3>
          
          
          
          
            <?php //empieza loop de comentarios
          
          $codigo = $_GET['cod'];
          $sqlSelect = 'SELECT *
    FROM tb_opiniones_doctor
    WHERE codigo_verificacion = :mycodigo';
          $sth = $conn->prepare($sqlSelect);
          $sth->execute(array(':mycodigo' => $codigo));
          $suma = 0;
          $valor_puntualidad = 0;
          $valor_instalaciones = 0;
          $valor_atencion = 0;
          $valor_precio = 0;
          $valor_lo_recomiendas = 0;
          
          foreach ($sth->fetchAll() as $row) {
         $suma = $suma +1;
          	$valor_puntualidad = $valor_puntualidad +$row['puntualidad'];
          	$valor_instalaciones = $valor_instalaciones + $row['instalaciones'];
          	$valor_atencion = $valor_atencion +$row['atencion'];
          	$valor_precio = $valor_precio +$row['precio'];
          	$valor_lo_recomiendas = $valor_lo_recomiendas + $row['lo_recomiendas'];
           
          } 
          
          echo "Este doctor tiene ".$suma." opiniones de usuarios";
           //puntualidad
           if ($suma == 0){
           	$valor_puntualidad = 0;
           	$valor_instalaciones = 0;
           	$valor_atencion = 0;
           	$valor_precio = 0;
           	$valor_lo_recomiendas = 0;
           	
           }
           else{
           	$valor_puntualidad = $valor_puntualidad / $suma;
           	$valor_instalaciones =$valor_instalaciones / $suma;
           	$valor_atencion = $valor_atencion / $suma;
           	$valor_precio = $valor_precio / $suma;
           	$valor_lo_recomiendas = $valor_lo_recomiendas / $suma;
           	
           	
           if ($valor_puntualidad == 0  && $valor_puntualidad < 0.5){
           	$imagen_puntualidad = "imagenes/0.png";
           }
           if ($valor_puntualidad >= 0.5 && $valor_puntualidad <1){
           	$imagen_puntualidad = "imagenes/05.png";
           }
           if ($valor_puntualidad >= 1 && $valor_puntualidad < 1.5 ){
           	$imagen_puntualidad = "imagenes/1.png";
           }
           if ($valor_puntualidad >= 1.5 && $valor_puntualidad < 2 ){
           	$imagen_puntualidad = "imagenes/15.png";
           }
           if ($valor_puntualidad >= 2 && $valor_puntualidad < 2.5 ){
           	$imagen_puntualidad = "imagenes/2.png";
           }
           if ($valor_puntualidad >= 2.5 && $valor_puntualidad < 3 ){
           	$imagen_puntualidad = "imagenes/25.png";
           }
           if ($valor_puntualidad >= 3 && $valor_puntualidad <= 3.5  ){
           	$imagen_puntualidad = "imagenes/3.png";
           }
           if ($valor_puntualidad >= 3.5 && $valor_puntualidad < 4 ){
           	$imagen_puntualidad = "imagenes/35.png";
           }
           if ($valor_puntualidad >= 4 && $valor_puntualidad < 4.5 ){
           	$imagen_puntualidad = "imagenes/4.png";
           }
           if ($valor_puntualidad >= 4.5 && $valor_puntualidad  < 5){
           	$imagen_puntualidad = "imagenes/45.png";
           }
           if ($valor_puntualidad == 5 ){
           	$imagen_puntualidad = "imagenes/5.png";
           }
           if ($valor_puntualidad == "" ){
           	$imagen_puntualidad = "imagenes/0.png";
           }
           if ($valor_puntualidad == 0 ){
           	$imagen_puntualidad = "imagenes/0.png";
           }
           //atencion
            
             if ($valor_instalaciones == 0  && $valor_instalaciones < 0.5){
           	$imagen_instalaciones = "imagenes/0.png";
           }
           if ($valor_instalaciones >= 0.5 && $valor_instalaciones <1){
           	$imagen_instalaciones = "imagenes/05.png";
           }
           if ($valor_instalaciones >= 1 && $valor_instalaciones < 1.5 ){
           	$imagen_instalaciones = "imagenes/1.png";
           }
           if ($valor_instalaciones >= 1.5 && $valor_instalaciones < 2 ){
           	$imagen_instalaciones = "imagenes/15.png";
           }
           if ($valor_instalaciones >= 2 && $valor_instalaciones < 2.5 ){
           	$imagen_instalaciones = "imagenes/2.png";
           }
           if ($valor_instalaciones >= 2.5 && $valor_instalaciones < 3 ){
           	$imagen_instalaciones = "imagenes/25.png";
           }
           if ($valor_instalaciones >= 3 && $valor_instalaciones <= 3.5  ){
           	$imagen_instalaciones = "imagenes/3.png";
           }
           if ($valor_instalaciones >= 3.5 && $valor_instalaciones < 4 ){
           	$imagen_instalaciones = "imagenes/35.png";
           }
           if ($valor_instalaciones >= 4 && $valor_instalaciones < 4.5 ){
           	$imagen_instalaciones = "imagenes/4.png";
           }
           if ($valor_instalaciones >= 4.5 && $valor_instalaciones  < 5){
           	$imagen_instalaciones = "imagenes/45.png";
           }
           if ($valor_instalaciones == 5 ){
           	$imagen_instalaciones = "imagenes/5.png";
           }
           if ($valor_instalaciones == "" ){
           	$imagen_instalaciones = "imagenes/0.png";
           }
           if ($valor_instalaciones == 0 ){
           	$imagen_instalaciones = "imagenes/0.png";
           }
           //instalaciones
           if ($valor_atencion == 0  && $valor_atencion < 0.5){
           	$imagen_atencion = "imagenes/0.png";
           }
           if ($valor_atencion >= 0.5 && $valor_atencion <1){
           	$imagen_atencion = "imagenes/05.png";
           }
           if ($valor_atencion >= 1 && $valor_atencion < 1.5 ){
           	$imagen_atencion = "imagenes/1.png";
           }
           if ($valor_atencion >= 1.5 && $valor_atencion < 2 ){
           	$imagen_atencion = "imagenes/15.png";
           }
           if ($valor_atencion >= 2 && $valor_atencion < 2.5 ){
           	$imagen_atencion = "imagenes/2.png";
           }
           if ($valor_atencion >= 2.5 && $valor_atencion < 3 ){
           	$imagen_atencion = "imagenes/25.png";
           }
           if ($valor_atencion >= 3 && $valor_atencion <= 3.5  ){
           	$imagen_atencion = "imagenes/3.png";
           }
           if ($valor_atencion >= 3.5 && $valor_atencion < 4 ){
           	$imagen_atencion = "imagenes/35.png";
           }
           if ($valor_atencion >= 4 && $valor_atencion < 4.5 ){
           	$imagen_atencion = "imagenes/4.png";
           }
           if ($valor_atencion >= 4.5 && $valor_atencion  < 5){
           	$imagen_atencion = "imagenes/45.png";
           }
           if ($valor_atencion == 5 ){
           	$imagen_atencion = "imagenes/5.png";
           }
           if ($valor_atencion == "" ){
           	$imagen_atencion = "imagenes/0.png";
           }
           if ($valor_atencion == 0 ){
           	$imagen_atencion = "imagenes/0.png";
           }
           
           //precio
             if ($valor_precio == 0  && $valor_precio < 0.5){
           	$imagen_precio = "imagenes/0.png";
           }
           if ($valor_precio >= 0.5 && $valor_precio <1){
           	$imagen_precio = "imagenes/05.png";
           }
           if ($valor_precio >= 1 && $valor_precio < 1.5 ){
           	$imagen_precio = "imagenes/1.png";
           }
           if ($valor_precio >= 1.5 && $valor_precio < 2 ){
           	$imagen_precio = "imagenes/15.png";
           }
           if ($valor_precio >= 2 && $valor_precio < 2.5 ){
           	$imagen_precio = "imagenes/2.png";
           }
           if ($valor_precio >= 2.5 && $valor_precio < 3 ){
           	$imagen_precio = "imagenes/25.png";
           }
           if ($valor_precio >= 3 && $valor_precio <= 3.5  ){
           	$imagen_precio = "imagenes/3.png";
           }
           if ($valor_precio >= 3.5 && $valor_precio < 4 ){
           	$imagen_precio = "imagenes/35.png";
           }
           if ($valor_precio >= 4 && $valor_precio < 4.5 ){
           	$imagen_precio = "imagenes/4.png";
           }
           if ($valor_precio >= 4.5 && $valor_precio  < 5){
           	$imagen_precio = "imagenes/45.png";
           }
           if ($valor_precio == 5 ){
           	$imagen_precio = "imagenes/5.png";
           }
           if ($valor_precio == "" ){
           	$imagen_precio = "imagenes/0.png";
           }
           if ($valor_precio == 0 ){
           	$imagen_precio = "imagenes/0.png";
           }
           //lo_recomiendas
             if ($valor_lo_recomiendas == 0  && $valor_lo_recomiendas < 0.5){
           	$imagen_lo_recomiendas = "imagenes/0.png";
           }
           if ($valor_lo_recomiendas >= 0.5 && $valor_lo_recomiendas <1){
           	$imagen_lo_recomiendas = "imagenes/05.png";
           }
           if ($valor_lo_recomiendas >= 1 && $valor_lo_recomiendas < 1.5 ){
           	$imagen_lo_recomiendas = "imagenes/1.png";
           }
           if ($valor_lo_recomiendas >= 1.5 && $valor_lo_recomiendas < 2 ){
           	$imagen_lo_recomiendas = "imagenes/15.png";
           }
           if ($valor_lo_recomiendas >= 2 && $valor_lo_recomiendas < 2.5 ){
           	$imagen_lo_recomiendas = "imagenes/2.png";
           }
           if ($valor_lo_recomiendas >= 2.5 && $valor_lo_recomiendas < 3 ){
           	$imagen_lo_recomiendas = "imagenes/25.png";
           }
           if ($valor_lo_recomiendas >= 3 && $valor_lo_recomiendas <= 3.5  ){
           	$imagen_lo_recomiendas = "imagenes/3.png";
           }
           if ($valor_lo_recomiendas >= 3.5 && $valor_lo_recomiendas < 4 ){
           	$imagen_lo_recomiendas = "imagenes/35.png";
           }
           if ($valor_lo_recomiendas >= 4 && $valor_lo_recomiendas < 4.5 ){
           	$imagen_lo_recomiendas = "imagenes/4.png";
           }
           if ($valor_lo_recomiendas >= 4.5 && $valor_lo_recomiendas  < 5){
           	$imagen_lo_recomiendas = "imagenes/45.png";
           }
           if ($valor_lo_recomiendas == 5 ){
           	$imagen_lo_recomiendas = "imagenes/5.png";
           }
           if ($valor_lo_recomiendas == "" ){
           	$imagen_lo_recomiendas = "imagenes/0.png";
           }
           if ($valor_lo_recomiendas == 0 ){
           	$imagen_lo_recomiendas = "imagenes/0.png";
           }
           }
           ?>
                      <div>
           <img style="float:left" src="<?php echo $imagen_puntualidad?>" width="140" height="25"><p>PUNTUALIDAD
           </p></div>
                     <div>
           <img style="float:left" src="<?php echo $imagen_instalaciones?>"width="140" height="25"><p>INSTALACIONES
           </p></div>
           <div>
           <img style="float:left" src="<?php echo $imagen_atencion?>" width="140" height="25"><p>ATENCION
           </p></div>
           <div>
           <img style="float:left" src="<?php echo $imagen_precio?>" width="140" height="25"><p>PRECIO
           </p></div>
           <div>
           <img style="float:left" src="<?php echo $imagen_lo_recomiendas?>" width="140" height="25"><p>LO RECOMENDARIAS?
           </p></div>
         
                    
                
                 
                 
           
           
      
         </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="home-icon.png" alt="Generic placeholder image" width="140" height="140">
          
          
          <h3><?php echo $getID['direccion_doctor']?></h3>
          <h5><?php echo $getID['ciudad_doctor']." / ".$getID['estado_doctor']." / ".$getID['pais_doctor']?></h5>
          
          <div id="map"></div> </div><!-- /.col-lg-4 -->
        <div class="col-lg-4" >
        
          <img class="img-circle" src="satisfaction.png"  width="140" height="140">
         
        <br><br>
          <?php //empieza loop de comentarios
          
          $codigo = $_GET['cod'];
          $sqlSelect = 'SELECT *
    FROM tb_opiniones_doctor
    WHERE codigo_verificacion = :mycodigo';
          $sth = $conn->prepare($sqlSelect);
          $sth->execute(array(':mycodigo' => $codigo));
          foreach ($sth->fetchAll() as $row) {
         
          	$valor_puntualidad = $row['puntualidad'];
          	$valor_instalaciones = $row['instalaciones'];
          	$valor_atencion = $row['atencion'];
          	$valor_precio = $row['precio'];
          	$valor_lo_recomiendas = $row['lo_recomiendas'];
           $mi_comentario = $row['comentarios'];
           $mifecha = $row['fecha_opinion'];
           $autor = $row['nombre_usuario'];
           
           //puntualidad
           if ($valor_puntualidad == 0 ){
           	$imagen_puntualidad = "imagenes/0.png";
           }
           if ($valor_puntualidad == 0.5 ){
           	$imagen_puntualidad = "imagenes/05.png";
           }
           if ($valor_puntualidad == 1 ){
           	$imagen_puntualidad = "imagenes/1.png";
           }
           if ($valor_puntualidad == 1.5 ){
           	$imagen_puntualidad = "imagenes/15.png";
           }
           if ($valor_puntualidad == 2 ){
           	$imagen_puntualidad = "imagenes/2.png";
           }
           if ($valor_puntualidad == 2.5 ){
           	$imagen_puntualidad = "imagenes/25.png";
           }
           if ($valor_puntualidad == 3 ){
           	$imagen_puntualidad = "imagenes/3.png";
           }
           if ($valor_puntualidad == 3.5 ){
           	$imagen_puntualidad = "imagenes/35.png";
           }
           if ($valor_puntualidad == 4 ){
           	$imagen_puntualidad = "imagenes/4.png";
           }
           if ($valor_puntualidad == 4.5 ){
           	$imagen_puntualidad = "imagenes/45.png";
           }
           if ($valor_puntualidad == 5 ){
           	$imagen_puntualidad = "imagenes/5.png";
           }
           if ($valor_puntualidad == "" ){
           	$imagen_puntualidad = "imagenes/0.png";
           }
           if ($valor_puntualidad == 0 ){
           	$imagen_puntualidad = "imagenes/0.png";
           }
           //atencion
            
           if ($valor_atencion == 0.5 ){
           	$imagen_atencion = "imagenes/05.png";
           }
           if ($valor_atencion == 1 ){
           	$imagen_atencion = "imagenes/1.png";
           }
           if ($valor_atencion == 1.5 ){
           	$imagen_atencion = "imagenes/15.png";
           }
           if ($valor_atencion == 2 ){
           	$imagen_atencion = "imagenes/2.png";
           }
           if ($valor_atencion == 2.5 ){
           	$imagen_atencion = "imagenes/25.png";
           }
           if ($valor_atencion == 3 ){
           	$imagen_atencion = "imagenes/3.png";
           }
           if ($valor_atencion == 3.5 ){
           	$imagen_atencion = "imagenes/35.png";
           }
           if ($valor_atencion == 4 ){
           	$imagen_atencion = "imagenes/4.png";
           }
           if ($valor_atencion == 4.5 ){
           	$imagen_atencion = "imagenes/45.png";
           }
           if ($valor_atencion == 5 ){
           	$imagen_atencion = "imagenes/5.png";
           }
           if ($valor_atencion == "" ){
           	$imagen_atencion = "imagenes/0.png";
           }
           
           //instalaciones
            
           if ($valor_instalaciones == 0.5 ){
           	$imagen_instalaciones = "imagenes/05.png";
           }
           if ($valor_instalaciones == 1 ){
           	$imagen_instalaciones = "imagenes/1.png";
           }
           if ($valor_instalaciones == 1.5 ){
           	$imagen_instalaciones = "imagenes/15.png";
           }
           if ($valor_instalaciones == 2 ){
           	$imagen_instalaciones = "imagenes/2.png";
           }
           if ($valor_instalaciones == 2.5 ){
           	$imagen_instalaciones = "imagenes/25.png";
           }
           if ($valor_instalaciones == 3 ){
           	$imagen_instalaciones = "imagenes/3.png";
           }
           if ($valor_instalaciones == 3.5 ){
           	$imagen_instalaciones = "imagenes/35.png";
           }
           if ($valor_instalaciones == 4 ){
           	$imagen_instalaciones = "imagenes/4.png";
           }
           if ($valor_instalaciones == 4.5 ){
           	$imagen_instalaciones = "imagenes/45.png";
           }
           if ($valor_instalaciones == 5 ){
           	$imagen_instalaciones = "imagenes/5.png";
           }
           if ($valor_instalaciones == "" ){
           	$imagen_instalaciones = "imagenes/0.png";
           }
           
           //precio
           if ($valor_precio == 0 ){
           	$imagen_precio = "imagenes/0.png";
           }
           if ($valor_precio == 0.5 ){
           	$imagen_precio = "imagenes/05.png";
           }
           if ($valor_precio == 1 ){
           	$imagen_precio = "imagenes/1.png";
           }
           if ($valor_precio == 1.5 ){
           	$imagen_precio = "imagenes/15.png";
           }
           if ($valor_precio == 2 ){
           	$imagen_precio = "imagenes/2.png";
           }
           if ($valor_precio == 2.5 ){
           	$imagen_precio = "imagenes/25.png";
           }
           if ($valor_precio == 3 ){
           	$imagen_precio = "imagenes/3.png";
           }
           if ($valor_precio == 3.5 ){
           	$imagen_precio = "imagenes/35.png";
           }
           if ($valor_precio == 4 ){
           	$imagen_precio = "imagenes/4.png";
           }
           if ($valor_precio == 4.5 ){
           	$imagen_precio = "imagenes/45.png";
           }
           if ($valor_precio == 5 ){
           	$imagen_precio = "imagenes/5.png";
           }
           if ($valor_precio == "" ){
           	$imagen_precio = "imagenes/0.png";
           }
           if ($valor_precio == 0 ){
           	$imagen_precio = "imagenes/0.png";
           }
           
           //lo_recomiendas
           if ($valor_lo_recomiendas == 0 ){
           	$imagen_lo_recomiendas = "imagenes/0.png";
           }
           if ($valor_lo_recomiendas == 0.5 ){
           	$imagen_lo_recomiendas = "imagenes/05.png";
           }
           if ($valor_lo_recomiendas == 1 ){
           	$imagen_lo_recomiendas = "imagenes/1.png";
           }
           if ($valor_lo_recomiendas == 1.5 ){
           	$imagen_lo_recomiendas = "imagenes/15.png";
           }
           if ($valor_lo_recomiendas == 2 ){
           	$imagen_lo_recomiendas = "imagenes/2.png";
           }
           if ($valor_lo_recomiendas == 2.5 ){
           	$imagen_lo_recomiendas = "imagenes/25.png";
           }
           if ($valor_lo_recomiendas == 3 ){
           	$imagen_lo_recomiendas = "imagenes/3.png";
           }
           if ($valor_lo_recomiendas == 3.5 ){
           	$imagen_lo_recomiendas = "imagenes/35.png";
           }
           if ($valor_lo_recomiendas == 4 ){
           	$imagen_lo_recomiendas = "imagenes/4.png";
           }
           if ($valor_lo_recomiendas == 4.5 ){
           	$imagen_lo_recomiendas = "imagenes/45.png";
           }
           if ($valor_lo_recomiendas == 5 ){
           	$imagen_lo_recomiendas = "imagenes/5.png";
           }
           if ($valor_lo_recomiendas == "" ){
           	$imagen_lo_recomiendas = "imagenes/0.png";
           }
           if ($valor_lo_recomiendas == 0 ){
           	$imagen_lo_recomiendas = "imagenes/0.png";
           }
           ?>
                      <div>
           <img style="float:left" src="<?php echo $imagen_puntualidad?>" width="140" height="25"><p>PUNTUALIDAD
           </p></div>
                     <div>
           <img style="float:left" src="<?php echo $imagen_instalaciones?>"width="140" height="25"><p>INSTALACIONES
           </p></div>
           <div>
           <img style="float:left" src="<?php echo $imagen_atencion?>" width="140" height="25"><p>ATENCION
           </p></div>
           <div>
           <img style="float:left" src="<?php echo $imagen_precio?>" width="140" height="25"><p>PRECIO
           </p></div>
           <div>
           <img style="float:left" src="<?php echo $imagen_lo_recomiendas?>" width="140" height="25"><p>LO RECOMENDARIAS?
           </p></div>
           <div align="left">
                <div id="comentario">
                <p><?php echo $mi_comentario;?></p>
                </div>
                <h5><?php echo "Opinión publicada por ".$autor." el dia " .$mifecha.".";?></h5>
                   </div>
                     <p><a class="btn btn-info" href="#" role="button">Leer más</a></p>
                
                 
                 
           
           
        <?php }//fin foreach?>   
          
             </div><!-- /.col-lg-4 -->
                 </div><!-- /.row -->
       

 
			</div>
		</div>
	</section>
	
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Regístrate y te enviaremos todas las novedades</h3>
					<h5 class="light regular light-white">Comparte y Busca a los mejores especialistas médicos de tu localidad.</h5>
					<a href="#" class="btn btn-blue ripple trial-button">Iniciar Sesión</a>
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
