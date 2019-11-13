<?php
session_start();
require "dboop/db.php";
?>
<!DOCTYPE html>
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
									<li><a  id="adsid"  href="#ads">creat an Advertising</a></li>

                                             <li><a  id="adsid"  href="logout.php">Log Out</a></li>
									';
								}else{
									echo '<li><a  class="shop2" href="#singup">singup</a></li>
								<li><a  class="shop2" href="#singin">singin</a></li>';
								}


								?>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>







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
</br>
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
</body>
</html>