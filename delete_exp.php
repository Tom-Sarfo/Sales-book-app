<?php  
 $connect = mysqli_connect(...); 
 $sql = "DELETE FROM retail_orders WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>
