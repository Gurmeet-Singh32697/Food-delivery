<?php
//session_start();
include("connection.php");
if ( isset( $_POST['register'] ) ){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$query=mysqli_query($con,"select * from tblcustomer where fld_email='$email'");
	$row=mysqli_num_rows($query);
	if($row)
	{
		$ermsg2="Email alredy registered with us";
		
		
	}else{
	if(mysqli_query($con,"insert into tblcustomer (fld_name,fld_email,password,fld_mobile) values('$name','$email','$password','$mobile')"))
	 {
   header("location:./login.php");
}   
}	
}
?>
<html>
<head>
	<title>
	Foodshal-Signup
	</title>
		<link rel="stylesheet" type="text/css" href="./public/css/styles.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./public/css/footer.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		
	
	</head>
	<body style="background-color: #C8C8C8;">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
			<div class="image bg m-0 p-0" style="width: 100%;">
			<div class="row justify-content-center">
		<div class="col-12 col-md-4 col-sm-6 m-0 p-0 ">
			
			
			<div class="content pt-5 pb-4 pl-4 pr-4">
			<div class="heading" >
			<h3 style="color:white;">
					<b>
			Glad To<br>
			Meet You!
					</b>
			</h3>
			
			</div>
				<div class="card text-center border-light pt-3 pb-3 pr-5 pl-4">
					<form method="POST">
					
				<div class="mobile mb-2">
					<input type="number" name="mobile" placeholder="Phone number or email" class="form-control border-primary" required>
				
				</div>
					<div class="name mb-2">
					<input type="text" name="name" id="name" placeholder="Name" class="form-control border-primary" required>
				
				</div>
					<div class="email mb-2">
					<input type="email" name="email" placeholder="Email" class="form-control border-primary" required>
				
				</div>
				
				<div class="password mb-2">
				<input type="password" name="password" placeholder="Password" class="form-control border-primary" required>
				</div>

				
				
				
				<div class="singup-button mb-2">
				<button type="submit" name="register" class="btn btn-primary btn-sm form-control" value="register">Sign up</button>
				</div>

					
					<div class="singin-button mb-4">
						<a href="login.php" class="btn btn-primary btn-sm form-control">
							Sign In
							
						</a>
				</div>
			</form>
					<div class="footer" style="color:red;"><?php if(isset($ermsg)) { echo $ermsg; }?><?php if(isset($ermsg2)) { echo $ermsg2; }?></div>
					<div class="horizontalline mb-4">
					OR
					</div>
						<div class="singup-button mb-2">
							<a href="#" class="btn btn-sm btn-block" style="text-align: left;background-color: #3B5998;color: white;">
								Sign up with Facebook 
								
							</a>

				</div>
					<div class="singup-button mb-md-4">
				<button type="submit" class="btn btn-primary btn-sm form-control" style="text-align:left;" >Sign up with Google</button>
				</div>
					
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