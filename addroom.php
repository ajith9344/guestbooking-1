<html>
<head>
<title>AddRoomDetails</title>
</head>


<style>
	body{
		
		display: flex;;
		justify-content: center;
		align-items: center;
	
		  background-image: url("images/img10.jpg");
  		background-size: cover;
  		background-repeat: no-repeat;
  		background-position: center center;
	}
	form{
		height: 100%;
		width: 55%;
		display: flex;
		justify-content: center;		
		background: rgba(255, 255, 255, 0.06);
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, .37);
		border-radius: 30px;
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		

	}

	
	h3{
		color: white;
		font-family: Goudy Old Style;

	}

	.userinput{
		width:80%;
		border: none;
		background: none;	
		border-bottom:1px solid white ;
		color: lightgray;

	}


	.submit{
		width: 30%;
		margin-top: 17%;	
		padding: 5px 10px;
		color: white;
		background: none;
		border: 1px solid white;
		padding: 5px;
		border-radius: 5px;
		background: rgba(255, 255, 255, 0.06);
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, .9);
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		font-weight: bold;
		letter-spacing: 2px;

	}

	::placeholder{
		color: lightgray;
	}

	section{
		column-count: 2;
		width: 600px;
		padding-left: 5%;

	}
	
	.div2{

		margin-left: 5%;

	}
	textarea{
		height: 100px;
	}

	

</style>






<body>

	
	<form action="" method="post"  enctype="multipart/form-data">
		

		<div class=""><center><h3>Add Room</h3></center>
		<br>	
		<section>
			<div class="div1">
			<h3><label for="mansion" >Mansion Name</label></h3>
			<input class="userinput" type="text"   name = "mansion"   placeholder="Enter Your Mansion Name" id="mansion" required></input>
			</div><br>

			
			<div>
			<h3><label for="size" >Size Of Room(sq.feet) </label><br></h3>
			<input class="userinput" type="number"   name = "size"   placeholder="Enter the Room Size"  id="size"  required></input>
			</div><br>
			
			
			
			<div>
			<h3><label for="roomno" >Room Number</label><br></h3>
			<input  class="userinput"  type="number"   name = "roomno"   placeholder="Enter Your Room Number" id="roomno"   required></input>
			</div><br>
			<div>
			<h3><label for="address" >Address</label><br></h3>
			<textarea  class="userinput" type="text"   name = "address"   placeholder="Enter Your Address" id="no"   required></textarea>
			</div><br>


			<div class="div2">
			<div >

			<h3><br><label for="ac" class="ac">Choose Room with </label></h3>

				<select class="userinput"  name="roomtype" id="cars">
  					<option value="AC">AC</option>
 				 	<option value="non AC">non AC</option>
  
				</select>

			</div><br>

			<div>
			<h3><label for="noofbed" >Number Of Bed Available</label></h3>
			<input class="userinput" type="number"   name = "noofbed"   placeholder="Enter no of Beds"  id="noofbed"  required max="10"></input>
			</div><br>

			
			
			
			
			
			<div>
			<h3><label for="minimum" >Minimum Booking Period In Days</label><br></h3>
			<input   class="userinput" type="number"   name = "minimum"   placeholder="Minimum Booking Period"  id="minimum"  required min="1"></input>
			</div><br>
			
			<div>
			<h3><label for="maximum" >Maximum Booking Period In Days</label><br></h3>
			<input   class="userinput"  type="number"   name = "maximum"   placeholder="Maximum Booking Period"  id="maximum"  required   max="30"></input>
			</div><br>
			
			<div>
			<h3><label for="rent" >Rent per day</label><br></h3>
			<input class="userinput"  type="number"   name = "rent"   placeholder="Enter the Room rent"  id="rent"  required></input>
			</div>




		<div >
		</section>
			<center><a href="adminroomlist.php"><input class="submit" type="button" name="button" value="Back"></a>
			<input class="submit" type="submit" name="submit" value="Add Room">
			</center>
		</div>
	</form>

</body>
</html>



<?php
session_start();
include('config.php');

	

if(isset($_POST['submit'])){
	$mansion = $_POST["mansion"];
	$size = $_POST["size"];
	$roomno  = $_POST["roomno"];
	$address = $_POST["address"];
	$roomtype = $_POST["roomtype"];
	$noofbed = $_POST["noofbed"];
	$minimum = $_POST["minimum"];
	$maximum = $_POST["maximum"];
	$rent = $_POST["rent"];

$email=$_SESSION['email'];

	$result = mysqli_query($conn,"SELECT id FROM users WHERE email='$email'");
	// $rows=mysqli_fetch_array($result);
	foreach($result as $row){
		$userid=$row['id'];
		$_SESSION['userid']=$userid;
	}
 	
		$userid=$_SESSION['userid'];
		
	
	mysqli_query($conn,"INSERT INTO  roomdetails(userid,mansionname,address,roomno,roomsize,roomtype,noofbed,min,max,rent) VALUES('$userid','$mansion','$address','$roomno','$size','$roomtype','$noofbed','$minimum','$maximum','$rent')");
	 	
	echo"<script>
				alert('Room Added Successfully');
				document.location.href='upload.php';
				</script>";
	
	
}




?>