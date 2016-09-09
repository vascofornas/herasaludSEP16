<?php
$host = "localhost";
$uname = "herasosj_hera";
$pass = "Papa020432";
$database = "herasosj_hera";

$connection=mysqli_connect($host,$uname,$pass,$database) or die("connection in not ready <br>");


if (isset($_REQUEST['query'])) {

	$query = $_REQUEST['query'];
	
	$sql = mysqli_query ($connection,"SELECT * FROM tb_doctores WHERE nombre_doctor LIKE '%{$query}%'");
	$array = array();
	
	while ($row = mysqli_fetch_assoc($sql)) {
		$array[] = $row['nombre_doctor'];
	}
	
	echo json_encode ($array); //Return the JSON Array

}

?>
