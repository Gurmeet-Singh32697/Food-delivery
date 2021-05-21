<?php
include('connection.php');
if(isset($_POST["register"]))
     {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mob = $_POST['mobile'];
	$pswd = $_POST['password'];
		$address = $_POST['address'];
	$sql=mysqli_query($con,"select * from tblvendor where fld_email='$email'");
    if(mysqli_num_rows($sql))
	{
	  $ermsg="This Email Id is laready registered with us";
	}
	else
	{		
		$logo=$_FILES['logo']['name'];
	$sql=mysqli_query($con,"insert into tblvendor 
	(fld_name	,fld_email,fld_password,fld_mob,fld_address,fld_logo)
       	values('$name','$email','$pswd','$mob','$address','$logo')");
	
    if($sql)
	{
	if (!file_exists('image/restaurant')) {
    mkdir('image/restaurant');
		
}
	mkdir("image/restaurant/$email");
	
	move_uploaded_file($_FILES['logo']['tmp_name'],"image/restaurant/$email/".$_FILES['logo']['name']);
		header("location:./vendorLoginIn.php");
	}else{
		echo "Error" . mysqli_error($con);
	}
	}
}

?>

<html>
<head>
	<title>
	Foodshal-VendorSignup
	</title>
		<link rel="stylesheet" type="text/css" href="./public/css/styles.css">
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./public/css/footer.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		
	
	</head>
	<body style="background-color: #C8C8C8;">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
			<div class="image bg m-0 p-0" style="width: 100%;">
			<div class="row justify-content-center">
		<div class="col-12 col-md-4 col-sm-6 m-0 p-0 ">
			
			
			<div class="content pt-2 pb-1 pl-4 pr-4">
			<div class="heading" >
			<h3 style="color:white;">
					<b>
			Register
					</b>
			</h3>
			
			</div>
				<div class="card border-light pt-1 pb-1 pr-5 pl-4">
					<form method="POST" enctype="multipart/form-data">
					
				
					<div class="name mb-2">
						<label for="">Name:</label>
					<input type="text" name="name" id="name" placeholder="Name" class="form-control border-primary" required>
				
				</div>
					<div class="email mb-2">
						<label for="">Email:</label>
					<input type="email" name="email" placeholder="Email" class="form-control border-primary" required>
				
				</div>
						<div class="password mb-2">
						<label for="">Password:</label>
					<input type="text" name="password" placeholder="Password" class="form-control border-primary" required>
				
				</div>
						<div class="mobile mb-2">
							<label for="">Mobile:</label>
					<input type="number" name="mobile" placeholder="Phone number or email" class="form-control border-primary" required>
				
				</div>
						<div class="address mb-2">
						<label for="">Address:</label>
					<input type="text" name="address" placeholder="Address" class="form-control border-primary" required>
				
				</div>
						
						<div class="logo mb-2">
							<label for="">Upload Logo:</label>
                          <input type="file"  name="logo" required> 
                     </div>
						
						
				

				
				
				
				<div class="singup-button mb-2">
				<button type="submit" name="register" class="btn btn-primary btn-sm form-control" value="register">Register</button>
				</div>

					
					<div class="singin-button">
						<a href="vendorLogIn.php" class="btn btn-primary btn-sm form-control">
							Sign In
							
						</a>
				</div>
						<div class="footer" style="color:red;">
						<?php if(isset($ermsg)) { echo $ermsg; }?>
						</div>
			</form>
					
				</div>
			</div>
				
				
			
			
			
			</div>
			
			</div>
		</div>
		
		</div>
			</div>
		</div>
			<?php
			include("footer.php");
			?>
		
		
		
	</body>

</html>