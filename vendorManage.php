<?php
session_start();
include"connection.php";
if(empty($_SESSION['restaurantId']) || $_SESSION['restaurantId'] == ''){
    header("Location:./vendorLogIn.php");
    
}else{
	$id = $_SESSION['restaurantId'];
}

$vq=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
 $vr=mysqli_fetch_array($vq);
 $vrid=$vr['fldvendor_id'];

if(isset($_POST['upd_account']))
				{
					
					$fn = $_POST['fn'];
	$emm = $_POST['emm'];
	$add = $_POST['add'];
	$mob = $_POST['mob'];
	$pwsd = $_POST['pwsd'];
	
					if(mysqli_query($con,"update tblvendor set fld_name='$fn',fld_email='$emm',fld_address='$add',fld_mob='$mob',fld_password='$pwsd' where fld_email='$id'"))
				   {
						 header("location:infoUpdate.php");
					}
			  }

if(isset($_POST['add']))
{   if(isset($_SESSION['restaurantId']))
	{
	$food_name = $_POST['food_name'];
	$cost = $_POST['cost'];
	$cuisines = $_POST['cuisines'];
	$type = $_POST['type'];
    $img_name=$_FILES['food_pic']['name'];
    if(!empty($_POST['chk'])) 
	{
	$paymentmode=implode(",",$_POST['chk']);
	if(mysqli_query($con,"insert into tbfood(fldvendor_id,foodname,cost,cuisines,type,paymentmode,fldimage) values
	
	('$vrid','$food_name','$cost','$cuisines', '$type', '$paymentmode','$img_name')"))
	{
		if (!file_exists("image/restaurant/$id/foodimages/")) {
    mkdir("image/restaurant/$id/foodimages/");
		
}
		move_uploaded_file($_FILES['food_pic']['tmp_name'],"image/restaurant/$id/foodimages/".$_FILES['food_pic']['name']);
	}
	else{
		echo "failed".mysqli_error($con);
	}
  }
  else 
  {
	  $paymessage="please select a payment mode";
  }
	}
	else
	{
		header("location:vendor_login.php");
	}
}

  if(isset($_POST['upd_logo']))
			  {
				  if(isset($_SESSION['restaurantId']))
				  {
				  $log_img=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
                  $log_img_row=mysqli_fetch_array($log_img);
				  $old_logo=$log_img_row['fld_logo'];
				  $new_img_name=$_FILES['logo_pic']['name'];
				  
				  if(mysqli_query($con,"update tblvendor set fld_logo='$new_img_name' where fld_email='$id'"))
				  {
					  unlink("image/restaurant/$id/$old_logo");
					  move_uploaded_file($_FILES['logo_pic']['tmp_name'],"image/restaurant/$id/".$_FILES['logo_pic']['name']);
				      
					  header("location:update_food.php");
					  
				  }
			  }
			  else
			  {
				  header("location:vendor_login.php?msg=Please Login To continue");
			  }
			  }
			  
?>




<html>
<head>
	<title>
	FoodShala-ManageProducts
	
	</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="./public/css/footer.css">
	<link rel="stylesheet" type="text/css" href="public/css/nav.css">
	 <style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}
	 </style>
	</head>
	<body>
		<header>
			<div class="row w-100 " style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7));">
				<div class="col-3 " style="color:#BF55EC;font-family:cursive;">
				<h1 class="p-2 pl-4"><b>
					FoodShala
					</b></h1>
				</div>
				<div class="col-6 offset-3">
		<nav>
            <ul class="main-nav">
				<li><a href="home.php">Browse Restaurants </a> </li>
				<li ><a href="./logout.php">Log Out</a></li>
				
			</ul>
        </nav>
					</div>
				</div>
		
		</header>
	<ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#BF55EC;;border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="home" aria-selected="true">Manage Products</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="profile" aria-selected="false">Add Products</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" id="accountsettings-tab" data-toggle="tab" href="#accountsettings" role="tab" aria-controls="accountsettings" aria-selected="false">Account Settings</a>
          </li>
		  
		  <li class="nav-item">
              <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">Update Logo</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Order Status</a>
          </li>
		  
       </ul>
		
		
		<!--tab 1 starts-->   
	   <div class="tab-content" id="myTabContent">
	   
            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
                 <div class="container"> 
			 <table border="1" bordercolor="#F0F0F0" cellpadding="20px">
			 <th>food Image</th>
			 <th>food name</th>
			 <th>food Price</th>
			 <th>food cuisines </th>
			 <th>Payment Mode  </th>
<!--			 <th>Delete Item   </th>-->
			 <th>Update item Details </th>
			   <?php
					  if($query=mysqli_query($con,"select tblvendor.fldvendor_id,tblvendor.fld_email,tbfood.food_id,tbfood.foodname,tbfood.cost,tbfood.paymentmode,tbfood.cuisines,tbfood.fldimage,tblvendor.fld_name from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tblvendor.fld_email='$id'"))
					  {
						  if(mysqli_num_rows($query))
						  {
						 while($row=mysqli_fetch_array($query))
						 {
							 
							 ?>
			     <tr>
				 				 
				<td><img src="<?php echo 'image/restaurant/'.$id.'/foodimages/'.$row['fldimage'];?>" height="100px" width="150px"></td>
				<td style="width:150px;"><?php  echo $row['foodname']."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row['cost']."<br>";?></td>
				<td  align="center" style="width:150px;"><?php  echo $row['cuisines']."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row['paymentmode']."<br>";?></td>
				
<!--
				<td align="center" style="width:150px;">
				
				<a href="vendor_delete_food.php?food_id=<?php echo $row['food_id'];?>"><button type="button" class="btn btn-warning">Delete </button></a>
				
				</td>
-->
				<td align="center" style="width:150px;">
				
				<a href="update.php?food_id=<?php echo $row['food_id'];?>"><button type="button" class="btn btn-danger">Update </button></a>
				
				</td>
				</tr>
				
				<?php 
					
                    $foodname="";
                    $cuisines="";
                    $cost="";					
						 }
					  }
					  else 
						  
						  {
							   $msg="please add some Items";
						  }
					  }
					  else 
					  {
						  echo "failed";
					  }
					  
					  ?>
			 </table>
			 </div>    	 
	        </div>
<!--tab 1 ends-->	   
			
		
		
		<!--tab 2 starts-->
            <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="profile-tab">
			         <!--add Product-->
                        <form action="" method="post" enctype="multipart/form-data">
                                     <div class="form-group"><!--food_name-->
                                     <label for="food_name">Food Name:</label>
                                            <input type="text" class="form-control" id="food_name" value="<?php if(isset($food_name)) { echo $food_name;}?>" placeholder="Enter Food Name" name="food_name" required>
                                     </div>
									 
									 
                                     <div class="form-group"><!--cost-->
                                            <label for="cost">Cost :</label>
                                            <input type="number" class="form-control" id="cost"  value="<?php if(isset($cost)) { echo $cost;}?>" placeholder="10000" name="cost" required>
                                     </div>
									 
									 
	                                 <div class="form-group"><!--cuisines-->
                                            <label for="cuisines">Cuisines :</label>
                                            <input type="text" class="form-control" id="cuisines" value="<?php if(isset($cuisines)) { echo $cuisines;}?>" placeholder="Enter Cuisines" name="cuisines" required>
                                    </div>
							<div class="form-group"><!--type-->
                                            <label for="type">Veg/Non-Veg : </label><br>
                                            Veg<input type="radio" id="type" value="Veg" name="type" required class="m-2">
								  Non-Veg<input type="radio" value="Non-Veg" id="type" name="type" class="m-3" required>
                                    </div>
							        
							        <div class="form-group"><!--payment_mode-->
                                         <input type="checkbox" name="chk[]" value="COD"/>Cash On Delivery
			                             <input type="checkbox" name="chk[]" value="Online Payment"/>Online Payment
								         <br>
								        <span style="color:red;"><?php if(isset($paymessage)){ echo $paymessage;}?></span>
			      			        </div>
							   
	                                <div class="form-group">
                                         <input type="file" accept="image/*" name="food_pic" required/>Food Snaps 
                                    </div>
   
                                    <button type="submit" name="add" class="btn btn-primary">ADD Item</button>
									<br>
									<span style="color:red;"><?php if (isset($msg)){ echo $msg;}?></span>
                               </form>
				   
			</div>
			<!--tab 2 ends-->
			
<!--		accoun settings-->
		
		<div class="tab-pane fade" id="accountsettings" role="tabpanel" aria-labelledby="accountsettings-tab">
			    <form method="post" enctype="multipart/form-data">
				<?php
			    $upd_info=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
				$upd_info_row=mysqlI_fetch_array($upd_info);
				 $nm=$upd_info_row['fld_name'];
				 $emm=$upd_info_row['fld_email'];
				 $log=$upd_info_row['fld_logo'];
				$ad=$upd_info_row['fld_address'];
				$mb=$upd_info_row['fld_mob'];
				$psd=$upd_info_row['fld_password'];
				
				?>
				
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="username" value="<?php if(isset($nm)){ echo $nm;}?>" class="form-control" name="fn" />
                    </div>
					<div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" id="email" value="<?php if(isset($emm)){ echo $emm;}?>" class="form-control" name="emm" readonly="readonly"/>
                    </div>
					<div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" id="address" value="<?php if(isset($ad)){ echo $ad;}?>" class="form-control" name="add" required/>
                    </div>
					<div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" id="mobile" pattern="[6-9]{1}[0-9]{9}" value="<?php if(isset($mb)){ echo $mb;}?>" class="form-control" name="mob" required/>
                    </div>
					
                   <div class="form-group">
                      <label for="pwd">Password:</label>
                     <input type="password" name="pwsd" class="form-control" value="<?php if(isset($psd)){ echo $psd;}?>" id="pwd" required/>
                   </div>
				   
				   
 
                  <button type="submit" name="upd_account" style="background:#ED2553; border:1px solid #ED2553;" class="btn btn-primary">Update</button>
                  
			 </form>
			</div>
<!--		   tab 4 starts-->
		   
		   <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                <div class="container">
				    <form class="form" method="post" enctype="multipart/form-data">
				       <input type="file" name="logo_pic" accept="image/*" required/>
					   <button type="submit" name="upd_logo" class="btn btn-outline-primary">Update Logo</button>
			        </form>
				</div>
			</div>
<!--		   tab 5-->
		   			 <div class="tab-pane fade " id="status" role="tabpanel" aria-labelledby="status-tab">
	            <table class="table">
				<tbody>
				<th>Order Id</th>
				<th>Customer Email</th>
				<th>Food Id</th>
<!--
				<th>Order Status</th>
				<th>Update Status</th>
-->
				<?php
				$orderquery=mysqli_query($con,"select * from tblorder where fldvendor_id='$vrid'");
				if(mysqli_num_rows($orderquery))
				{
					while($orderrow=mysqli_fetch_array($orderquery))
					{
//						$stat=$orderrow['fldstatus'];
						?>
						<tr>
						<td><?php echo $orderrow['fld_order_id']; ?></td>
						<td><?php echo $orderrow['fld_email_id']; ?></td>
						<td><?php echo $orderrow['fld_food_id']; ?></td>
						
<!--
						<?php
			   if($stat=="cancelled" || $stat=="Out Of Stock")
			   {
			   ?>
			   <td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $orderrow['fldstatus']; ?></span></td>
			   <?php
			   }
			   else
				   
			   {
			   ?>
			   <td><span style="color:green;"><?php echo $orderrow['fldstatus']; ?></span></td>
			   <?php
			   }
			   ?>
-->
<!--
						<form method="post">
						<td><a href="changestatus.php?order_id=<?php echo $orderrow['fld_order_id']; ?>"><button type="button" name="changestatus">Update Status</button></a></td>
						</form>
-->
						<tr>
						<?php
					}
				}
				?>
				</tbody>
				</table>
			 </div>
	</body>


</html>