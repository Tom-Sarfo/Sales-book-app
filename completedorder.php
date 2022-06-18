<?php  
 require_once '../db.php'; 
 $output = '';

 $output .= '
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Order #</th>  
                     <th width="40%">First Name</th>
                     <th width="40%">Last Name</th>  
                     <th width="40%">Name of Product</th> 
                     <th width="40%">Size</th> 
                     <th width="40%">Price</th>  
                     <th width="40%">Quantity</th> 
                     <th width="40%">Detail location</th>  
                     <th width="40%">Email</th> 
                     <th width="40%">Phone</th>  
                     <th width="40%">Date/Time</th> 
                     <th width="40%">Order ID</th>
                     <th width="10%">Payment Status</th>  
                </tr>';
  $sql = "SELECT * FROM order_list ORDER BY order_id DESC";  
  $result = mysqli_query($con, $sql);  

 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
          
          
               $output .= '  
                <tr>  
                    <td>'.$row["order_id"].'</td>  
                    <td class="first_name">'.$row["firstname"].'</td> 
                    <td class="design">'.$row["lastname"].'</td>   
                    <td class="last_name">'.$row["nameProduct"].'</td>  
                    <td class="color">'.$row["sizeProduct"].'</td>  
                    <td class="delivery_place">'.$row["priceProduct"].'</td>  
                    <td class="delivery_date">'.$row["quantity"].'</td>  
                    <td class="payment_mode">'.$row["location"].'/'.$row['detail_location'].'</td>  
                    <td class="amount_paid">'.$row["email"].'</td> 
                    <td class="amount_paid">'.'0'.$row["phone"].'</td> 
                    <td class="phone">'.$row["date"].'</td>
                    <td class="status">'.$row["order_reference"].'</td>
                    <td><button type="button" data-id2="'.$row["order_id"].'" class="btn btn-outline-warning btn_conf">'.$row["order_status"].'</button></td>
                    <td><button type="button" name="delete_btn" data-id10="'.$row["order_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
          ';  
              
          }
           
}else{  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>