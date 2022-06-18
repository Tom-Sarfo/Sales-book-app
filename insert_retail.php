<?php  
require_once '../db.php';  
 $sql = "INSERT INTO retail_account(first_name, design, last_name, color, delivery_place, status) VALUES('".$_POST["first_name"]."', '".$_POST["design"]."', '".$_POST["last_name"]."', '".$_POST["color"]."', '".$_POST["delivery_place"]."', '".$_POST["status"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 
