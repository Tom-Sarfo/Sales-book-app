<?php  
 require_once '../db.php'; 
 $sql = "UPDATE `order_list` SET `order_status` = 'Confirmed'  WHERE `order_id`='".$_POST["id"]."'";
 if(mysqli_query($con, $sql)) 
 {  
    // select the user with this particular id
    $query = "SELECT * FROM `order_list` WHERE `order_id` ='".$_POST["id"]."'"; 
	$res = mysqli_query($con, $query);
	if(mysqli_num_rows($res) > 0){ 	
	      while($fetch = mysqli_fetch_array($res)) {
	        $name = $fetch["nameProduct"];
	        $email = $fetch["email"];
	        $firstname = $fetch["firstname"];
	        $id = $fetch["mem_id"];
	        
    require 'PHPMailerAutoload.php';
    // send order list to customerservice and partners or staffs
        $mail = new PHPMailer;
        $mail->setFrom('ordermanagement@tomusbirk.com', 'Tomusbirk');
        $mail->addAddress($email, $firstname);
        $mail->Subject = 'TomusBirk Order confirmation';
        $mail->isHTML(true);
         $currentpage = urlencode($_SERVER['REQUEST_URI']);
        $mail->Body = "<h5><b>Hello $firstname, </b></h5><br>
        <p>Your order $name made from TomusBirk, has been confirmed successfully. Please click the link below to view your order history and don't forget to download your order invoice.<br>
        Thank you.</p><br><br><br>
        <h3><a href='https://www.tomusbirk.com/your_order.php?location=$currentpage'>View Order</a></h3><br>";
        
        
        $mail->AltBody = "Your order made from TomusBirk has been confirmed successfully.";
        
        if(!$mail->send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail->ErrorInfo;
          
        } else {
            
          echo 'Order has been confirmed successfully'; 
        }
	          
	          
	          
	      }
	    
	}
	
	// echo 'Order has been confirmed successfully'; 
     
 }  
  
 ?>