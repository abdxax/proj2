<?php
session_start();
require "dboop/db.php";
$ids=[];
if (isset($_POST['btn1'])) {
	$fname=strip_tags($_POST['fname']);
	$lname=strip_tags($_POST['lname']);
	$email=strip_tags($_POST['email']);
	$phone=strip_tags($_POST['phone']);
	$pass=strip_tags($_POST['pass1']);
	$pass2=strip_tags($_POST['pass2']);

	if($pass===$pass2){
		$name=$fname." ".$lname;
		$pas=sha1($pass);
		$sql_user="INSERT INTO user (email,password,role) VALUES ('$email','$pas','2')";
		if (mysqli_query($conn,$sql_user)) {
			$sql_info="INSERT INTO info(name,phone,email) VALUES('$name','$phone','$email')";
			if (mysqli_query($conn,$sql_info)) {
				header("location:index.php");
			}
		}
		else{
			echo "string";
		}
	}
}

//login in 
if (isset($_POST['sing'])) {
	$email=strip_tags($_POST['email']);
	$pass=strip_tags($_POST['pass']);
	$pass2=sha1($pass);
	$sql_login="SELECT * FROM user WHERE email='$email' AND password='$pass2'";
	$res=mysqli_query($conn,$sql_login);
	if (mysqli_num_rows($res)==1) {
		$_SESSION['email']=$email;
		header("location:index.php");
	}
}


?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Vendue </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="#home">Vendue</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a  class="shop2" href="#home">Home</a></li>
								<li class="has-dropdown">
									<a >Categories</a>
									<ul class="dropdown">
										<li><a id="dressid"href="#dress">Dresses</a></li>
										<li><a id="shoesid"href="#shoes">Shoes</a></li>
										<li><a id="jeweleryid"href="#jewelery">Jewelery</a></li>
										<li><a id="bagsid"href="#bags">Bags</a></li>
										<li><a id="vintageid"href="#vintage">Vintage</a></li>
										<li><a id="othersid"href="#others">Others</a></li>
										<?php 
                                         /*  $sql_catg="SELECT * FROM category";
                                           $res=mysqli_query($conn,$sql_catg);
                                           $count=0;
                                           while($row=mysqli_fetch_array($res)){
                                             $ids[$count]=$row['came'];
                                             echo '<li><a id="dressid" href="#'.$row['came'].'">'.$row['came'].'</a></li>';
                                             $count++;
                                           }*/

										?>
									</ul>
								</li>
								<li><a  class="shop2" href="#aboutus">About</a></li>
								<li><a  class="shop2" href="#contantus">Contact</a></li>
								<?php
								if (isset($_SESSION['email'])) {
									# code...
									echo '
									<li><a  id="adsid"  href="#ads">Creat an Advertising</a></li>

                                             <li><a  id="adsid"  href="logout.php">Log Out</a></li>
									';
								}else{
									echo '<li><a  class="shop2" href="#singup">SignUp</a></li>
								<li><a  class="shop2" href="#singin">SignIn</a></li>';
								}


								?>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

<!-- home -->
		<section id="home" >
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Find</h1>
					   					<h2 class="head-2">Elegent</h2>
					   					<h2 class="head-3">Bags</h2>
					   					<p class="category"><span>with best price</span></p>
					   					<p><a href="#" class="btn btn-primary">See Bags</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Get</h1>
					   					<h2 class="head-2">the</h2>
					   					<h2 class="head-3">Best </h2>
											<h3>commodity</h3>
					   					<p class="category"><span></span></p>
					   					<p><a href="#" class="btn btn-primary">See more</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1"> all</h1>
					   					<h2 class="head-2">needs women</h2>
					   					<h2 class="head-3"></h2>
					   					<p class="category"><span>  is here &amp; more </span></p>
					   					<p><a href="#" class="btn btn-primary">see more</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
				<!--	<div class="col-md-6">
						<a href="#shop" class="f-product-1" style="background-image: url(images/item-1.jpg);">
							<div class="desc">
								<h2> </br>Dresses</h2>
							</div>
						</a>
					</div> -->
					<div class="col-md-6">
						<a href="" class="f-product-2" style="background-image: url(images/dress.jpg);">
							<div class="desc">
								<h2> </br> Dresses</h2>
							</div>
						</a>
						<a href="" class="f-product-2" style="background-image: url(images/jewelery.jpg);">
							<div class="desc">
								<h2> </br> Jewelery</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(images/shoes.jpg);">
									<div class="desc">
										<h2> </br>Shoes </h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(images/bag.jpg);">
									<div class="desc">
										<h2> </br>Bags </h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(images/vintage.jpg);">
									<div class="desc">
										<h2> </br>Vintage </h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(images/other.jpg);">
									<div class="desc">
										<h2> </br>Others </h2>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">get</h2>

											<span class="sup-2">the</span>
										</div>
										<h2 class="text-sale">vintages</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title"> </h3>
									<p></p>
									<p><a href="shop.html" class="btn btn-primary">Shop Now</a> </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Ending soon</span></h2>
						<p>These commodities well be ending soon.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/item-5.jpg);">
								<p class="tag"><span class="new">Ending soon</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="#product1"><i class="icon-eye"></i></a></span>
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html"> Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/item-6.jpg);">
								<p class="tag"><span class="new">Ending soon</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="#product1"><i class="icon-eye"></i></a></span>
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Wedding Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/item-7.jpg);">
								<p class="tag"><span class="new">Ending soon</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="#product1"><i class="icon-eye"></i></a></span>
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="#"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Dior Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/item-8.jpg);">
								<p class="tag"><span class="new">Ending soon</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="#"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="#home">Pink Dress</a></h3>
								<p class="price"><span>$300.00</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</section>

<!-- Dresses -->

		<!--<section id="dress">
			<aside id="colorlib-hero" class="breadcrumbs">
				<div class="flexslider">
					<ul class="slides">
						<li style="background-image: url(images/cover-img-1.jpg);">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
										<div class="slider-text-inner text-center">
											<h1>Dresses</h1>
											<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Dresses</span></h2>
										</div>
									</div>
								</div>
							</div>
						</li>
						</ul>
					</div>
			</aside>

			<div class="colorlib-shop">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-push-2">
							<div class="row row-pb-lg">
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-1.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-2.jpg);">
											<p class="tag"><span class="sale">Sale</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-3.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-4.jpg);">
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-5.jpg);">
											<p class="tag"><span class="sale">Sale</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-6.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-7.jpg);">
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-8.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-9.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-10.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-11.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-12.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<ul class="pagination">
										<li class="disabled"><a href="#">&laquo;</a></li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-md-pull-10">
							<div class="sidebar">
								<div class="side">
									<h2>Categories</h2>
									<div class="fancy-collapse-panel">
													<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Dresses
																				 </a>
																		 </h4>
																 </div>

														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shoes
																				 </a>
																		 </h4>
																 </div>

														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Bags
																				 </a>
																		 </h4>
																 </div>
																 </div>
														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Jewelry
																				 </a>
																		 </h4>
																 </div>
														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Vintage
																				 </a>
																		 </h4>
																 </div>
														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Other
																				 </a>
																		 </h4>
																 </div>
														 </div>
													</div>
											 </div>
								</div>
						</div>
					</div>
				</div>
			</div>

		</section>-->

		<section id="dress">
			<aside id="colorlib-hero" class="breadcrumbs">
				<div class="flexslider">
					<ul class="slides">
						<li style="background-image: url(images/cover-img-1.jpg);">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
										<div class="slider-text-inner text-center">
											<h1>Dresses</h1>
											<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Dresses</span></h2>
										</div>
									</div>
								</div>
							</div>
						</li>
						</ul>
					</div>
			</aside>

			<div class="colorlib-shop">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-push-2">
							<div class="row row-pb-lg">
								
								
										
								
								<!--<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/item-6.jpg);">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">Floral Dress</a></h3>
											<p class="price"><span>$300.00</span></p>
										</div>
									</div>
								</div>-->
								<?php
                                   $sql_dres="SELECT * FROM item WHERE ids='1'";
                                   $res_d=mysqli_query($conn,$sql_dres);
                                   while ($rows_d=mysqli_fetch_array($res_d)) {
                                   	echo '
                                   	<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('.$rows_d['paths'].');">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">'.$rows_d['title'].'</a></h3>
											<p class="price"><span>'.$rows_d['price'].'</span></p>
										</div>
									</div>
								</div>

                                   	';
                                   }

								?>
								
								
								
								
								
								
							</div>
							<div class="row">
								<div class="col-md-12">
									<ul class="pagination">
										<li class="disabled"><a href="#">&laquo;</a></li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-md-pull-10">
							<div class="sidebar">
								<div class="side">
									<h2>Categories</h2>
									<div class="fancy-collapse-panel">
													<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Dresses
																				 </a>
																		 </h4>
																 </div>

														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shoes
																				 </a>
																		 </h4>
																 </div>

														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Bags
																				 </a>
																		 </h4>
																 </div>
																 </div>
														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Jewelry
																				 </a>
																		 </h4>
																 </div>
														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Vintage
																				 </a>
																		 </h4>
																 </div>
														 </div>
														 <div class="panel panel-default">
																 <div class="panel-heading" role="tab" >
																		 <h4 class="panel-title">
																				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Other
																				 </a>
																		 </h4>
																 </div>
														 </div>
													</div>
											 </div>
								</div>
						</div>
					</div>
				</div>
			</div>

		</section>


	<!-- Shoes -->

			<section id="shoes">
				<aside id="colorlib-hero" class="breadcrumbs">
					<div class="flexslider">
						<ul class="slides">
							<li style="background-image: url(images/cover-img-1.jpg);">
								<div class="overlay"></div>
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
											<div class="slider-text-inner text-center">
												<h1>Shoes</h1>
												<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Shoes</span></h2>
											</div>
										</div>
									</div>
								</div>
							</li>
							</ul>
						</div>
				</aside>

				<div class="colorlib-shop">
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-push-2">
								<div class="row row-pb-lg">
									<!--<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes1.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes2.jpg);">
												<p class="tag"><span class="sale">Sale</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes3.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes4.jpg);">
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes5.jpg);">
												<p class="tag"><span class="sale">Sale</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes6.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes7.jpg);">
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes8.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes9.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes10.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes11.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center">
										<div class="product-entry">
											<div class="product-img" style="background-image: url(images/shoes12.jpg);">
												<p class="tag"><span class="new">New</span></p>
												<div class="cart">
													<p>
														<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
														<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
														<span><a href="#"><i class="icon-heart3"></i></a></span>
														<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
													</p>
												</div>
											</div>
											<div class="desc">
												<h3><a href="product-detail.html">Floral Dress</a></h3>
												<p class="price"><span>$300.00</span></p>
											</div>
										</div>
									</div>
								</div>-->
								<?php
                                   $sql_dres="SELECT * FROM item WHERE ids='2'";
                                   $res_d=mysqli_query($conn,$sql_dres);
                                   while ($rows_d=mysqli_fetch_array($res_d)) {
                                   	echo '
                                   	<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('.$rows_d['paths'].');">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">'.$rows_d['title'].'</a></h3>
											<p class="price"><span>'.$rows_d['price'].'</span></p>
										</div>
									</div>
								</div>

                                   	';
                                   }

								?>
							</div>
								<div class="row">
									<div class="col-md-12">
										<ul class="pagination">
											<li class="disabled"><a href="#">&laquo;</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">&raquo;</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-2 col-md-pull-10">
								<div class="sidebar">
									<div class="side">
										<h2>Categories</h2>
										<div class="fancy-collapse-panel">
														<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
															 <div class="panel panel-default">
																	 <div class="panel-heading" role="tab" >
																			 <h4 class="panel-title">
																					 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Dresses
																					 </a>
																			 </h4>
																	 </div>

															 </div>
															 <div class="panel panel-default">
																	 <div class="panel-heading" role="tab" >
																			 <h4 class="panel-title">
																					 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shoes
																					 </a>
																			 </h4>
																	 </div>

															 </div>
															 <div class="panel panel-default">
																	 <div class="panel-heading" role="tab" >
																			 <h4 class="panel-title">
																					 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Bags
																					 </a>
																			 </h4>
																	 </div>
																	 </div>
															 </div>
															 <div class="panel panel-default">
																	 <div class="panel-heading" role="tab" >
																			 <h4 class="panel-title">
																					 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Jewelry
																					 </a>
																			 </h4>
																	 </div>
															 </div>
															 <div class="panel panel-default">
																	 <div class="panel-heading" role="tab" >
																			 <h4 class="panel-title">
																					 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Vintage
																					 </a>
																			 </h4>
																	 </div>
															 </div>
															 <div class="panel panel-default">
																	 <div class="panel-heading" role="tab" >
																			 <h4 class="panel-title">
																					 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Other
																					 </a>
																			 </h4>
																	 </div>
															 </div>
														</div>
												 </div>
									</div>
							</div>
						</div>
					</div>
				</div>

			</section>

	<!-- jewelery -->

				<section id="jewelery">
					<aside id="colorlib-hero" class="breadcrumbs">
						<div class="flexslider">
							<ul class="slides">
								<li style="background-image: url(images/cover-img-1.jpg);">
									<div class="overlay"></div>
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
												<div class="slider-text-inner text-center">
													<h1>Jewelery</h1>
													<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Jewelery</span></h2>
												</div>
											</div>
										</div>
									</div>
								</li>
								</ul>
							</div>
					</aside>

					<div class="colorlib-shop">
						<div class="container">
							<div class="row">
								<div class="col-md-10 col-md-push-2">
									<div class="row row-pb-lg">
										<!--<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw1.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw2.jpg);">
													<p class="tag"><span class="sale">Sale</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw3.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw4.jpg);">
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw5.jpg);">
													<p class="tag"><span class="sale">Sale</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw6.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw7.jpg);">
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw8.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw9.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw10.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw11.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>
										<div class="col-md-4 text-center">
											<div class="product-entry">
												<div class="product-img" style="background-image: url(images/jw12.jpg);">
													<p class="tag"><span class="new">New</span></p>
													<div class="cart">
														<p>
															<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
															<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
															<span><a href="#"><i class="icon-heart3"></i></a></span>
															<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
														</p>
													</div>
												</div>
												<div class="desc">
													<h3><a href="product-detail.html">Floral Dress</a></h3>
													<p class="price"><span>$300.00</span></p>
												</div>
											</div>
										</div>-->
										<?php
                                   $sql_dres="SELECT * FROM item WHERE ids='4'";
                                   $res_d=mysqli_query($conn,$sql_dres);
                                   while ($rows_d=mysqli_fetch_array($res_d)) {
                                   	echo '
                                   	<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('.$rows_d['paths'].');">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">'.$rows_d['title'].'</a></h3>
											<p class="price"><span>'.$rows_d['price'].'</span></p>
										</div>
									</div>
								</div>

                                   	';
                                   }

								?>
									</div>
									<div class="row">
										<div class="col-md-12">
											<ul class="pagination">
												<li class="disabled"><a href="#">&laquo;</a></li>
												<li class="active"><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">&raquo;</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-2 col-md-pull-10">
									<div class="sidebar">
										<div class="side">
											<h2>Categories</h2>
											<div class="fancy-collapse-panel">
															<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
																 <div class="panel panel-default">
																		 <div class="panel-heading" role="tab" >
																				 <h4 class="panel-title">
																						 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Dresses
																						 </a>
																				 </h4>
																		 </div>

																 </div>
																 <div class="panel panel-default">
																		 <div class="panel-heading" role="tab" >
																				 <h4 class="panel-title">
																						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shoes
																						 </a>
																				 </h4>
																		 </div>

																 </div>
																 <div class="panel panel-default">
																		 <div class="panel-heading" role="tab" >
																				 <h4 class="panel-title">
																						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Bags
																						 </a>
																				 </h4>
																		 </div>
																		 </div>
																 </div>
																 <div class="panel panel-default">
																		 <div class="panel-heading" role="tab" >
																				 <h4 class="panel-title">
																						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Jewelry
																						 </a>
																				 </h4>
																		 </div>
																 </div>
																 <div class="panel panel-default">
																		 <div class="panel-heading" role="tab" >
																				 <h4 class="panel-title">
																						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Vintage
																						 </a>
																				 </h4>
																		 </div>
																 </div>
																 <div class="panel panel-default">
																		 <div class="panel-heading" role="tab" >
																				 <h4 class="panel-title">
																						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Other
																						 </a>
																				 </h4>
																		 </div>
																 </div>
															</div>
													 </div>
										</div>
								</div>
							</div>
						</div>
					</div>

				</section>

		<!-- Bags -->

					<section id="bags">
						<aside id="colorlib-hero" class="breadcrumbs">
							<div class="flexslider">
								<ul class="slides">
									<li style="background-image: url(images/cover-img-1.jpg);">
										<div class="overlay"></div>
										<div class="container-fluid">
											<div class="row">
												<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
													<div class="slider-text-inner text-center">
														<h1>Bags</h1>
														<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Bags</span></h2>
													</div>
												</div>
											</div>
										</div>
									</li>
									</ul>
								</div>
						</aside>

						<div class="colorlib-shop">
							<div class="container">
								<div class="row">
									<div class="col-md-10 col-md-push-2">
										<div class="row row-pb-lg">
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag1.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<!--<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag2.jpg);">
														<p class="tag"><span class="sale">Sale</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag3.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag4.jpg);">
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag5.jpg);">
														<p class="tag"><span class="sale">Sale</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag6.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag7.jpg);">
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag8.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag9.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag10.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag11.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="product-entry">
													<div class="product-img" style="background-image: url(images/bag12.jpg);">
														<p class="tag"><span class="new">New</span></p>
														<div class="cart">
															<p>
																<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																<span><a href="#"><i class="icon-heart3"></i></a></span>
																<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
															</p>
														</div>
													</div>
													<div class="desc">
														<h3><a href="product-detail.html">Floral Dress</a></h3>
														<p class="price"><span>$300.00</span></p>
													</div>
												</div>
											</div>-->
											<?php
                                   $sql_dres="SELECT * FROM item WHERE ids='3'";
                                   $res_d=mysqli_query($conn,$sql_dres);
                                   while ($rows_d=mysqli_fetch_array($res_d)) {
                                   	echo '
                                   	<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('.$rows_d['paths'].');">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">'.$rows_d['title'].'</a></h3>
											<p class="price"><span>'.$rows_d['price'].'</span></p>
										</div>
									</div>
								</div>

                                   	';
                                   }

								?>
										</div>
										<div class="row">
											<div class="col-md-12">
												<ul class="pagination">
													<li class="disabled"><a href="#">&laquo;</a></li>
													<li class="active"><a href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#">&raquo;</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-md-2 col-md-pull-10">
										<div class="sidebar">
											<div class="side">
												<h2>Categories</h2>
												<div class="fancy-collapse-panel">
																<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
																	 <div class="panel panel-default">
																			 <div class="panel-heading" role="tab" >
																					 <h4 class="panel-title">
																							 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Dresses
																							 </a>
																					 </h4>
																			 </div>

																	 </div>
																	 <div class="panel panel-default">
																			 <div class="panel-heading" role="tab" >
																					 <h4 class="panel-title">
																							 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shoes
																							 </a>
																					 </h4>
																			 </div>

																	 </div>
																	 <div class="panel panel-default">
																			 <div class="panel-heading" role="tab" >
																					 <h4 class="panel-title">
																							 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Bags
																							 </a>
																					 </h4>
																			 </div>
																			 </div>
																	 </div>
																	 <div class="panel panel-default">
																			 <div class="panel-heading" role="tab" >
																					 <h4 class="panel-title">
																							 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Jewelry
																							 </a>
																					 </h4>
																			 </div>
																	 </div>
																	 <div class="panel panel-default">
																			 <div class="panel-heading" role="tab" >
																					 <h4 class="panel-title">
																							 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Vintage
																							 </a>
																					 </h4>
																			 </div>
																	 </div>
																	 <div class="panel panel-default">
																			 <div class="panel-heading" role="tab" >
																					 <h4 class="panel-title">
																							 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Other
																							 </a>
																					 </h4>
																			 </div>
																	 </div>
																</div>
														 </div>
											</div>
																	</div>
																</div>
															</div>
														</form>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>

					</section>

			<!-- Vintage -->

						<section id="vintage">
							<aside id="colorlib-hero" class="breadcrumbs">
								<div class="flexslider">
									<ul class="slides">
										<li style="background-image: url(images/cover-img-1.jpg);">
											<div class="overlay"></div>
											<div class="container-fluid">
												<div class="row">
													<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
														<div class="slider-text-inner text-center">
															<h1>Vintage</h1>
															<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Vintage</span></h2>
														</div>
													</div>
												</div>
											</div>
										</li>
										</ul>
									</div>
							</aside>

							<div class="colorlib-shop">
								<div class="container">
									<div class="row">
										<div class="col-md-10 col-md-push-2">
											<div class="row row-pb-lg">
												<!--<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin1.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin2.jpg);">
															<p class="tag"><span class="sale">Sale</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin3.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin4.jpg);">
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin5.jpg);">
															<p class="tag"><span class="sale">Sale</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin6.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin7.jpg);">
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin8.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin9.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin10.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin11.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-center">
													<div class="product-entry">
														<div class="product-img" style="background-image: url(images/vin12.jpg);">
															<p class="tag"><span class="new">New</span></p>
															<div class="cart">
																<p>
																	<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																	<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																	<span><a href="#"><i class="icon-heart3"></i></a></span>
																	<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																</p>
															</div>
														</div>
														<div class="desc">
															<h3><a href="product-detail.html">Floral Dress</a></h3>
															<p class="price"><span>$300.00</span></p>
														</div>
													</div>
												</div>-->
												<?php
                                   $sql_dres="SELECT * FROM item WHERE ids='5'";
                                   $res_d=mysqli_query($conn,$sql_dres);
                                   while ($rows_d=mysqli_fetch_array($res_d)) {
                                   	echo '
                                   	<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('.$rows_d['paths'].');">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">'.$rows_d['title'].'</a></h3>
											<p class="price"><span>'.$rows_d['price'].'</span></p>
										</div>
									</div>
								</div>

                                   	';
                                   }

								?>
											</div>
											<div class="row">
												<div class="col-md-12">
													<ul class="pagination">
														<li class="disabled"><a href="#">&laquo;</a></li>
														<li class="active"><a href="#">1</a></li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li><a href="#">4</a></li>
														<li><a href="#">&raquo;</a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-md-2 col-md-pull-10">
											<div class="sidebar">
												<div class="side">
													<h2>Categories</h2>
													<div class="fancy-collapse-panel">
																	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
																		 <div class="panel panel-default">
																				 <div class="panel-heading" role="tab" >
																						 <h4 class="panel-title">
																								 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Dresses
																								 </a>
																						 </h4>
																				 </div>

																		 </div>
																		 <div class="panel panel-default">
																				 <div class="panel-heading" role="tab" >
																						 <h4 class="panel-title">
																								 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shoes
																								 </a>
																						 </h4>
																				 </div>

																		 </div>
																		 <div class="panel panel-default">
																				 <div class="panel-heading" role="tab" >
																						 <h4 class="panel-title">
																								 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Bags
																								 </a>
																						 </h4>
																				 </div>
																				 </div>
																		 </div>
																		 <div class="panel panel-default">
																				 <div class="panel-heading" role="tab" >
																						 <h4 class="panel-title">
																								 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Jewelry
																								 </a>
																						 </h4>
																				 </div>
																		 </div>
																		 <div class="panel panel-default">
																				 <div class="panel-heading" role="tab" >
																						 <h4 class="panel-title">
																								 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Vintage
																								 </a>
																						 </h4>
																				 </div>
																		 </div>
																		 <div class="panel panel-default">
																				 <div class="panel-heading" role="tab" >
																						 <h4 class="panel-title">
																								 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Other
																								 </a>
																						 </h4>
																				 </div>
																		 </div>
																	</div>
															 </div>
												</div>
																		</div>
																	</div>

											</div>
										</div>
									</div>
								</div>
							</div>

						</section>

			<!-- Others -->

							<section id="others">
								<aside id="colorlib-hero" class="breadcrumbs">
									<div class="flexslider">
										<ul class="slides">
											<li style="background-image: url(images/cover-img-1.jpg);">
												<div class="overlay"></div>
												<div class="container-fluid">
													<div class="row">
														<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
															<div class="slider-text-inner text-center">
																<h1>Others</h1>
																<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Others</span></h2>
															</div>
														</div>
													</div>
												</div>
											</li>
											</ul>
										</div>
								</aside>

								<div class="colorlib-shop">
									<div class="container">
										<div class="row">
											<div class="col-md-10 col-md-push-2">
												<div class="row row-pb-lg">
													<!--<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other1.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other2.jpg);">
																<p class="tag"><span class="sale">Sale</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other3.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other4.jpg);">
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other5.jpg);">
																<p class="tag"><span class="sale">Sale</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$199.00</span> <span class="sale">$300.00</span> </p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other6.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other7.jpg);">
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/other8.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/item-13.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/item-14.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/item-15.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 text-center">
														<div class="product-entry">
															<div class="product-img" style="background-image: url(images/item-16.jpg);">
																<p class="tag"><span class="new">New</span></p>
																<div class="cart">
																	<p>
																		<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
																		<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
																		<span><a href="#"><i class="icon-heart3"></i></a></span>
																		<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
																	</p>
																</div>
															</div>
															<div class="desc">
																<h3><a href="product-detail.html">Floral Dress</a></h3>
																<p class="price"><span>$300.00</span></p>
															</div>
														</div>
													</div>-->
													<?php
                                   $sql_dres="SELECT * FROM item WHERE ids='6'";
                                   $res_d=mysqli_query($conn,$sql_dres);
                                   while ($rows_d=mysqli_fetch_array($res_d)) {
                                   	echo '
                                   	<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('.$rows_d['paths'].');">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
													<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
													<span><a href="#"><i class="icon-heart3"></i></a></span>
													<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="product-detail.html">'.$rows_d['title'].'</a></h3>
											<p class="price"><span>'.$rows_d['price'].'</span></p>
										</div>
									</div>
								</div>

                                   	';
                                   }

								?>
												</div>
												<div class="row">
													<div class="col-md-12">
														<ul class="pagination">
															<li class="disabled"><a href="#">&laquo;</a></li>
															<li class="active"><a href="#">1</a></li>
															<li><a href="#">2</a></li>
															<li><a href="#">3</a></li>
															<li><a href="#">4</a></li>
															<li><a href="#">&raquo;</a></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="col-md-2 col-md-pull-10">
												<div class="sidebar">
													<div class="side">
														<h2>Categories</h2>
														<div class="fancy-collapse-panel">
																		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
																			 <div class="panel panel-default">
																					 <div class="panel-heading" role="tab" >
																							 <h4 class="panel-title">
																									 <a data-toggle="collapse" data-parent="#accordion" href="#dress" aria-expanded="true" aria-controls="collapseOne">Dresses
																									 </a>
																							 </h4>
																					 </div>

																			 </div>
																			 <div class="panel panel-default">
																					 <div class="panel-heading" role="tab" >
																							 <h4 class="panel-title">
																									 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Shoes
																									 </a>
																							 </h4>
																					 </div>

																			 </div>
																			 <div class="panel panel-default">
																					 <div class="panel-heading" role="tab" >
																							 <h4 class="panel-title">
																									 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Bags
																									 </a>
																							 </h4>
																					 </div>
																					 </div>
																			 </div>
																			 <div class="panel panel-default">
																					 <div class="panel-heading" role="tab" >
																							 <h4 class="panel-title">
																									 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Jewelry
																									 </a>
																							 </h4>
																					 </div>
																			 </div>
																			 <div class="panel panel-default">
																					 <div class="panel-heading" role="tab" >
																							 <h4 class="panel-title">
																									 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Vintage
																									 </a>
																							 </h4>
																					 </div>
																			 </div>
																			 <div class="panel panel-default">
																					 <div class="panel-heading" role="tab" >
																							 <h4 class="panel-title">
																									 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Other
																									 </a>
																							 </h4>
																					 </div>
																			 </div>
																		</div>
																 </div>
													</div>
											</div>
										</div>
									</div>
								</div>

							</section>

<!-- aboutus -->
	<section id="aboutus">

		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>About Us</h1>
				   					<h2 class="bread"><span><a href="#home">Home</a></span> <span>About Us</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">

						<div class="col-three-forth">
							<h2>About us</h2>
							<div class="row">
								<div class="col-md-12">

									<p>In Arab societies and especially in Saudi Arabia it is difficult for women to go to the place of auction for sale or purchase since these places often belong to men and the commodity in them are either heavy equipment as cars and furniture. </p>

									<p>Women do not have enough share in the auction and this aspect is very weak in our society.</p>


									<p>Our Vendue website is an Online Auction System that aims to organize and facilitate the auction process on women and provide a web page of the group interested in selling their commodity and those who wish to buy used commodities at a good price.</p>


									<p>We hope that our site will be of great benefit to women in the auction process and our website be comfort & easy to use.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="about-flex">

						<div class="col-three-forth">
							<h2>Polices</h2>
							<div class="row">
								<div class="col-md-12">

									<ul>
										<li>Shipping is available for all Hail neighborhoods and villages</li>
										<li>Delivery is free at the time of purchase for SAR300</li>
										<li>Pay on Receipt</li>
										<li>Payment service is available upon delivery in Hail city and added SAR10 commission</li>
										<li>Replacement and retrieval:</li>
										<p>Return and replacment includes all products in case of customer dissatisfaction or damage during delivary of the product, design defect or delivary error with the company incarring the cost of transportation</p>
									</ul>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

<!-- singup-->
<?php

if (isset($_SESSION['email'])) {
	# code...
}else{
echo '<section id="singup">

	<aside id="colorlib-hero" class="breadcrumbs">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(images/cover-img-1.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								<div class="slider-text-inner text-center">
									<h1>Sign Up</h1>
									<h2 class="bread"><span><a href="#home">Home</a></span> <span>Sign Up</span></h2>
								</div>
							</div>
						</div>
					</div>
				</li>
				</ul>
			</div>
	</aside>

	<div >
		<div class="container">
			<div class="row">

				<div class="col-md-10 col-md-offset-1">
					<div class="contact-wrap">
						<h3>Sign Up</h3>
						<form id="form1"  method="POST">
							<div class="row form-group">
								<div class="col-md-6 padding-bottom">
									<label >First Name</label>
									<input type="text" name="fname" class="form-control" placeholder="Your firstname">
								</div>
								<div class="col-md-6">
									<label >Last Name</label>
									<input type="text" name="lname" class="form-control" placeholder="Your lastname">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label >Email</label>
									<input type="email" name="email" class="form-control" placeholder="Your email address">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label >Phone Number</label>
									<input type="text"  name="phone" class="form-control" placeholder="Your phone number">
								</div>
							</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label >Password</label>
								<input type="password" name="pass1" id="pass1" class="form-control" placeholder="Enter password">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label >Repeat Password</label>
								<input type="password" name="pass2" class="form-control" placeholder="Repeat password">
							</div>
						</div>

							<div class="form-group text-center">
								<input type="submit" name="btn1" value="Sing Up" class="btn btn-primary">
								<input type="reset" name="btn2" value="Clear" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<!-- singin-->

<section id="singin">

	<aside id="colorlib-hero" class="breadcrumbs">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(images/cover-img-1.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								<div class="slider-text-inner text-center">
									<h1>Sign In</h1>
									<h2 class="bread"><span><a href="#home">Home</a></span> <span>Sign In</span></h2>
								</div>
							</div>
						</div>
					</div>
				</li>
				</ul>
			</div>
	</aside>

	<div id="colorlib-contact">
		<div class="container">
			<div class="row">

				<div class="col-md-10 col-md-offset-1">
					<div class="contact-wrap">
						<h3>Sign In</h3>
						<form id="form2" method="POST">


							<div class="row form-group">
								<div class="col-md-12">
									<label >Email</label>
									<input type="email" name="email" id="email" class="form-control" placeholder="Your email address">
								</div>
							</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Password</label>
								<input type="password" name="pass" id="password" class="form-control" placeholder="Enter password">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="checkbox" name="box" value="remmeber" id="checkbox"  >
									<label >  Remmeber me</label>
							</div>
						</div>

							<div class="form-group text-center">
						<!--	<a	href="#test" input type="submit" value="Sing In" class="btn btn-primary" > login</a>-->
							<input type="submit" name="sing" class="btn btn-primary" value="Login">
								<input type="reset" value="Clear" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>';

}
?>
<!-- contant-->

<section id="contantus">

	<aside id="colorlib-hero" class="breadcrumbs">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(images/cover-img-1.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								<div class="slider-text-inner text-center">
									<h1>Contact</h1>
									<h2 class="bread"><span><a href="#home">Home</a></span> <span>Contact</span></h2>
								</div>
							</div>
						</div>
					</div>
				</li>
				</ul>
			</div>
	</aside>

	<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h3>Contact Information</h3>
					<div class="row contact-info-wrap">
						<div class="col-md-3">
							<p><span><i class="icon-location"></i></span> 198 West 21th Street, <br> Suite 721 Hail KSA 10016</p>
						</div>
						<div class="col-md-3">
							<p><span><i class="icon-phone3"></i></span> <a href="tel://966560396778">+ 966 560 396778</a></p>
						</div>
						<div class="col-md-3">
							<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@vendue.com</a></p>
						</div>
						<div class="col-md-3">
							<p><span><i class="icon-globe"></i></span> <a href="#home">vendue.com</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1">
					<div class="contact-wrap">
						<h3>Get In Touch</h3>
						<form action="#">
							<div class="row form-group">
								<div class="col-md-6 padding-bottom">
									<label for="fname">First Name</label>
									<input type="text" id="fname" class="form-control" placeholder="Your firstname">
								</div>
								<div class="col-md-6">
									<label for="lname">Last Name</label>
									<input type="text" id="lname" class="form-control" placeholder="Your lastname">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" class="form-control" placeholder="Your email address">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Subject</label>
									<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Message</label>
									<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Send Message" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--PRODUCTDETAIL-->

<section id="product1">
<aside id="colorlib-hero" class="breadcrumbs">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url(images/cover-img-1.jpg);">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
							<div class="slider-text-inner text-center">
								<h1>Product Detail</h1>
								<h2 class="bread"><span><a href="#home">Home</a></span> <span>Product Detail</span></h2>
							</div>
						</div>
					</div>
				</div>
			</li>
			</ul>
		</div>
</aside>

<div class="colorlib-shop">
	<div class="container">
		<div class="row row-pb-lg">
			<div class="col-md-10 col-md-offset-1">
				<div class="product-detail-wrap">
					<div class="row">
						<div class="col-md-5">
							<div class="product-entry">
								<div class="product-img" style="background-image: url(images/item-7.jpg);">
									<p class="tag"><span class="sale">Sale</span></p>
								</div>
								<div class="thumb-nail">
									<a href="#" class="thumb-img" style="background-image: url(images/item-11.jpg);"></a>
									<a href="#" class="thumb-img" style="background-image: url(images/item-12.jpg);"></a>
									<a href="#" class="thumb-img" style="background-image: url(images/item-16.jpg);"></a>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="desc">
								<h3>Gray t-shirt</h3>
								<p class="price">
									<span>$68.00</span>
									<span class="rate text-right">
										<i class="icon-star-full"></i>
										<i class="icon-star-full"></i>
										<i class="icon-star-full"></i>
										<i class="icon-star-full"></i>
										<i class="icon-star-half"></i>
										(74 Rating)
									</span>
								</p>
								<br/>
								<br/>
								<h4>Auction </h4>
								<br/>
								<br/>
								<h4>Communication :</h4>

							<p> On Whatsup 050311234</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-12 tabulation">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#description">Description</a></li>
							<li><a data-toggle="tab" href="#manufacturer">Conditions</a></li>
							<li><a data-toggle="tab" href="#review">comments</a></li>
						</ul>
						<div class="tab-content">
							<div id="description" class="tab-pane fade in active">
								<p>Use for one time</p>
								<p>Flawless</p>
								<p>With accessories</p>
								 <p>Size is xl </p>

								 </div>
								 <div id="manufacturer" class="tab-pane fade">
									<p>Shipping will be with FedEx if you are outside Riyadh area</p>
							 </div>
							 <div id="review" class="tab-pane fade">
								<div class="row">
									<div class="col-md-7">
										<h3>23 Reviews</h3>
										<div class="review">
											<div class="user-img" style="background-image: url(images/person1.jpg)"></div>
											<div class="desc">
												<h4>
													<span class="text-left">rema mohamed</span>
													<span class="text-right">12 March 2018</span>
												</h4>
												<p class="star">
													<span>
														<i class="icon-star-full"></i>
														<i class="icon-star-full"></i>
														<i class="icon-star-full"></i>
														<i class="icon-star-half"></i>
														<i class="icon-star-empty"></i>
													</span>
													<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
												</p>
												<p>good shirt but the color is the same in pic</p>
											</div>
										</div>
										<div class="review">
											<div class="user-img" style="background-image: url(images/person2.jpg)"></div>
											<div class="desc">
												<h4>
													<span class="text-left">amal khalid</span>
													<span class="text-right">14 March 2018</span>
												</h4>
												<p class="star">
													<span>
														<i class="icon-star-full"></i>
														<i class="icon-star-full"></i>
														<i class="icon-star-full"></i>
														<i class="icon-star-half"></i>
														<i class="icon-star-empty"></i>
													</span>
													<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
												</p>
												<p>the longe of t-shirt is what?</p>
											</div>
										</div>
										<div class="review">
											<div class="user-img" style="background-image: url(images/person3.jpg)"></div>
											<div class="desc">
												<h4>
													<span class="text-left">mona ahmad</span>
													<span class="text-right">16 March 2018</span>
												</h4>
												<p class="star">
													<span>
														<i class="icon-star-full"></i>
														<i class="icon-star-full"></i>
														<i class="icon-star-full"></i>
														<i class="icon-star-half"></i>
														<i class="icon-star-empty"></i>
													</span>
													<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
												</p>
												<p>I want it with price 100$ </p>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-md-push-1">
										<div class="rating-wrap">
											<h3>Give a Review</h3>
											<p class="star">
												<span>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													(98%)
												</span>
												<span>20 Reviews</span>
											</p>
											<p class="star">
												<span>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-empty"></i>
													(85%)
												</span>
												<span>10 Reviews</span>
											</p>
											<p class="star">
												<span>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
													(98%)
												</span>
												<span>5 Reviews</span>
											</p>
											<p class="star">
												<span>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
													(98%)
												</span>
												<span>0 Reviews</span>
											</p>
											<p class="star">
												<span>
													<i class="icon-star-full"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
													(98%)
												</span>
												<span>0 Reviews</span>
											</p>
										</div>
									</div>
								</div>
							 </div>
							 </div>
						 </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
				<h2><span>Similar Products</span></h2>
				<p>find another Items with same type</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(images/item-5.jpg);">
						<p class="tag"><span class="new">New</span></p>
						<div class="cart">
							<p>
								<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
								<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
								<span><a href="#"><i class="icon-heart3"></i></a></span>
								<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="shop.html">Floral Dress</a></h3>
						<p class="price"><span>$300.00</span></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(images/item-6.jpg);">
						<p class="tag"><span class="new">New</span></p>
						<div class="cart">
							<p>
								<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
								<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
								<span><a href="#"><i class="icon-heart3"></i></a></span>
								<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="shop.html">Floral Dress</a></h3>
						<p class="price"><span>$300.00</span></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(images/item-7.jpg);">
						<p class="tag"><span class="new">New</span></p>
						<div class="cart">
							<p>
								<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
								<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
								<span><a href="#"><i class="icon-heart3"></i></a></span>
								<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="shop.html">Floral Dress</a></h3>
						<p class="price"><span>$300.00</span></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(images/item-8.jpg);">
						<p class="tag"><span class="new">New</span></p>
						<div class="cart">
							<p>
								<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
								<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
								<span><a href="#"><i class="icon-heart3"></i></a></span>
								<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="shop.html">Floral Dress</a></h3>
						<p class="price"><span>$300.00</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!--creat an Advertising-->
<section id="ads" >
	<aside id="colorlib-hero" class="breadcrumbs">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(images/cover-img-1.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								<div class="slider-text-inner text-center">
									<h1>Create an Advertising</h1>
									<h2 class="bread"><span><a class="shop2" href="#home">Home</a></span> <span>Create an Advertising</span></h2>
							</div>
						</div>
					</div>
				</li>
				</ul>
			</div>
	</aside>
<section >
<div class="container">
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
			<div class="contact-wrap">
				<?php
                 if (isset($_FILES['item'])) {
                 	print_r($_FILES['item']);
                 	$fname=$_FILES['item']['name'];
                 	$ftype=$_FILES['item']['type'];
                 	$ftem=$_FILES['item']['tmp_name'];
                 	$size=$_FILES['item']['size'];

                 	$typ=['jpg','png'];

                 	$exp=explode('.', $fname);
                 	$ends=end($exp);
                 	$ends=strtolower($ends);
                 	echo $ends;
                 	$name=strip_tags($_POST['name']);
                 	$type=strip_tags($_POST['Type']);
                 	$price=strip_tags($_POST['price']);
                 	$fixed=$_POST['fixed'];
                 	$Describtion=strip_tags($_POST['Describtion']);
                 	$Communication=strip_tags($_POST['Communication']);
                 	$conditions=strip_tags($_POST['conditions']);


                 	if (in_array($ends, $typ)) {
                 		$path="images/item/$fname";
                 		//move_uploaded_file($frem, $path)
                 		if (move_uploaded_file($ftem, $path)) {
                 			$sql_insert_item="INSERT INTO item (title,ids,desr,paths,status,price,Communication,conditions)VALUES('$name','$type','$Describtion','$path','ts','$price','$Communication','$conditions')";
                 			if (mysqli_query($conn,$sql_insert_item)) {
                 				# code...
                 				//header("location:index.php");
                 				//header('Refresh:3 ');
                 				//header("refresh: 3; url = https://www.geeksforgeeks.org/"); 
                 			
                 			}
                 		}
                 	}

                 }


				?>
				<form method="POST" enctype="multipart/form-data">

<label for="subject">Upload image : </label>
<input  type="file" name="item">
</br>
<label for="subject">Name : </label>
<input  class="form-control" type="text" name="name"  placeholder="Write the name..">
</br>
<label class="font">Type : </label>
</br>
<select name="Type">
<!--<option value="Dresses">Dresses</option>
<option value="Shoes">Shoes</option>
<option value="Bags" >Bags</option>
<option value="Jewelry">Jewelry</option>
<option value="Vintage" >Vintage</option>
<option value="Others">Others</option>-->
<?php
$sql_opy="SELECT * FROM category ";
$resuo=mysqli_query($conn,$sql_opy);
while ($rows=mysqli_fetch_array($resuo)) {
	# code...
	echo '<option value="'.$rows['cid'].'" >'.$rows['came'].'</option>';
}
?>
</select>
</br>
</br>
<label for="subject">Price : </label>
</br>
<input  class="form-control" type="text" name="price"  placeholder="Write the price..">
</br>
<label for="subject">Price Type : </label>
<!--
<input  class="radio"type="radio" name="fixed" value="fixed">  Fixed
<input class="radio"type="radio" name="fixed" value="auction">  Auction
</br> 
<label for="subject">Describtion: </label>
 </br>
<textarea class="form-control" name="Describtion" rows="8" cols="80" placeholder=" Write details"></textarea>
</br>
<label for="subject">Communication : </label>
</br>
<textarea  class="form-control" name="Communication" rows="8" cols="80" placeholder="Write the way of Communication"> </textarea>
</br>
<label for="subject">Conditions : </label>
</br>
<textarea class="form-control"  name="conditions" rows="8" cols="80" placeholder="Write your conditions"> </textarea>
</br> -->
<div class="form-group text-center">
<input  class="btn btn-primary" type="submit" name="submit" value="submit">
<input class="btn btn-primary" type="reset" name="reset" value="reset">
</div>
</form>
</div>
</div>
</div>
</div>
</section>
</section>


		<div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-6 text-center">
							<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
						</div>
						<div class="col-md-6">
							<form class="form-inline qbstp-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Enter your email"/>
											<button type="submit" class="btn btn-primary">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



	<!-- footer -->

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About Vendue</h4>
						<p>Our Vendue website is an Online Auction System that aims to organize the auction process and provide a web page of the group interested in selling their commodity and those who wish to buy used commodities at a good price.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#aboutus">About us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">FQAs</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@vendue.com</a></li>
							<li><a href="#">vendue.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>

							<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="#home" target="_blank">Vendue</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							<span class="block">Team.</span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
		<script src="js/javascript.js"></script>

	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>
	<!-- javascript -->
	<!-- <script src="js/javascript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

	</body>
</html>
