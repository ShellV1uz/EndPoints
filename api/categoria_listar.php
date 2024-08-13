<?php
include("../model/crud.php");

header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");


$crud = new Crud(); 

if($_SERVER["REQUEST_METHOD"] == "GET")
{ 

	$sql = "select * from categoria";
	$res = $crud->read($sql);
	$count = mysqli_num_rows($res);

		if ($count > 0) {
            $getdata = array();
	        while($row = mysqli_fetch_array($res)) { 
			$getdata[] = $row;
    		}
 			$result = array("status" => true , "alldata" => $getdata); 
		
		}else {
			$result = array("status" => false , "message" => 'No registros encontrados ...'); 
			}
		echo json_encode($result);


}else {
	$error = array("status" => 405 , "message" => 'Method no implementado ...');
	echo json_encode($error);
}

?> 

