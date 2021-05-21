<?php
session_start();
include"connection.php";
$restaurantid = $_GET['restaurantid'];
$vq=mysqli_query($con,"select * from tblvendor where fldvendor_id='$restaurantid'");
 $vr=mysqli_fetch_array($vq);
 $vrname=$vr['fld_name'];

$sql =mysqli_query($con,"select * from tbfood where fldvendor_id='$restaurantid'");
if($sql){
						while($row=mysqli_fetch_array($sql))
{
	$arr[]=$row;
	
							
}

						
					}
?>
<html>
<head>
	<title>
	FoodShala-<?php echo "{$vrname}"; ?>
	</title>
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./public/css/footer.css">
	<link rel="stylesheet" type="text/css" href="public/css/nav.css">
	
	</head>
	<body>
		<header>
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
				<?php if(empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == ''){ 
				
				echo "<li ><a href='login.php'>Sign In </a> </li>";
				 }else{
				echo "<li ><a href='logout.php'>Log Out</a> </li>";
				} ?>
				
			</ul>
        </nav>
					</div>
				</div>
		
		</header>
	
		<div class="row pb-4 pl-4 w-100 " style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7));color:white;">
		
		<div class="col-2">
		<img src="image/restaurant/<?php echo"{$vr['fld_email']}/{$vr['fld_logo']}"; ?>" class="w-100">
		</div>
			<div class="col-7 ml-4 align-self-center">
			<h1>
				<b>
		<?php echo "{$vrname}"; ?>
				</b>
				</h1>
			<h5>
			<?php echo "{$vr['fld_address']}";?><br>
			<?php echo "{$vr['fld_mob']}"; ?><br>
				<?php echo "{$vr['fld_email']}";?>
			</h5>
		</div>
		
		</div>
		<div class="row mt-3 mb-3 w-100">
		<?php
			if(!empty($arr)){
				foreach($arr as $row)	
{ ?>
			<div class="col-4 p-3">
			<img src="image/restaurant/<?php echo"{$vr['fld_email']}/foodimages/{$row['fldimage']}";?>" class="w-100 p-3" style="height:250px;">
				<div class="row pl-3 ">
				<div class="details col-6">
				<h4>
				<?php echo "{$row['foodname']}";?>
				</h4>
				
				Cuisines: <?php echo " {$row['cuisines']}";?><br>
				Veg/Non-Veg : <?php echo " {$row['type']}";?><br>
				Price: <?php echo " {$row['cost']}";?>
				</div>
				<div class="col-6 pr-4">
					<div class="btn btn-success float-right">
						<a href="placeOrder.php?foodId=<?php echo"{$row['food_id']}&vendorId={$restaurantid}";?>" style="text-decoration:none;color:white;">Place Order</a>
					</div>

				</div>
				</div>
			</div>
			<?php }} ?>
		
		</div>
		
		<?php include"footer.php"; ?>
		
	
	</body>

</html>