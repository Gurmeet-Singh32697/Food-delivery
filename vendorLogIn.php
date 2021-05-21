<?php
	session_start();
	include("connection.php");
		if(isset($_POST['login']))
	{
			$user = $_POST['user'];
			$password = $_POST['password'];
		if($query=mysqli_query($con,"select * from tblvendor where fld_email='$user' && fld_password='$password'")){
		$rows = mysqli_num_rows($query);
			if($rows)
		{
			$_SESSION['restaurantId'] = $user;
//			$_SESSION['loggedIn'] = "true";
			header("location:./vendorManage.php");
				die();
		}
		else{
			$ermsg ="Deatails are incorrect";
		}
		}else{
			echo "error".mysqli_error($con);
		}
	}

	?>



	<html>
	<head>
		<title>
	FoodShala-VendorLogin
		</title>
			<link rel="stylesheet" type="text/css" href="./public/css/styles.css">
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="./public/css/footer.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->



		</head>
		<body style="background-color: #C8C8C8;">
			<div class="container">

			<div class="row justify-content-center">
				<div class="col-12">
				<div class="image bg m-0 p-0" style="width: 100%;">
				<div class="row justify-content-center">
			<div class="col-12 p-0 m-0 col-md-4 col-sm-6 m-0 p-0">


				<div class="content pt-5 pb-2 pl-4 pr-4">
				<div class="heading" >
				<h3 style="color:white">
						<b>
				Vendor Login
						</b>
				</h3>

					<div class="card text-center border-light pt-3 pb-2 pr-5 pl-4">

						<form  method="POST">
					<div class="mobile-email mb-2">
						<input type="text" placeholder="Phone number or email" name="user" class="form-control border-primary">

					</div>

					<div class="password mb-4">
					<input type="password" placeholder="Password" name="password" class="form-control border-primary">
					</div>
	<!--
					<% if(wrong){%>
					<div class="text-message mb-2 " style="text-align: left;color: red;">
						Username or Password entered is wrong !
					</div>
					<%}%>
	-->


					<div class="singin-button mb-2">
					<button type="submit" class="btn btn-primary btn-sm form-control loginButton" name="login" value="login">
						Sign In
					</button>
					</div>
					<div class="singup-button mb-2">
					<a href="vendorSignUp.php" class="btn btn-primary btn-sm form-control">
						Register

					</a>
				</div>
							<input type="hidden" value="<?php $loogedIn ?>" class="loggedIn" id="loggedIn">



				</form>
						<div class="footer" style="color:red;"><?php if(isset($ermsg)) { echo $ermsg; }?><?php if(isset($ermsg2)) { echo $ermsg2; }?></div>
						

					</div>
				</div>





				</div>

				</div>
			</div>


					</div>
				</div>
				</div>
			</div>




	<!--	<script type="text/javascript" src="./public/javascript/page.js" charset="utf-8"></script>-->
					<?php
				include("footer.php");
				?>




		</body>


	</html>