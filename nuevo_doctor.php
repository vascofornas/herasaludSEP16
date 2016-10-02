<?php

if( $_POST ){
	
    $especialidad_doctor = $_POST['listaEspecialidades'];
    $nombre_doctor = $_POST['nombre_doctor'];
    $apellidos_doctor = $_POST['apellidos_doctor'];
    $direccion_doctor = $_POST['direccion_doctor'];
    $pais_doctor = $_POST['countryId'];
    $estado_doctor = $_POST['stateId'];
    $ciudad_doctor = $_POST['cityId'];
    $comentarios_doctor = $_POST['opinion'];
    $puntualidad_doctor = $_POST['puntualidad'];
    $atencion_doctor = $_POST['atencion'];
    $instalaciones_doctor = $_POST['instalaciones'];
    $precio_doctor = $_POST['precio'];
    $recomendarias_doctor = $_POST['recomendarias'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $email_usuario = $_POST['email_usuario'];
  
 
    
 $db_host = "localhost";
 $db_name = "herasosj_hera";
 $db_user = "herasosj_hera";
 $db_pass =  "Papa020432";
 
 // Function to get the client ip address

 	$ipaddress = '';
 	if (getenv('HTTP_CLIENT_IP'))
 		$ipaddress = getenv('HTTP_CLIENT_IP');
 		else if(getenv('HTTP_X_FORWARDED_FOR'))
 			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
 			else if(getenv('HTTP_X_FORWARDED'))
 				$ipaddress = getenv('HTTP_X_FORWARDED');
 				else if(getenv('HTTP_FORWARDED_FOR'))
 					$ipaddress = getenv('HTTP_FORWARDED_FOR');
 					else if(getenv('HTTP_FORWARDED'))
 						$ipaddress = getenv('HTTP_FORWARDED');
 						else if(getenv('REMOTE_ADDR'))
 							$ipaddress = getenv('REMOTE_ADDR');
 							else
 								$ipaddress = 'UNKNOWN';
 
 								


// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$link = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
$link -> exec("set names utf8");

$sql2= "SELECT name FROM countries WHERE id = '".$pais_doctor."'";
$stmt2 = $link->query($sql2);
$row = $stmt2->fetch(PDO::FETCH_ASSOC);
$nombre_pais = $row['name'];
$sql3= "SELECT name FROM states WHERE id = '".$estado_doctor."'";
$stmt3 = $link->query($sql3);
$row = $stmt3->fetch(PDO::FETCH_ASSOC);
$nombre_estado = $row['name'];
$sql4= "SELECT name FROM cities WHERE id = '".$ciudad_doctor."'";
$stmt4 = $link->query($sql4);
$row = $stmt4->fetch(PDO::FETCH_ASSOC);
$nombre_ciudad = $row['name'];




$statement = $link->prepare("INSERT INTO tb_opiniones_doctor(especialidad_doctor,nombre_doctor,apellidos_doctor,
		direccion_doctor,pais_doctor,estado_doctor,ciudad_doctor,comentarios,puntualidad,atencion,instalaciones,precio,lo_recomiendas,
		nombre_usuario,email_usuario,ip_usuario)
    VALUES(:fesp,:fnombre,:fapellidos,:fdireccion,:fpais,:festado,:fciudad,:fcomentarios,:fpuntualidad,:fatencion,:finstalaciones,:fprecio,:flo_recomiendas,
		:fusuario,:femail,:fip)");
$statement->execute(array(
    "fesp" => $especialidad_doctor,
    "fnombre" => $nombre_doctor,
	"fapellidos" => $apellidos_doctor,
	"fdireccion" => $direccion_doctor,
	"fpais" => $nombre_pais,
	"festado" => $nombre_estado,
	"fciudad" => $nombre_ciudad,
		"fcomentarios" => $comentarios_doctor,
		"fpuntualidad" => $puntualidad_doctor,
		"fatencion" => $atencion_doctor,
		"finstalaciones" => $instalaciones_doctor,
		"fprecio" => $precio_doctor,
		"flo_recomiendas" => $recomendarias_doctor,
		"fusuario" => $nombre_usuario,
		"femail" => $email_usuario,
		"fip" => $ipaddress
		
));


   

?>
    <table class="table table-striped" border="0">
    
    <tr>
    <td colspan="2">
    	<div class="alert alert-info">
    		<strong>OPINION REGISTRADA</strong>, Gracias por dar tu opinión
    	</div>
    </td>
    </tr>
    
    <tr>
    <td><strong>ESPECIALIDAD: </strong></td>
    <td><?php echo $especialidad_doctor ?></td>
    </tr>
    
    <tr>
    <td><strong>NOMBRE DEL DOCTOR: </strong></td>
    <td><?php echo $nombre_doctor ?></td>
    </tr>
 <tr>
    <td><strong>APELLIDOS DEL DOCTOR: </strong></td>
    <td><?php echo $apellidos_doctor ?></td>
    </tr>
 
     <tr>
    <td><strong>DIRECCION DEL DOCTOR: </strong></td>
    <td><?php echo $direccion_doctor ?></td>
    </tr>
 <tr>
    <td><strong>TU OPINION: </strong></td>
    <td><?php echo $comentarios_doctor ?></td>
    </tr>
     <tr>
    <td><strong>PUNTUALIDAD: </strong></td>
    <td><?php echo $puntualidad_doctor ?></td>
    </tr>
     <tr>
    <td><strong>ATENCION: </strong></td>
    <td><?php echo $atencion_doctor ?></td>
    </tr>
     <tr>
    <td><strong>INSTALACIONES: </strong></td>
    <td><?php echo $instalaciones_doctor ?></td>
    </tr>
     <tr>
    <td><strong>PRECIO: </strong></td>
    <td><?php echo $precio_doctor ?></td>
    </tr>
     <tr>
    <td><strong>LO RECOMENDARIAS?: </strong></td>
    <td><?php echo $recomendarias_doctor ?></td>
    </tr>
    <tr>
    
    
    
    </table>
    <?php
	
}