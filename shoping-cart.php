<?php
session_start();
	require 'conn.php';
	
	if(!ISSET($_SESSION['user'])){
		//header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free delivery on campuses in Accra and Kumasi
					</div>

					<div class="right-top-bar flex-w h-full">

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<?php

							if(ISSET($_SESSION['user'])){
								$id = $_SESSION['user'];
								$sql = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
								$sql->execute();
								$fetch = $sql->fetch();
								echo '<a href="#" class="flex-c-m trans-04 p-lr-25 anchor">
							 	'.$fetch['username'].'
								</a>';
							}
						?>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							GH
						</a>

						<a href="logout.php" class="flex-c-m trans-04 p-lr-25">
							Log Out
						</a>
						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Sign In
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/logo6.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">

						<?php

							if(ISSET($_SESSION['user'])){
								$id = $_SESSION['user'];
								$sql = $conn->prepare("SELECT COUNT(id) AS count FROM shopping_cart WHERE mem_id = '$id'");
								$sql->execute();
								$fetch = $sql->fetch();
								echo '<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="'.$fetch['count'].'">
									<i class="zmdi zmdi-shopping-cart"></i>
								</div>';

								$sqli = $conn->prepare("SELECT COUNT(order_id) AS value FROM order_list WHERE mem_id = '$id'");
								$sqli->execute();
								$fetchi = $sqli->fetch();

								echo '<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-favorite" data-notify="'. $fetchi['value'].'">
									<i class="fa fa-shopping-bag"></i>
									</a>';

							}else{
						echo '<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>';
						echo '<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-favorite" data-notify="0">
							<i class="fa fa-shopping-bag"></i>
						</a>';
					}
						?>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/logo6.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">

				<?php

							if(ISSET($_SESSION['user'])){
								$id = $_SESSION['user'];
								$sql = $conn->prepare("SELECT COUNT(id) AS count FROM shopping_cart WHERE mem_id = '$id'");
								$sql->execute();
								$fetch = $sql->fetch();
								echo '<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="'.$fetch['count'].'">
									<i class="zmdi zmdi-shopping-cart"></i>
								</div>';

								$sqli = $conn->prepare("SELECT COUNT(order_id) AS value FROM order_list WHERE mem_id = '$id'");
								$sqli->execute();
								$fetchi = $sqli->fetch();

								echo '<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-favorite" data-notify="'. $fetchi['value'].'">
									<i class="fa fa-shopping-bag"></i>
									</a>';

							}else{
						echo '<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>';
						echo '<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-favorite" data-notify="0">
							<i class="fa fa-shopping-bag"></i>
						</a>';
					}
						?>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free delivery on campuses in Accra and Kumasi
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<?php

							if(ISSET($_SESSION['user'])){
								$id = $_SESSION['user'];
								$sql = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
								$sql->execute();
								$fetch = $sql->fetch();
								echo '<a href="#" class="flex-c-m trans-04 p-lr-25 anchor">
							 	'.$fetch['username'].'
								</a>';
							}
						?>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							GH
						</a>

						<a href="logout.php" class="flex-c-m trans-04 p-lr-25">
							Log Out
						</a>
						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Sign In
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.php">Shop</a>
				</li>

				<li>
					<a href="login.php">Sign In</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

				</ul>
				
				<div class="w-full">
					<?php 
					$connect = mysqli_connect("localhost", "tomusbir_sarfo", "snpb]aO_hA)9", "tomusbir_tomus");  

					if(ISSET($_SESSION['user'])){

						$id = $_SESSION['user'];

					$sql = "SELECT SUM(`quantity_product` * `price_product`) AS amount FROM `shopping_cart` WHERE `mem_id` = '$id'"; 
						  $res = mysqli_query($connect, $sql);

					      if(mysqli_num_rows($res) > 0)  
					      {   
					        while($fetch = mysqli_fetch_array($res)) {
					        	$totals = $fetch['amount'];
					        	echo '<div class="header-cart-total w-full p-tb-40">
								Total: <span style="font-size: 20px;">¢</span>'.$totals.'
								</div>';
							        }
							    }
						}else{
							echo '<div class="header-cart-total w-full p-tb-40">
								Total: <span style="font-size: 20px;">¢</span>0.00
								</div>';
						}	 

					 ?>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- favourite -->
	<div class="wrap-header-cart js-panel-favorite">
		<div class="s-full js-hide-favorite"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Order List
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-favorite">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-favorite-wrapitem w-full">
					
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- breadcrumb -->
	<div class="container responsive">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg responsive">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<!-- <form class="bg0 p-t-75 p-b-85"> -->
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl showUp">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								<?php
								if(ISSET($_SESSION['user'])){

									$connect = mysqli_connect("localhost", "tomusbir_sarfo", "snpb]aO_hA)9", "tomusbir_tomus"); 

									$id = $_SESSION['user'];
									  $sql = "SELECT * FROM `shopping_cart` WHERE `mem_id`='$id' ORDER BY id DESC"; 
									  $res = mysqli_query($connect, $sql);

									      if(mysqli_num_rows($res) > 0)  
									      {   
									        while($fetch = mysqli_fetch_array($res)) {
									       $name = $fetch["nameProduct"];
									       $s = ucfirst($name);
									       $bar = ucwords(strtolower($s));
									       $data = preg_replace('/\s+/', '', $bar);

									       $total = $fetch["quantity_product"] * $fetch["price_product"];


										echo '<tr class="table_row">
												<td class="column-1">
													<div class="how-itemcart1">
													
														<img src="images/'.$data.'.jpg" alt="IMG">
													</div>
												</td>
												<td class="column-2">'.$fetch["nameProduct"].'</td>
												<td class="column-3" id="price"><span style="font-size: 20px;">¢</span>'.$fetch["price_product"].'</td>
												<td>
												<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
														<div class="btn-num-product-down1 cl8 hov-btn3 trans-04 flex-c-m" data-id15="'.$fetch["id"].'">
															<i class="fs-16 zmdi zmdi-minus"></i>
														</div>

														<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="'.$fetch["quantity_product"].'">

														<div class="btn-num-product-up1 cl8 hov-btn3 trans-04 flex-c-m" data-id12="'.$fetch["id"].'">
															<i class="fs-16 zmdi zmdi-plus"></i>
														</div>
													</div>
													</td>
												<td class="column-5" data-id13="'.$fetch["id"].'" id="total"><span style="font-size: 20px;">¢</span>'.$total.'</td>
												<td><button type="button" name="delete_btn" data-id10="'.$fetch["id"].'" class="btn btn-xs btn-danger btn_delete" style="margin-right: 20px;">x</button></td>  
											</tr>';
									    }
									    }
										}
										?>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 update-cart">
								Update Cart
							</div>
							
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
						
						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php 
									if(ISSET($_SESSION['user'])){

										$id = $_SESSION['user'];

										$sql = "SELECT SUM(`quantity_product` * `price_product`) AS amount FROM `shopping_cart` WHERE `mem_id` = '$id'"; 
													  $res = mysqli_query($connect, $sql);

													      if(mysqli_num_rows($res) > 0)  
													      {   
													        while($fetch = mysqli_fetch_array($res)) {
													        	$totals = $fetch['amount'];
													        	echo '<span style="font-size: 20px;">¢</span>'.$totals;
													        }
													    }
										}else{
											echo '<span style="font-size: 20px;">¢</span>0.00';
										}	 
									?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Delivery:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Delivery fee outside Accra and Kumasi is calculated on distance basis. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Delivery
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a Location...</option>
											<option>Accra</option>
											<option>Kumasi</option>
											<option></option>
											<option>Tema</option>
											<option>Kasoa</option>
											<option>Ablekuma</option>
											<option>Other</option>

										</select>
										<div class="dropDownSelect2"></div>
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer update-cart">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php
										if(ISSET($_SESSION['user'])){

									 		echo '<span style="font-size: 20px;">¢</span>'.$totals;
									 	}else{
									 		echo '<span style="font-size: 20px;">¢</span>0.00';
									 	} 
									 ?>
								</span>
							</div>
						</div>
						<?php
							if(ISSET($_SESSION['user'])){
								//$connect = mysqli_connect("localhost", "root", "", "tomusbirk"); 

									$id = $_SESSION['user'];
									  $sql = "SELECT * FROM `member` WHERE `mem_id`='$id'"; 
									  $res = mysqli_query($connect, $sql); 
									    while($fetch = mysqli_fetch_array($res)) {

								 		echo "<button class='flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer' data-id5='".$fetch["mem_id"]."' id='order'>
											Proceed to Order
										</button>";
								 	}
								}
						?>
					</div>
				</div>
			</div>
		</div>
	<!-- </form> -->
		
	
		

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/sweetalert/sweetalert.min.js"></script>

	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});

		$(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id10");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete-cart.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          swal(data); 
						location.href = 'shoping-cart.php';
                     }  
                });  
           }  
      }); 

      
 
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>