<?php
include("../model/crud.php");

header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");


$crud = new Crud(); 

if($_SERVER["REQUEST_METHOD"] == "PUT")
{ 
//----------------------------------------------------------------------
$data = array();
$data = json_decode(file_get_contents('php://input'),true);


$nombre_producto = $data["nombre_producto"]; 
$precio_producto = $data["precio_producto"];  
$caracteristicas = $data["caracteristicas"];  


$sql = "update producto set nombre = '$nombre_producto', 
precio = '$precio_producto', 
caracteristicas = '$caracteristicas' 
where id =".$_GET ['id']; 
$res = $crud->update($sql);

if ($res)
{
	$result = array("status" => true , "message" => "Producto actualizado  correctamente...");
}
else
{
	$result = array("status" => false , "message" => "Ocurrio un error en la actualizacion...");
}
echo json_encode($result);

//-------------------------------------------------------------------------------
}else {
	$error = array("status" => 405 , "message" => 'Method no implementado ...');
	echo json_encode($error);
}

?> 


