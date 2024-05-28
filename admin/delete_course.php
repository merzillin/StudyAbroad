
<?php
  include "../user/dbconnect.php";
  $id=$_GET["id"];
  $sql="delete  from course where course_id=$id";
  $result=mysqli_query($conn,$sql);
  if($result)
   echo "<script>alert('Deleted Successfully')</script>";
   echo '<meta http-equiv="refresh" content="0;view_course.php">';
  ?>