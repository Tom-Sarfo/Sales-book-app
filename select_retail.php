<?php  
require_once '../db.php';  
 $output = '';
 
  $sqli = "SELECT SUM(`color`) AS cash_amt FROM `retail_account` WHERE `status`= 1";
  $final = mysqli_query($connect, $sqli);
  while($row = mysqli_fetch_assoc($final)) {
    $cash = $row['cash_amt'];
  }      
 $output .= '
 <div class="jumbotron xs-4">
      <strong><p>Total Sales: <span> '.$amt.'</span></p></strong>
      <strong><p>Amount in Momo: <span> '.$momo.'</span></p></strong>
      <strong><p>Amount in Cash: <span> '.$cash.'</span></p></strong>
      <a href="index.php" align="right" class="btn btn-primary" style="text-decoration: none; color: #ffffff;">Go to Sales Order Account</a>
      <a href="expenditure.php" align="right" class="btn btn-primary" style="text-decoration: none; color: #ffffff;">Go to Retail Orders</a>
    </div>  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">Name of Retailer</th>
                     <th width="40%">Expected Order</th>    
                     <th width="40%">Actual Order</th> 
                     <th width="40%">Amount Paid</th>  
                     <th width="40%">Amount Owing</th> 
                     <th width="10%">Status</th>  
                </tr>';
  $sql = "SELECT * FROM retail_account ORDER BY id DESC";  
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
