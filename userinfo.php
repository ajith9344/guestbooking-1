<html>
<head>
<title>login</title>
</head>


<style>
	body{
		height: 100%;;
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		background-image: url("images/img10.jpg");
		overflow-x: hidden; 
  		background-size: cover;
  		background-repeat: no-repeat;
  		background-position: center center;
	}
	form{
		height: 80%;
		width: 25%;
		display: flex;
		justify-content: center;
		background: rgba(255, 255, 255, 0.06);
		border-radius: 30px;
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		padding: 20px;
		font-family: Goudy Old Style;
	}

	.userinfo{
		width: 90%;

		
		

	}
	h3{
		color: white;

	}

	.inputemail, .inputmobile,.inputstart,.inputend,.inputtotal{
		margin-top: -3%;
		margin-bottom: 2%;
		width:100%;
		border: none;
		background: none;	
		border-bottom:1px solid white ;
		color: lightgray;

	}


	.submit{
		width: 50%;
		margin-top: 17%;
		border: none;
		background: rgba(255, 255, 255, 0.06);
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
	.cancel{
		/*width: 50%;*/
		margin-top: 17%;
		border: none;
		background: rgba(255, 255, 255, 0.06);
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

	::placeholder{
		color: lightgray;
		font-size: 10px;
	}
	.btn{
		display: ;
	}
</style>






<body>

	
	<form action="" method="post"  enctype="multipart/form-data">

		<div class="userinfo"><center><h3>User Info</h3></center>
			<div>
			<h3><label for="email" >Email</label><br></h3>
			<input class="inputemail" type="email"   name = "email"    id="email" required></input>
			<!-- </div>
			<br>
			<div> -->
			<h3><label for="mobile" >Mobile Number</label><br></h3>
			<input class="inputmobile" type="text"   name = "mobile"    id="mobile"  pattern="[1-9]{1}[0-9]{9}" required></input>

			<h3><label for="start" >Starting Date</label><br></h3>
			<input class="inputstart" type="date"   name = "startdate"  id="start" placeholder="none" required></input>

			<h3><label for="end" >Ending date</label><br></h3>
			<input class="inputend" type="date"   name = "enddate"   id="end" required></input>

			<h3><label for="total" >Total Number Of Days</label><br></h3>
			<input class="inputtotal" type="number"   name = "total"   id="total"  required></input>

			</div>
			<center>
			<div class="btn">
			<a href="roomlist.php"><input class="cancel" type="button" name="cancel" value="Cancel"></a>
			<input class="submit" type="submit" name="submit" value="Book Now"></center>
			</div>
		</div>
	</form>

</body>
</html>



<?php
session_start();
include('config.php');
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM roomdetails WHERE id=$id");
while($res = mysqli_fetch_array($result))
{   
	$id=$res['id'];
	$userid=$res['userid'];
	$mansionname = $res["mansionname"];
	$size = $res["roomsize"];
	$roomno  = $res["roomno"];
	$address = $res["address"];
	$roomtype = $res["roomtype"];
	$noofbed = $res["noofbed"];
	$minimum = $res["min"];
	$maximum = $res["max"];
	$rent = $res["rent"];
}




if(isset($_POST['submit'])){
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$startdate = $_POST["startdate"];
	$enddate = $_POST["enddate"];
	$totaldays = $_POST["total"];
	
	
	$result = mysqli_query($conn,"INSERT INTO  bookingdetails(adminid,mansionname,roomno,email,mobile,startdate,enddate,totaldays) VALUES('$userid','$mansionname','$roomno','$email','$mobile','$startdate','$enddate','$totaldays')");
	
	
	echo"<script>
				alert('Room Successfully Booked');
				document.location.href='roomlist.php'
				</script>";
	
}




?>