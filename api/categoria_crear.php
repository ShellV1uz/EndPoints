<?php
include("../model/crud.php");

header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");


$crud = new Crud(); 

if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
//----------------------------------------------------------------------
$data = array();
$data = json_decode(file_get_contents('php://input'),true);

$id_categoria = $data["id_categoria"]; 
$nombre_categoria = $data["nombre_categoria"]; 

 
	
$sql = "insert into categoria (id_categoria,nombre)
values ('$id_categoria','$nombre_categoria')";
$res = $crud->create($sql);
if ($res)
{
	$result = array("status" => true , "message" => "categoria agregadoa correctamente...");
}
else
{
	$result = array("status" => false , "message" => "Ocurrio un error en la inserccion...");
}
echo json_encode($result);

//-------------------------------------------------------------------------------
}else {
	$error = array("status" => 405 , "message" => 'Method no implementado ...');
	echo json_encode($error);
}

?> 


