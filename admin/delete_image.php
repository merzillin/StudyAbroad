
<?php
  include "../user/dbconnect.php";
  $id=$_GET["id"];
  $sql1="delete  from image where image_id=$id";
  $result1=mysqli_query($conn,$sql1);
  if($result1)
   echo "<script>alert('Deleted Successfully')</script>";
   echo '<meta http-equiv="refresh" content="0;view_image.php">';
  ?>