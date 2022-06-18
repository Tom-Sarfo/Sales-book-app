<?php  
require_once '../db.php';  
 $output = '';
 $query = "SELECT SUM(`amount_paid`) AS amount FROM `tbl_sample` WHERE `acc_status`= 1";
        $res = mysqli_query($connect, $query);
        while($row = mysqli_fetch_assoc($res)) {
          $amt = $row['amount'];
        }
  $sql = "SELECT SUM(`amount_paid`) AS momo_amt FROM `tbl_sample` WHERE `payment_mode`= 'Momo' AND `acc_status`= 1";
  $outcome = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_assoc($outcome)) {
    $momo = $row['momo_amt'];
  }
  $sqli = "SELECT SUM(`amount_paid`) AS cash_amt FROM `tbl_sample` WHERE `payment_mode`= 'Cash' AND `acc_status`= 1";
  $final = mysqli_query($connect, $sqli);
  while($row = mysqli_fetch_assoc($final)) {
    $cash = $row['cash_amt'];
  }      
 $output .= '
 <div class="jumbotron xs-4">
      <strong><p>Total Sales: <span> '.$amt.'</span></p></strong>
      <strong><p>Amount in Momo: <span> '.$momo.'</span></p></strong>
      <strong><p>Amount in Cash: <span> '.$cash.'</span></p></strong>
      <a href="expenditure.php" align="right" class="btn btn-primary" style="text-decoration: none; color: #ffffff;">Go to Retail Orders</a>
      <a href="retail_account.php" align="right" class="btn btn-primary" style="text-decoration: none; color: #ffffff;">Go to Retail Account</a>
    </div>  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">Customer Name</th>
                     <th width="40%">Design</th>    
                     <th width="40%">Size</th> 
                     <th width="40%">Color</th>  
                     <th width="40%">Delivery Place</th> 
                     <th width="40%">Delivery Date</th>  
                     <th width="40%">Mode Of Payment</th> 
                     <th width="40%">Amount Paid</th>  
                     <th width="40%">Phone</th>  
                     <th width="10%">Status</th>  
                </tr>';
  $sql = "SELECT * FROM tbl_sample ORDER BY id DESC";  
  $result = mysqli_query($connect, $sql);  

 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td> 
                     <td class="design" data-id11="'.$row["id"].'" contenteditable>'.$row["design"].'</td>   
                     <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["last_name"].'</td>  
                     <td class="color" data-id3="'.$row["id"].'" contenteditable>'.$row["color"].'</td>  
                     <td class="delivery_place" data-id4="'.$row["id"].'" contenteditable>'.$row["delivery_place"].'</td>  
                     <td class="delivery_date" data-id5="'.$row["id"].'" contenteditable>'.$row["delivery_date"].'</td>  
                     <td class="payment_mode" data-id6="'.$row["id"].'" contenteditable>'.$row["payment_mode"].'</td>  
                     <td class="amount_paid" data-id7="'.$row["id"].'" contenteditable>'.$row["amount_paid"].'</td>  
                     <td class="phone" data-id8="'.$row["id"].'" contenteditable>'.'0'.$row["phone"].'</td>
                     <td class="status" data-id9="'.$row["id"].'" contenteditable>'.$row["status"].'</td>    
                     <td><button type="button" name="delete_btn" data-id10="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="first_name" contenteditable></td>
                <td id="design" contenteditable></td>    
                <td id="last_name" contenteditable></td> 
                <td id="color" contenteditable></td>  
                <td id="delivery_place" contenteditable></td> 
                <td id="delivery_date" contenteditable></td>  
                <td id="payment_mode" contenteditable></td> 
                <td id="amount_paid" contenteditable></td>  
                <td id="phone" contenteditable></td> 
                <td id="status" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
