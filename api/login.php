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

$usuario = $data["usuario"];
$password = $data["password"];



$sql = "select * from usuarios where correo='".$usuario."' and contraseña='".$password."'";
    $res = $crud->read($sql);
    $count = mysqli_num_rows($res);

        if ($count > 0) {
            $getdata = array();
            while ($row = mysqli_fetch_array($res)) {
            $getdata[] = $row; 
            }
            $result = array("status" => true , "alldata" => $getdata);

        }else {
            $result = array("status" => false , "message" => "Error de autentificacion...");
              }
        echo json_encode($result);

        //-------------------------------------------------------------------------------
        }else {
            $error = array("status" => 405 , "message" => 'Method no implementado ...');
            echo json_encode($error);
        }

?> 


