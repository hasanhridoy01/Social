<?php 
  
  include_once "apps/db.php";
  include_once "apps/function.php";

  if ( isset($_GET['id']) ) {
  	
  	  $id = $_GET['id'];

  }
  
    $sql = "DELETE FROM userr WHERE id='$id'";
    $connection -> query($sql);

    header('location: index.php');


 ?>