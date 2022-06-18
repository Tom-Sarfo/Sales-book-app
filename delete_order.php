<?php  
 require_once '../db.php'; 
 
 $sql = "DELETE FROM order_list WHERE order_id = '".$_POST["id"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Order Deleted';  
 }else{
     echo 'poor connection';
 }  
 ?>