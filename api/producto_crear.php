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
$lote_producto = $data["lote_producto"]; 
$tamaño_producto = $data["tamaño_producto"]; 
$precio_producto = $data["precio_producto"]; 
$disponibilidad_producto = $data["disponibilidad_producto"]; 
$caracteristicas_producto = $data["caracteristicas_producto"]; 
$sub_categorias_id_producto = $data["sub_categorias_id_producto"]; 
$sub_categorias_categoria_id_categoria_producto = $data["sub_categorias_categoria_id_categoria_producto"];
 
	
$sql = "insert into producto (id,nombre,lote,tamaño,precio,disponibilidad,caracteristicas,sub_categorias_id,sub_categorias_categoria_id_categoria) 
values ('$id_producto','$nombre_producto','$lote_producto','$tamaño_producto','$precio_producto','$disponibilidad_producto','$caracteristicas_producto','$sub_categorias_id_producto','$sub_categorias_categoria_id_categoria_producto')";
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


