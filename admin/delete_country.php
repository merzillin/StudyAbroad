
<?php
  include "../user/dbconnect.php";
  $id=$_GET["id"];
  $sql1="delete  from country where country_id=$id";
  $result1=mysqli_query($conn,$sql1);
  $sql2="delete  from course where country_id=$id";
  $result2=mysqli_query($conn,$sql2);
  $sql3="delete  from university where country_id=$id";
  $result3=mysqli_query($conn,$sql3);
  if($result1 | $result2 | $result3)
   echo "<script>alert('Deleted Successfully')</script>";
   echo '<meta http-equiv="refresh" content="0;view_country.php">';
  ?>