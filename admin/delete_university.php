
<?php
  include "../user/dbconnect.php";
  $id=$_GET["id"];
  $sql1="delete  from university where university_id=$id";
  $result1=mysqli_query($conn,$sql1);
  $sql2="delete  from course where univrsity_id=$id";
  $result2=mysqli_query($conn,$sql2);
  if($result1 | $result2)
   echo "<script>alert('Deleted Successfully')</script>";
   echo '<meta http-equiv="refresh" content="0;view_university.php">';
  ?>