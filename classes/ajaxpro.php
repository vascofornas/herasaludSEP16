<?php
	
	define (DB_USER, "herasosj_hera");
	define (DB_PASSWORD, "Papa020432");
	define (DB_DATABASE, "herasosj_hera");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	$sql = "SELECT * FROM tb_doctores 
			WHERE nombre_doctor LIKE '%".$_GET['query']."%'
			LIMIT 10"; 
	$result = $mysqli->query($sql);
	
	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['nombre_doctor'];
	}

	echo json_encode($json);