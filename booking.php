<html>
<head><title> RoomBookings</title></head>
<body>
<style>
	body{
		background: linear-gradient(to right,#3f5efb,#fb466b);
		  background-image: url("images/img14.jpg");
  		background-size: cover;
  		background-repeat: no-repeat;
  		background-position: center center;
	}
	table{
		background-color: rgb(168, 167, 167, 0.7);
		
		width: relative;
		border: 1px solid black;
		margin-left: 5%;
		margin-top: 5%;
		

	}
	th{
		font-family: Goudy Old Style;
		text-align: center;
		padding-top: 1%;
		padding-bottom: 1%;
		padding-left: 3%;
		padding-right: 3%;

		


	}
	tr{
		border-bottom: 2px solid black;
	}

	td{
		width:absolute;
		/*padding-left: 1%;*/
		padding-top:.5% ;
		padding-bottom:.5% ;
		border-top: 2px solid lightgrey;
		font-family: calibri;
		overflow-x: visible;
		text-align: center;
		margin-right: 2%;


	}
	div{
		border-bottom: 2px solid black;
	}
	.backbtn{
		background-color: lightblue;
		/*margin-top: 1%;*/
		margin-bottom: -5%;
		margin-left: 65%;
		width: 10%;
		padding:5px 30px;
		border: none;
		color: black;
		font-weight: bold;
		font-family: calibri;
		font-size: 20px;
		/*background: rgba(255, 255, 255, 0.06);*/
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, 1);
		border-radius: 10px;
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);

	}
	h2{
		margin-top: 2%;
		text-align: center;
		font-family: Goudy Old Style;
		letter-spacing: 3px;
		color: grey;
	}
		h3{
		text-align: center;
		margin-top: 15%;
		color: lightgray;
		opacity: 0.6;
		font-family: Goudy Old Style;
		letter-spacing: 2px;
	}
	.mansion,.email{
		text-align:left ;
	}
	

</style>
<?php 
session_start();
include('config.php');
$userid=$_SESSION['id'];

$result = mysqli_query($conn,"SELECT * from bookingdetails WHERE adminid='$userid'");

?>  
	<section>
	<h2>Booking List</h2><a href='adminroomlist.php'><input class='backbtn' type='button' name='back' value='back'></a>
	</section>
	<table>
	
		<tr class="heading">
			<th>Mansion Name</th>
			<th>Room Number</th>
			<th> Email</th>
			<th>Mobile</th>
			<th>Total Booking Days</th>
		</tr>
	
<?php
	foreach($result as $row){
	$mansionname = $row['mansionname'];
	$roomno = $row['roomno'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$totaldays = $row['totaldays'];
?>
		
		<tr>
			<td class="mansion"><?php echo $mansionname; ?></td>
			<td><?php echo $roomno; ?></td>
			<td class="email"><?php echo $email; ?></td>
			<td><?php echo $mobile; ?></td>
			<td><?php echo $totaldays; ?></td>
		</tr>



<?php
}
		

if(empty($mansionname)){
	echo "<h3>No Room Available</h3>";
?>
	<style>
		table{
			display: none;
		}
	</style>
<?php	
}	

?>

</table>
</body>
</html>