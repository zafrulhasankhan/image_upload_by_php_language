<?php
include("config.php");
 $sql = "SELECT image FROM image ORDER BY ID DESC LIMIT 1";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

 $image_src = $row['image'];
 
?>


 <html>
     <head>
     </head>
     <body>
         
        <!-- select image from image where id=12 -->
         
         <img src='<?php echo $image_src;  ?>'  width="300px"  height="300px"> 
     </body>
 </html>