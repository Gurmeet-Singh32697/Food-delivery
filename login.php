<?php
include('config.php');
include("connection.php");

$login_button = $google_client->createAuthUrl();
// $_SESSION["login_button"] = $login_button;

if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
	
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];
  

  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
   echo $_SESSION['user_gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
  $id = mysqli_real_escape_string($con, $data->id);
  $full_name = mysqli_real_escape_string($con, trim($data->name));
  $email = mysqli_real_escape_string($con, $data->email);
  $profile_pic = mysqli_real_escape_string($con, $data->picture);
  if(mysqli_query($con,"insert into tblcustomer (fld_name,fld_email,password,fld_mobile) values('$full_name','$email','google','9076')")){
	$_SESSION['loggedIn']  =  $id;
	header("location:./home.php");
	exit;
            }else{
				echo $con -> error;
			}
  
 }
}

if(isset($_POST['login']))
	{
			$user = $_POST['user'];
			$password = $_POST['password'];
		if($result=mysqli_query($con,"select * from tblcustomer where fld_email='$user' && password='$password'")){
//		$row=mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result)){
		if($row){

		
			$_SESSION['loggedIn'] = $row['fld_cust_id'];
			header("location:./home.php");


		}else{
			$ermsg ="Deatails are incorrect";
		}
		}
		}else{
			echo "error".mysqli_error($con);
		}
	}
	?>
	<html>
	<head>
	<!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="1047869384400-37lhhlv526u61kmms55qm18fv2ith9i7.apps.googleusercontent.com">
		 -->
		<title>
	FoodShala-Login
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


				<div class="content pt-5 pb-4 pl-4 pr-4">
				<div class="heading" >
				<h3 style="color:white">
						<b>
				HEY!<br>
				WELCOME BACK
						</b>
				</h3>

					<div class="card text-center border-light pt-3 pb-5 pr-5 pl-4">

						<form  method="POST">
					<div class="mobile-email mb-2">
						<input type="text" placeholder="Phone number or email" name="user" class="form-control border-primary">

					</div>

					<div class="password mb-2">
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
					<a href="signup.php" class="btn btn-primary btn-sm form-control">
						Sign Up

					</a>
				</div>
							<input type="hidden" value="<?php $loogedIn ?>" class="loggedIn" id="loggedIn">



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
					
						<div class="singup-button mb-md-4 pb-5">
						<a class="login-btn btn btn-sm btn-block" style="text-align: left;background-color: #3B5998;color: white;" href="<?php echo $google_client->createAuthUrl(); ?>">
						Sign up with Google </a>
								
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




	<!--	<script type="text/javascript" src="./public/javascript/page.js" charset="utf-8"></script>-->
					<?php
				include("footer.php");
				?>




		</body>


	</html>