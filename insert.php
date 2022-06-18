<?php  
require_once '../db.php'; 
 $sql = "INSERT INTO tbl_sample(first_name, design, last_name, color, delivery_place, delivery_date, payment_mode, amount_paid, phone, status) VALUES('".$_POST["first_name"]."', '".$_POST["design"]."', '".$_POST["last_name"]."', '".$_POST["color"]."', '".$_POST["delivery_place"]."', '".$_POST["delivery_date"]."', '".$_POST["payment_mode"]."', '".$_POST["amount_paid"]."', '".$_POST["phone"]."', '".$_POST["status"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 
