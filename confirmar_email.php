<?php


	
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
 
 				


// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$link = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
$link -> exec("set names utf8");


// assuming a named submit button
if(isset($_GET['cod']))
{

	try {
		$stmt = $link->prepare('SELECT `codigo_verificacion` FROM `tb_opiniones_doctor` WHERE codigo_verificacion = ?');
		$stmt->bindParam(1, $_GET['cod']);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

		}
	}
	catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

	if($stmt->rowCount() > 0){
		echo "EMAIL VALIDADO. GRACIAS POR OPINAR EN HERASALUD.COM!";
		echo '<a href="index.html"><img src="img/herasaludlogo.png" ></a>';
		
		$stmt = $link->prepare('UPDATE tb_opiniones_doctor SET  `codigo_verificacion` = 1 WHERE codigo_verificacion = ?');
		$stmt->bindParam(1, $_GET['cod']);
		$stmt->execute();
		
	} else {
		echo "TU EMAIL NO HA PODIDO SER VALIDADO.";
	}


}


   

?>
   
  