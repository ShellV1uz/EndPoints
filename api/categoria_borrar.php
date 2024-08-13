<?php
include("../model/crud.php");

header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");


$crud = new Crud(); 

if($_SERVER["REQUEST_METHOD"] == "DELETE")
{ 
//----------------------------------------------------------------------
$data = array();
$data = json_decode(file_get_contents('php://input'),true);


$sql = "delete from categoria where id_categoria =".$_GET['id'];
$res = $crud->delete($sql); 


if ($res)
{
	$result = array("status" => true , "message" => "Producto borrado  correctamente...");
}
else
{
	$result = array("status" => false , "message" => "Ocurrio un error en el borrado...");
}
echo json_encode($result);

//-------------------------------------------------------------------------------
}else {
	$error = array("status" => 405 , "message" => 'Method no implementado ...');
	echo json_encode($error);
}

?> 

