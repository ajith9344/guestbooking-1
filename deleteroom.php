<?php
include('config.php');
$id = $_GET['id'];

	
$result = mysqli_query($conn, "DELETE FROM roomdetails WHERE id=$id");

				header('location:adminroomlist.php');
				


?>