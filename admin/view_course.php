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
    <th>Course ID</th>
    <th>Course Name</th>
    <th>Duration</th>
    <th>Syllabus</th>
    <th>Eligibility</th>
    <th>Criteria</th>
    <th>Status</th>
    <th>Amount</th>
    <th>Country</th>
    <th>University</th>
    <th>Category</th>
    <th>Actions</th>
  </tr>
  <?php
// Assuming $conn is the database connection
$result = mysqli_query($conn, "SELECT * FROM course");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?php echo $row['course_id']; ?></td>
    <td><?php echo $row['course_name']; ?></td>
    <td><?php echo $row['duration']; ?></td>
    <td><a href='../uploads/<?php echo $row['syllabus']; ?>'>View Syllabus</a></td>
    <td><?php echo $row['eligibility']; ?></td>
    <td><?php echo $row['criteria']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td>
        <?php
        $country = $row['country_id'];
        $countryResult = mysqli_query($conn, "SELECT country_name FROM country where country_id=$country");
        if ($countryResult) {
            $countryRow = mysqli_fetch_assoc($countryResult);
            echo  $countryRow['country_name'];
        }
        ?>
    </td>
    <td>
    <?php
$university = $row['university_id'];
$countryResult = mysqli_query($conn, "SELECT university_name FROM university where university_id=$university");

if ($countryResult) {
    if (mysqli_num_rows($countryResult) > 0) {
        $countryRow = mysqli_fetch_assoc($countryResult);
        echo $countryRow['university_name'];
    } else {
        echo "No university found for the given ID";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
    </td>
    <td>
        <?php
        $category = $row['category_id'];
        $countryResult = mysqli_query($conn, "SELECT category_name FROM category where category_id=$category");
        if ($countryResult) {
            $countryRow = mysqli_fetch_assoc($countryResult);
            echo  $countryRow['category_name'];
        }
        ?>
    </td>
    <td>
        <a href="update_course.php?id=<?php echo $row['course_id']; ?>" class="a-co"><button class="update-btn">Update</button></a>
        <a href="delete_course.php?id=<?php echo $row['course_id']; ?>" class="a-co"><button class="delete-btn">Delete</button></a>
    </td>
</tr>
<?php
}
?>

  
</table>
</div>

</body>
</html>
