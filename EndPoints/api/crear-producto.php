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

$id_producto = $data["id_producto"]; 
$nombre_producto = $data["nombre_producto"]; 
$descripcion_producto = $data["descripcion_producto"]; 
$precio_producto = $data["precio_producto"];  
$foto_producto = $data["foto_producto"]; 
$id_categoria = $data["id_categoria"]; 
$nombre_categoria = $data["nombre_categoria"]; 
	
$sql = "insert into productos (id_producto,nombre_producto,descripcion_producto,precio_producto,foto_producto,id_categoria,nombre_categoria, upload_date) values ('$id_producto','$nombre_producto','$descripcion_producto','$precio_producto','$foto_producto','$id_categoria','$nombre_categoria',NOW())";
$res = $crud->create($sql);
if ($res)
{
	$result = array("status" => true , "message" => "Producto agregado correctamente...");
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


