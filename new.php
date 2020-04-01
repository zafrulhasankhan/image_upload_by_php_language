<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image) VALUES ('$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 400px;
   	height: 280px;
   }
</style>
</head>
<body>

  <?php
     while ($row = 1) { 
      
         echo "<img src='images/".$row['image']."' >";
      	
     }
    
  ?>
    <form method="POST" action="new.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000000000">
  	<div>
            <img class="avatar" src="images/user.jpg" alt="">
  	  <input type="file" name="image">
  	</div>
  	
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  
    </form>
</body>
</html>