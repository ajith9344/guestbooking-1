<?php
include_once("config.php");
if(isset($_POST['update']))
{
 	$id=$_POST['id'];
	$mansionname = $_POST["mansion"];
	$roomsize = $_POST["size"];
	$roomno  = $_POST["roomno"];
	$address = $_POST["address"];
	$roomtype = $_POST["roomtype"];
	$noofbed = $_POST["noofbed"];
	$minimum = $_POST["minimum"];
	$maximum = $_POST["maximum"];
	$rent = $_POST["rent"];
	
	$result = mysqli_query($conn, "UPDATE roomdetails SET mansionname='$mansionname',address='$address',roomno='$roomno',roomsize='$roomsize',roomtype='$roomtype',noofbed='$noofbed',min='$minimum',max='$maximum',rent='$rent' WHERE id=$id");
	echo"<script>
				alert('Room Details Updated successfully');
				document.location.href='adminroomlist.php';
				</script>";
	
}
?>


<?php
session_start();
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
?>


<html>
<head>
<title>editroom</title>
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
		color:lightgray;

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
		padding-left: 3%;
		width: 600px;

		



	}
	
	.div2{

		margin-left: 5%;

	}
	.idinput{
		display: none;
	}
	textarea{
		height: 100px;
	}

	

</style>






<body>
	<form action="" method="post"  enctype="multipart/form-data">
		<div class=""><center><h3>Update Room</h3></center>
		<br>	
		<section>
			<div >
			<input class="idinput" type="number"   name = "id"   value="<?php echo 
			$id; ?>" required ></input>
			<h3><label for="mansion" >Mansion Name</label></h3>
			<input class="userinput" type="text"   name = "mansion"   placeholder="Enter Your Mansion Name" id="mansion" value="<?php echo 
			$mansionname; ?>" required></input>
			</div><br>

			
			<div>
			<h3><label for="size" >Size Of Room(sq.feet)</label><br></h3>
			<input class="userinput" type="number"   name = "size"   placeholder="Enter the Room Size"  id="size"  value="<?php echo 
			$roomno; ?>"  required></input>
			</div><br>
			
			
			
			<div>
			<h3><label for="roomno" >Room Number</label><br></h3>
			<input  class="userinput"  type="number"   name = "roomno"   placeholder="Enter Your Room Number" id="roomno" value="<?php echo 
			$roomno; ?>"   required></input>
			</div><br>
			<div>
			<h3><label for="address" >Address</label><br></h3>
			<textarea  class="userinput" type="text"   name = "address"   placeholder="Enter Your Address" id="address"  required><?php echo 
			$address; ?></textarea>
			</div><br>


			<div class="div2">
			<div >

			<h3><br><label for="ac" class="ac">Choose Room with </label></h3>

				<select class="userinput"  name="roomtype" value="<?php echo $roomtype; ?>"  id="cars">
  					<option value="AC">AC</option>
 				 	<option value="non AC">non AC</option>
  
				</select>

			</div><br>

			<div>
			<h3><label for="noofbed" >Number Of Bed Available</label></h3>
			<input class="userinput" type="number"   name = "noofbed"   placeholder="Enter no of Beds"  id="noofbed" value="<?php echo 
			$noofbed; ?>"  required></input>
			</div><br>

			
			
			
			
			
			<div>
			<h3><label for="minimum" >Minimum Booking Period In Days</label><br></h3>
			<input   class="userinput" type="number"   name = "minimum"   placeholder="Minimum Booking Period"  id="minimum"  value="<?php echo 
			$minimum; ?>"   required></input>
			</div><br>
			
			<div>
			<h3><label for="maximum" >Maximum Booking Period In Days</label><br></h3>
			<input   class="userinput"  type="number"   name = "maximum"   placeholder="Maximum Booking Period"  id="maximum"  value="<?php echo 
			$maximum; ?>"  required></input>
			</div><br>
			
			<div>
			<h3><label for="rent" >Rent per day</label><br></h3>
			<input class="userinput"  type="number"   name = "rent"   placeholder="Enter the Room rent"  id="rent" value="<?php echo 
			$rent; ?>"   required></input>
			</div>




		</div>
		</section>
			<center><a href="adminroomlist.php"><input class="submit" type="button" name="button" value="Back"></a>
			<input class="submit" type="submit" name="update" value="Save">
			</center>
		</div>
	</form>

</body>
</html>



