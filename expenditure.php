<html>  
      <head>  
           <title>TomusBirk Account Record</title>  
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
                     <h3 align="center">TomusBirk Retail Account</h3><br />  
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
                url:"select_exp.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var first_name = $('#first_name').text();
           var design = $('#design').text();    
           var last_name = $('#last_name').text(); 
           var color = $('#color').text();  
           var delivery_place = $('#delivery_place').text(); 
           var delivery_date = $('#delivery_date').text();  
           var payment_mode = $('#payment_mode').text(); 
           var amount_paid = $('#amount_paid').text();  
           var phone = $('#phone').text(); 
           var status = $('#status').text();  
           if(first_name == '')  
           {  
               swal("Enter Name of customer");   
                return false;  
           }  
           if(design == '')  
           {  
                swal("Enter design of the order"); 
                return false;  
           }  
           if(last_name == '')  
           {  
                swal("Enter size of the order");   
                return false;  
           } 
           if(color == '')  
           {  
                swal("Enter color of the leather");   
                return false;  
           }  
           if(delivery_place == '')  
           {  
                swal("Enter Place of delivery");   
                return false;  
           }  
           
           if(payment_mode == '')  
           {  
                swal("Enter Mode of payment");   
                return false;  
           }  
           if(amount_paid == '')  
           {  
                swal("Enter amount Paid");   
                return false;  
           }  
           if(phone == '')  
           {  
                swal("Enter phone number");   
                return false;  
           }   
           if(status == '')  
           {  
                swal("Set order Status");   
                return false;  
           }   
           $.ajax({  
                url:"insert_exp.php",  
                method:"POST",  
                data:{first_name:first_name, design:design, last_name:last_name, color:color, delivery_place:delivery_place, delivery_date:delivery_date, payment_mode:payment_mode, amount_paid:amount_paid, phone:phone, status:status},  
                dataType:"text",  
                success:function(data)  
                {  
                     swal(data);   
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit_exp.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     swal(data);     
                }  
           });  
      }  
      $(document).on('blur', '.first_name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "first_name");  
      });  
      $(document).on('blur', '.design', function(){  
           var id = $(this).data("id11");  
           var design = $(this).text();  
           edit_data(id, design, "design");  
      });  
      $(document).on('blur', '.last_name', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "last_name");  
      });
      $(document).on('blur', '.color', function(){  
           var id = $(this).data("id3");  
           var color = $(this).text();  
           edit_data(id, color, "color");  
      });  
      $(document).on('blur', '.delivery_place', function(){  
           var id = $(this).data("id4");  
           var delivery_place = $(this).text();  
           edit_data(id,delivery_place, "delivery_place");  
      });  
      $(document).on('blur', '.delivery_date', function(){  
           var id = $(this).data("id5");  
           var delivery_date = $(this).text();  
           edit_data(id, delivery_date, "delivery_date");  
      });  
      $(document).on('blur', '.payment_mode', function(){  
           var id = $(this).data("id6");  
           var payment_mode = $(this).text();  
           edit_data(id,payment_mode, "payment_mode");  
      });  
      $(document).on('blur', '.amount_paid', function(){  
           var id = $(this).data("id7");  
           var amount_paid = $(this).text();  
           edit_data(id, amount_paid, "amount_paid");  
      });  
      $(document).on('blur', '.phone', function(){  
           var id = $(this).data("id8");  
           var phone = $(this).text();  
           edit_data(id,phone, "phone");  
      });  
      $(document).on('blur', '.status', function(){  
           var id = $(this).data("id9");  
           var status = $(this).text();  
           edit_data(id, status, "status");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id10");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_exp.php",  
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