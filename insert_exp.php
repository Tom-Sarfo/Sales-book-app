<?php  
 require_once '../db.php';  
 $sql = "INSERT INTO retail_orders(exp_description, quantity, price, exp_date, exp_id, exp_status) VALUES('".$_POST["exp_description"]."', '".$_POST["quantity"]."', '".$_POST["price"]."', '".$_POST["exp_date"]."', '".$_POST["exp_id"]."', '".$_POST["exp_status"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 
