<html>
<head>
<title>login</title>
</head>


<style>
	body{
		height: 100%;;
		width: 100%;
		display: flex;;
		justify-content: center;
		align-items: center;
		background: linear-gradient(to right,#3f5efb,#fb466b);
		  background-image: url("images/img1.jpeg");
  		background-size: cover;
  		background-repeat: no-repeat;
  		background-position: center center;
  		overflow-x: hidden;
  		overflow-y: hidden;

		
	}
	form{
		height: 50%;
		width: 20%;
		display: flex;
		justify-content: center;
		
		
		opacity: 0.9;
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, .37);
		border-radius: 30px;
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		padding: 20px;
		font-family: Goudy Old Style;
		margin-right: 20%;
	}

	.email{
		width: 100%;
		
		

	}
	h3{
		color: white;
	}

	.inputemail, .inputmobile{
		width:100%;
		border: none;
		background: none;	
		border-bottom:1px solid white ;

	}


	.submit{
		width: 100%;
		margin-top: 15%;
		border: none;
		background: rgba(255, 255, 255, 0.06);
		/*box-shadow:0 8px 32px 0 rgba(31, 38, 135, .9);*/
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		color: white;
		padding-top: 2%;
		padding-bottom: 2%;
		padding-left: 10%;
		padding-right: 10%;
		border-radius: 5px;
		font-weight: bold;
		letter-spacing: 2px;
		font-family: Goudy Old Style;
	}
	h4{
		color: white;
		text-decoration: none;
	}
	
	

	::placeholder{
		color: lightgray;
	}
	a{
		text-decoration: none;
	}

</style>






<body>

	
	<form action="" method="post"  enctype="multipart/form-data">

		<div class="email"><center><h3>Register</h3></center>
			<div>
			<h3><label for="email" >Email</label><br></h3>
			<input class="inputemail" type="email"   name = "email"   placeholder="Enter Your Email" id="email" required></input>
			<!-- </div>
			<br>
			<div> -->
			<h3><label for="mobile" >Mobile Number</label><br></h3>
			<input class="inputmobile" type="text"   name = "mobile"   placeholder="Enter Your Mobile" id="mobile"  pattern="[1-9]{1}[0-9]{9}" required></input>
			</div>
			<center>
			<input class="submit" type="submit" name="submit" value="Register"><br>
			
			<a href="login.php"><h4>login</h4></a></center>
			
		</div>
	</form>

</body>
</html>

<?php
session_start();
include('config.php');



if(isset($_POST['submit'])){
$email = $_POST["email"];
$mobile = $_POST["mobile"];

$_SESSION['email'] = $email;
$data=$_SESSION['email'];

 	$result = mysqli_query($conn,"SELECT  email FROM users WHERE email='$email'");
	$row=mysqli_fetch_array($result);
	

	if(empty($row)){
		mysqli_query($conn,"INSERT INTO  users(email,mobile) VALUES('$email','$mobile')");	
		echo"<script>
				alert('Registration success.Please login to continue');
				document.location.href
				</script>";
	}
	else{
		echo"<script>
				alert('Email already exist');
				document.location.href
				</script>";
	}
	



}







?>