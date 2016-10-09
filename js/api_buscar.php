<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Version: 0.0.1
* Date: 25-04-2015
* App Name: Php+ajax country state city dropdown
* Description: A simple oops based php and ajax country state city dropdown list
*/
error_reporting(0);
ob_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once("location_buscar.php");

$loc = new location();			

try {
  if(!isset($_GET['type']) || empty($_GET['type'])) {
  	throw new exception("Type is not set.");
  }
  $type = $_GET['type'];
  if($type=='getPaises') {
  	$data = $loc->getPaises();
  } 

  if($type=='getEstados') {
  	 if(!isset($_GET['paisId']) || empty($_GET['paisId'])) {
  	 	throw new exception("Country Id is not set.");
  	 }
  	 $paisId = $_GET['paisId'];
  	 $data = $loc->getEstados($paisId);
  }

   if($type=='getCiudades') {
  	 if(!isset($_GET['estadoId']) || empty($_GET['estadoId'])) {
  	 	throw new exception("State Id is not set.");
  	 }
     $estadoId = $_GET['estadoId'];
  	 $data = $loc->getCiudades($estadoId);
  }

} catch (Exception $e) {
   $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
} finally {
  echo json_encode($data);
}

ob_flush();






