<html>
<head><title></title></head>
<body>
<style>

	body{
		background-image: url("css/img2.jpg");
		/*background: linear-gradient(to right,#3f5efb,#fb466b);*/
		overflow-x: hidden;
		 
  		background-size: cover;
  		background-repeat: no-repeat;
  		background-position: center center;
	}
	table{
		margin-bottom: -2%;
		width: 80%;
		background:none ;

	}
	td{ 
		display:inline-block;
		padding-left: 10%;

	}
	.data1,.data2{
		width: 100%;
		padding-left: 10%;

	}
	.tableclass{
		display: flex;
	}
	h3{
		color: white;
		font-family: Goudy Old Style;	
		
		font-weight: bold;
	}
	p{
		color: lightgray;
		font-family: Goudy Old Style;	
	}
	div{
	display: flex;
	}
	.submit{
		margin-top: 10%;
		margin-left: 30%;
		width: 100%;
		padding:10px 30px;
		border: none;
		color: white;
		font-weight: bold;
		font-family: calibri;
		font-size: 20px;
		background: rgba(255, 255, 255, 0.06);
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, 1);
		border-radius: 10px;
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
	}

	.price{
		margin-top: 25%;
		background: rgba(255, 255, 255, 0.06);
		box-shadow:0 8px 32px 0 rgba(31, 38, 135, .37);
		border-radius: 10px;
		border-left: 1px solid rgba(255, 255, 255, 0.3);
		border-top: 1px solid rgba(255, 255, 255, 0.3);
		width: 100%;
		padding-left:30% ;
		padding-right: 30%;
		padding-top: 8%;
		padding-bottom: 8%;

	}
	
	img{
		/*margin-top: 30%;*/
		max-width: 300px;
		max-height: 300px;
		min-width: 300px;
		min-height: 300px;

		

	}

	.priceclass{
		padding-left: 25%;
		width: 11%;
	}
	
	.searchform{
		/*margin-left: 50%;*/
		height: 5%;
		margin-bottom: 3%;
		margin-right: 5%;

	}

	.searchinput{
		width: 100%;
		/*padding: 5% ;*/
		border: 1px solid grey;
		border-radius: 10px;
	}

	.searchsubmit{
		/*padding-top: 2%;
		padding-bottom: 8%;*/
		padding-left: 2%;
		padding-right: 2%;
		border: 2px solid lightgoldenrodyellow;
		border-radius: 10px;
		margin-left: 1%;
		background: blue;
		font-family: calibri;
		font-weight: bold;
		color: white;
		font-size: 20px;

	}

	h1{
		text-align: center;
		color: greenyellow;
		font-family: Goudy old style;
		font-weight: bold;
		letter-spacing: 3px;
	}
	::placeholder{
		font-size: 80%;
		padding-left: 5%;

	}
	.imageclass{
		margin-top: 2%;
		min-width: 200px;
		max-width: 300px;
		max-height: 300px;
		min-height: 300px;
		display: flex;
		height: 250px;
		align-items: center;
		justify-content: center;

		
	}
	.btnlogout{
		
		/*padding-bottom: 1%;*/
		text-decoration: none;
		padding-left: 2%;
		padding-right: 2%;
		border: 2px solid lightgoldenrodyellow;
		border-radius: 10px;
		/*margin-left: 30%;*/
		background: blue;
		font-family: calibri;
		font-weight: bold;
		color: white;
		font-size: 20px;
		background-color: 1a759f;
		margin-right: 60%;

	}



</style>
<form action="" method="post">
<H1>Room List</H1>

<div class="searchform">
<a href="logout.php" class="btnlogout">logout</a>
<input class="searchinput" type="text" name="txtsearch" placeholder="Search Mansion name or Location" required>
<input class="searchsubmit" type="submit" name="submitsearch" value="Search">
</div>
</form>
<?php
session_start();
include('config.php');

if(isset($_POST['submitsearch'])){
	$roomdetail=$_POST['txtsearch'];
	$_SESSION['roomdetail'] = $roomdetail;
	$searchdata=$_SESSION['roomdetail'];

	header('location:searchlist.php');
	

	

}
?>

<table>
	
	<?php
	
	include('config.php');
	$i = 1;
	$rows=mysqli_query($conn,"SELECT * FROM roomdetails ");
	foreach($rows as $row):
		$id=$row['id'];
	?>
	 <tr> 
			<!-- <td><?php echo $i++ ; ?></td>
			<td><?php echo $row['mansionname']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['roomno']; ?></td>
			<td><?php echo $row['roomsize']; ?></td>
			<td><?php echo $row['roomtype']; ?></td>
			<td><?php echo $row['noofbed']; ?></td>
			<td><?php echo $row['min']; ?></td>
			<td><?php echo $row['max']; ?></td>
			<td><?php echo $row['rent']; ?></td> -->


		<table>	
		<tr><td class="priceclass"></td>
			<td ><h3 class="price">Rent/day&nbsp &nbsp &nbsp &nbsp<?php echo $row['rent']; ?></h3></td>
			<td><a href="userinfo.php?id=<?php echo $row["id"]; ?>"><input class="submit" type="submit" name="submit" value="Book Now"></a></td>
		</tr>

		<?php 	
		
		$result=mysqli_query($conn,"SELECT location  FROM images WHERE roomid='$id' ");
		$rows=mysqli_fetch_assoc($result);
		$location=$rows['location'];
		
		?>
		<tr class="tableclass"><td class="imageclass"><img src= "<?php echo $location; ?>"></td>
		
			<td class="data1">
			<h3>Mansion Name:</h3><p><?php echo $row['mansionname'];  ?></p>
			<h3>Address       :</h3><p><?php echo $row['address'];  ?></p> 
			<h3>Roomnumber    :</h3><p><?php echo $row['roomno'];  ?></p> 
			<h3>Room Size In Sq.feet    :</h3><p><?php echo $row['roomsize'];  ?></p> 
			</td>
			<td class="data2">		
			<h3>Room Type                 :</h3><p><?php echo $row['roomtype'];  ?></p> 
			<h3>Number Of Beds Available  :</h3><p><?php echo $row['noofbed'];  ?></p> 
			<h3>Minimum Booking Period    :</h3><p><?php echo $row['min'];  ?></p> 
			<h3>Maximum booking Period    :</h3><p><?php echo $row['max'];  ?></p>
			</td> 
		</tr>
		<hr>
		</table><br><br>
	
	</tr>
	 <?php endforeach; ?> 
</table>


</body>
</html>
