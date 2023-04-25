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
		/*background: linear-gradient(to right,#3f5efb,#fb466b);*/
		background: url('images/img1.jpeg');
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
		background: rgba(255, 255, 255, 0.06);
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, .37);
		border-radius: 30px;
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		padding: 20px;
		font-family: Goudy Old Style;
		margin-right: 20%;
		/*margin-top: 10%;/*
		*/*/
	}

	.email{
		width: 100%;
	}
	a{
		text-decoration: none;
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


	.submit1,.submit2{
		width: 100%;
		margin-top: 17%;
		border: none;
		background: rgba(255, 255, 255, 0.06);
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, .9);
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
	}

	.submit2{
		margin-top: 4%;

	}

	::placeholder{
		color: lightgray;
	}
	h4{
		color: white;
		text-decoration: none;
		margin-top: 7%;
	}
	

</style>






<body>

	
	<form action="" method="post"  enctype="multipart/form-data">

		<div class="email"><center><h3>Login</h3></center>
			<div>
			<h3><label for="email" >Email</label><br></h3>
			<input class="inputemail" type="email"   name = "email"   placeholder="Enter Your Email" id="email" required></input>
			<!-- </div>
			<br>
			<div> -->
			<!-- <h3><label for="mobile" >Mobile Number</label><br></h3>
			<input class="inputmobile" type="text"   name = "mobile"   placeholder="Enter Your Mobile" id="mobile"  pattern="[1-9]{1}[0-9]{9}" required></input> -->
			</div>
			<center>
			<input class="submit1" type="submit" name="adminsubmit" value="Login as Room owner"></center>
			<input class="submit2" type="submit" name="usersubmit" value="Login as customer"></center><br>
			<center><a href="adminregister.php"><h4>Register</h4></a></center>
		</div>
	</form>

</body>
</html>

<?php
session_start();
include('config.php');



if(isset($_POST['adminsubmit'])){
$email = $_POST["email"];
$_SESSION['email']=$email;



 	$result = mysqli_query($conn,"SELECT  email FROM users WHERE email='$email'");
	$row=mysqli_fetch_array($result);
	

	if(!empty($row)){
			
		header('location:adminroomlist.php');
	}
	else{
		echo"<script>
				alert('Email Not Registered');
				document.location.href
				</script>";
	}
	



}


if(isset($_POST['usersubmit'])){
$email = $_POST["email"];


$_SESSION['email'] = $email;
$data=$_SESSION['email'];

 	$result = mysqli_query($conn,"SELECT  email FROM users WHERE email='$email'");
	$row=mysqli_fetch_array($result);
	

	if(!empty($row)){
		
		header('location:roomlist.php');
	}
	else{
		echo"<script>
				alert('Email Not registered');
				document.location.href
				</script>";
	}
	



}


?>
