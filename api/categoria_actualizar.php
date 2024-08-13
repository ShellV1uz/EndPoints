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


$nombre_categoria = $data["nombre_categoria"]; 

$sql = "update categoria set nombre = '$nombre_categoria'
where id_categoria =".$_GET ['id']; 
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


