<?php  
 $connect = mysqli_connect("localhost", "tomusbir_sarfo", "snpb]aO_hA)9", "tomusbir_account");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE retail_orders SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>