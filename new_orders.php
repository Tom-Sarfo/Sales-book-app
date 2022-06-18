<?php
session_start();
$connect = mysqli_connect("localhost", "tomusbir_sarfo", "snpb]aO_hA)9", "tomusbir_account");  

if (!isset($_SESSION['user'])) {
	header("Location: membership/login.php");
}


?>


<html>  
      <head>  
           <title>TomusBirk completed Order Page</title>  
           <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
           <script type="text/javascript" src="js/bootstrap.min.js"></script>            
           <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  
      </head>  
      <body>  
           <div class="container"> 
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">TomusBirk Completed Orders</h3><span><a href="membership/logout.php" class="btn btn-outline-danger">Log Out</a></span><br><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>
 <script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>    
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"completedorder.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();
      
      $(document).on('click', '.btn_conf', function(){  
           var id = $(this).data("id2");  
           if(confirm("Are you sure you want to confirm this order?"))  
           {  
                $.ajax({  
                     url:"confirm_order.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          swal(data);     
                           fetch_data(); 
                           $('.btn_conf').attr("disabled", true);
                     }  
                });  
           }  
      });  
     $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id10");  
           if(confirm("Are you sure you want to delete this Order?"))  
           {  
                $.ajax({  
                     url:"delete_order.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          swal(data);     
                          fetch_data();  
                     }  
                });  
           }  
      });  
      
 });  
 </script>