<?php

include "config.php";
 include "connection.php";
//  echo $_SESSION["login_button"];
$query=mysqli_query($con,"select  tblvendor.fld_name,tblvendor.fldvendor_id,tblvendor.fld_email,
tblvendor.fld_mob,tblvendor.fld_address,tblvendor.fld_logo from tblvendor");
					if($query){
						while($row=mysqli_fetch_array($query))
{
	$arr[]=$row;
	
							
}

						
					}



?>

<html>
<head>
  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <!--bootstrap files-->
	 <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./public/css/nav.css">
<!--     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">


        <script src="./public/javascript/my-script.js"></script>
	<script src="./jquery.waypoints.min.js"></script>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="public/css/nav.css">
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="./public/css/footer.css">

    <title>
        FoodShala</title>
	
<!--
	<style>

ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}

</style>
-->
<style>
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>
	
    <body>
	
   <header>
	   	<?php
	   if(!empty($_SESSION['ordermsg']) || $_SESSION['ordermsg'] != ''){
			?>
	

		<div class="alert alert-success" role="alert">
    <?php  echo "{$_SESSION['ordermsg']}"; ?>
</div>
	
 <?php 
	  $_SESSION['ordermsg']=''; 
	   } ?>
			<div class="row w-100 " style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7));">
				<div class="col-3 " style="color:#BF55EC;font-family:cursive;">
				<h1 class="p-2 pl-4"><b>
					<a href="index.php" style="text-decoration:none;color:#BF55EC;">
					FoodShala
						</a>
					</b></h1>
				</div>
				<div class="col-6 offset-3">
		<nav>
            <ul class="main-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="home.php">Browse Restaurants </a> </li>
<!--				<?php echo "jjjs{$_SESSION['loggedIn']}"; ?>-->
				<?php if(empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == ''){ 
				
				echo "<li ><a href='login.php'>Sign In </a> </li>";
				 }else{
				echo "<li ><a href='logout.php'><img src=".$_SESSION['user_image']." alt='Avatar' class='avatar'>Log Out</a> </li>";
				} ?>
				
			</ul>
        </nav>
					</div>
				</div>
		
		</header>
		
		
		
        <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner ">
    <div class="carousel-item active">
		<div class="row">
			<div class="col-6 "><img src="./public/images/7.jpg" alt=""></div>
			<div class="col-6 "><img src="./public/images/8.jpg" alt=""></div>
      <div class="carousel-caption">
        <h3>Hotel Radison</h3>
        <p>Awesome Food</p>
      </div>
			</div>
    </div>
    <div class="carousel-item">
      <div class="row">
			<div class="col-6 "><img src="./public/images/4.jpg" alt=""></div>
			<div class="col-6 "><img src="./public/images/3.jpg" ></div>
      <div class="carousel-caption">
        <h3>Hotel Picaso</h3>
        <p>Great Food</p>
      </div>
		</div>
    </div>
    <div class="carousel-item">
  <div class="row">
			<div class="col-6 "><img src="./public/images/1.jpg" alt=""></div>
			<div class="col-6 "><img src="./public/images/2.jpg" alt=""></div>
      <div class="carousel-caption">
        <h3>Hotel Satyam</h3>
        <p>We love great food!</p>
      </div>   
    </div>
	  </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
		<section class="restaurant">
		<div class="sectionHeading m-3">
			<h3 style="color: #BF55EC;font-family: cursive;">
			Restaurants
				</h3>
			</div>
			<div class="row w-100">
				<?php
				foreach($arr as $row)	
{ ?>
				<div class="col-4">
					<div class="restaurantImage text-center">
					<a href="restaurant.php?restaurantid=<?php echo $row['fldvendor_id'];?>">
					<img src="<?php echo "./image/restaurant/{$row['fld_email']}/{$row['fld_logo']} ";?>" class="w-100">
						
						
					</a>
					</div>
					<div class="restaurantname text-center  pt-2">
						<b>
						
						<a href="restaurant.php?restaurantid=<?php echo $row['fldvendor_id'];?>">
				<?php echo $row['fld_name'];
					?>
						</a>
						</b>
					</div>
					<div class="restaurantaddress text-center mb-4 mt-1">
						
						
				<?php echo $row['fld_address'];
					?>
						
					</div>
				</div>

<?php
				} ?>
			
				
			</div>
		</section>
	


<?php
				include("footer.php");
				?>