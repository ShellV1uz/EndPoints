<?php
include("../config/connection.php");

class Crud extends Connection
{

  public function __construct()
 {
	  parent::__construct();
 }
 
 public function create($data)
 {
   $insert = $this->con->query($data) or die();
 
   if($insert)
   {
     return $insert;
   }
   else 
   {
     echo "fallo en la inserccion...";
   }
 }

 public function update($data)
 {
   $update = $this->con->query($data) or die();
 
   if($update)
   {
     return $update;
   }
   else 
   {
     echo "fallo en la actualizacion...";
   }
 }

 public function delete($data)
 {
   $delete = $this->con->query($data) or die();
 
   if($delete)
   {
     return $delete;
   }
   else 
   {
     echo "fallo en el  borrado ...";
   }
 }

 
 public function read($data)
{
  $view = $this->con->query($data) or die();

  if ($view->num_rows > 0)
  {
    return $view;
  }
  else
  {
	 return $view;
  }
}




}
?>