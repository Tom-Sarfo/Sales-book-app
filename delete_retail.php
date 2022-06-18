<?php  
 $connect = mysqli_connect("localhost", "tomusbir_sarfo", "snpb]aO_hA)9", "tomusbir_account"); 
 $sql = "DELETE FROM retail_account WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>