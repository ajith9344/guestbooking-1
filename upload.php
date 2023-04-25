<html>
<head>
  <title></title>
</head>
<style>

body{
    background: linear-gradient(to right,#3f5efb,#fb466b);
      background-image: url("images/img10.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      }

  form{
    margin: auto;
    margin-top: 10%;
    height: 50%;
    width: 20%;
    justify-content: center;    
    background: rgba(255, 255, 255, 0.06); 
    border-radius: 30px;
    border-left: 1px solid rgba(255, 255, 255, 0.3);
    border-top: 1px solid rgba(255, 255, 255, 0.3);
  
  }
  .submit{
    width: 40%;
    margin-top: 20%; 
    margin-left: 27%; 
    padding: 5px 10px;
    color: white;
    background: none;
    border: 1px solid white;
    padding: 5px;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.06);
   
    border-left: 1px solid rgba(255, 255, 255, 0.3);
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    font-weight: bold;
    letter-spacing: 2px;

  }

  h3{
    color: white;
    font-family: Goudy Old Style;
    text-align: center;

  }
  .file{
    padding-left: 10%;
  }

  
</style>


<body>
<form method="post" enctype="multipart/form-data">
  <h3>Upload Photos</h3><br><br>
  <input class="file" type="file" name="images" multiple>
  <br>
  
  <div>
  <input class="submit" type="submit" name="submit" value="Upload">
    </div>

</body>
</html>


<?php
if(isset($_POST['submit'])) {
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "guestbooking");

  // Iterate over the selected files
  // foreach($_FILES['images']['tmp_name'] ) {
    // Get the image data
    $image_name = $_FILES['images']['name'];
    $image_size = $_FILES['images']['size'];
    $image_type = $_FILES['images']['type'];
    $image_data = file_get_contents($_FILES['images']['tmp_name']);

    $targetDirectory = "imageuploads/" .$image_name;
        move_uploaded_file($_FILES["images"]["tmp_name"],$targetDirectory);
        

        $res = mysqli_query($conn,"SELECT MAX(id) FROM roomdetails");
        $result = mysqli_fetch_array($res);
        $roomid= $result[0];


    $sql = "INSERT INTO images (roomid,location) VALUES ('$roomid', '$targetDirectory')";
    mysqli_query($conn,$sql);

      echo"<script>
        alert('Photo Added Successfully');
        document.location.href='adminroomlist.php';
        </script>";
    
  

}
// }
?>