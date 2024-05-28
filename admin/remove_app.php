
<?php
  include "../user/dbconnect.php";
  $id=$_GET["id"];
  $sql="update payment set status=0 where pay_id=$id";
  $result=mysqli_query($conn,$sql);
  if($result)
   echo "<script>alert('Removed Successfully')</script>";
   echo '<meta http-equiv="refresh" content="0;viewapplication.php">';
  ?>