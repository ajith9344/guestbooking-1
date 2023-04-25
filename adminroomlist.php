<html>
<head><title>adminroomlist</title></head>
<body>
<link rel="stylesheet" href="css/adminroomlist.css">


	

</style>
<form action="" method="post">
<H1>Room List</H1>
<div class="addroom">
<a href="logout.php"  onclick='return confirm("Are you sure to LogOut")' class="btnlogout">logout</a>
<a href = "addroom.php"><input class="addroomsubmit" type="button" name="submitsearch" value="Add Room"></a>
<a href = "booking.php"><input class="bookingsubmit" type="button" name="submitbooking" value="Bookings"></a>

</div>
</form>
	
	
	<?php
	session_start();
	include('config.php');
	$email = $_SESSION['email'];
	 
	$result = mysqli_query($conn,"SELECT id FROM users WHERE email='$email'");
	//$rows=mysqli_fetch_array($result);
	foreach($result as $row){
		$userid=$row['id'];
		$_SESSION['id']=$userid;
		
	}
	$userid=$_SESSION['id'];
	
	 
	$i = 1;
	$rows=mysqli_query($conn,"SELECT * FROM roomdetails WHERE userid='$userid' ");
	foreach($rows as $row):
		$id=$row['id'];
	 	// $_SESSION['id']=$id;
	 echo "<hr><table class='buttontable'>";


		?>	


		
		<tr>
			<td class="pricetd" ><h3 class="price">Rent/day&nbsp &nbsp &nbsp &nbsp<?php echo $row['rent']; ?></h3></td>
			<td class="edittd"><a href="editroom.php?id=<?php echo $row["id"]; ?>"> <input class="editbtn" type="submit"  value="edit"> </a>
				<a href="deleteroom.php?id=<?php echo $row["id"]; ?>"  onclick='return confirm("Are you sure to delete")'><input class="deletebtn" type="submit" name="deletebutton" value="delete"></a></td> 
			 
		</tr>
</table>
		<table>	
		<?php 	

	
		
		$result=mysqli_query($conn,"SELECT location  FROM images WHERE roomid='$id' ");
		$rows=mysqli_fetch_assoc($result);
		$location=$rows['location'];
		?>
		
		
		<tr class="tableclass"><td class="imageclass"><center><a href="updatephoto.php?id=<?php echo $id; ?>"  onclick='return confirm("Are you want to Update Image?")'><img src="<?php echo $location; ?>"></a></center></td>
	
	
		
	  
			<td class="data1">
			<h3>Mansion Name</h3><p><?php echo $row['mansionname'];  ?></p>
			<h3>Address       </h3><p><?php echo $row['address'];  ?></p> 
			<h3>Room Number    </h3><p><?php echo $row['roomno'];  ?></p> 
			<h3>Room Size     </h3><p><?php echo $row['roomsize'];  ?></p> 
			</td>
			<td class="data2">		
			<h3>Room Type                 </h3><p><?php echo $row['roomtype'];  ?></p> 
			<h3>Number Of Beds Available  </h3><p><?php echo $row['noofbed'];  ?></p> 
			<h3>Minimum Booking Period    </h3><p><?php echo $row['min'];  ?></p> 
			<h3>Maximum booking Period    </h3><p><?php echo $row['max'];  ?></p>
			</td> 
			
		</tr>
		
		</table><br><br>
	
	</tr>
	 <?php endforeach; 
	 
	 if(empty($row['mansionname'])){
	 	
		echo "<h2>No Room Available</h2>";
}	

	 ?> 
</table>


</body>
</html>
<?php


// if(isset($_POST['submitsearch'])){
// 	$roomdetail=$_POST['txtsearch'];
// 	$_SESSION['roomdetail'] = $roomdetail;
// 	$searchdata=$_SESSION['roomdetail'];

// 	header('location:searchlist.php');
	

	

// }
?> 