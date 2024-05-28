<?php
include "../user/dbconnect.php";
include "header1.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Category Management</title>
  <style>
    .boxx{
        width:60%;
        margin-right:100px;
        margin-left:300px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
    .update-btn {
  padding: 5px 10px;
  margin: 5px;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  color: black;
}

.delete-btn {
  padding: 5px 10px;
  margin: 5px;
  background-color: #f44336; /* Red */
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  color: black;
}
.a-co{
    color:black;
}
.img-box{
    width: 250px;
    height:350px;
}

  </style>
</head>
<body>

<h2 style="margin-left:300px">University List</h2>
<div class="boxx">
<table>
  <tr>
    <th>University ID</th>
    <th>University Name</th>
    <th>Location</th>
    <th>University Image</th>
    <th>Actions</th>
  </tr>
  <?php
  // Assuming $conn is the database connection
  $result = mysqli_query($conn, "SELECT *  FROM university");
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
      
  
  <tr>
    <td><?php echo $row['university_id'];?></td>
    <td><?php  echo $row['university_name'];?></td>
    <td><?php  echo $row['location'];?></td>
    <td><img src="../uploads/<?php  echo $row['uimage'];?>" class="img-box"></td>
    <td>
    <a href="update_university.php?id=<?php echo $row['university_id'];?>" class="a-co" ><button class="update-btn">Update</button></a>
    <a href="delete_university.php?id=<?php echo $row['university_id'];?>" class="a-co"><button class="delete-btn">Delete</button></a>
    </td>
  </tr>
  <?php
}
  ?>
  
</table>
</div>

</body>
</html>