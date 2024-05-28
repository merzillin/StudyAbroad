<?php
include "header1.php";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Course Registration Form</title>
    <style>
        .loading-spinner button {
            background-color: #4CAF50; /* Green background color */
  border: none; /* Remove border */
  color: white; /* White text color */
  padding: 15px 32px; /* Padding */
  text-align: center; /* Center-align text */
  text-decoration: none; /* Remove underline */
  display: inline-block; /* Display as block element */
  font-size: 16px; /* Font size */
  margin: 4px 2px; /* Margin */
  transition-duration: 0.4s; /* Add a transition effect */
  cursor: pointer; /* Cursor style */
  border-radius: 8px; /* Rounded corners */
}

.loading-spinner button:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
<div class="loading-spinner">
<h2 class="row" >Update course</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            
            <?php
            $courseid = $_GET['id'];
            #echo $cid;
            include "../user/dbconnect.php";
            $query = "SELECT * FROM course WHERE course_id=$courseid";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                ?>
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" value="<?php echo $row['course_name']; ?>"><br><br>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" value="<?php echo $row['duration']; ?>"><br><br>

        <label for="eligibility">Eligibility:</label>
        <input type="text" id="eligibility" name="eligibility" value="<?php echo $row['eligibility']; ?>"><br><br>

        <label for="criteria">Criteria:</label>
        <input type="text" id="criteria" name="criteria" value="<?php echo $row['criteria']; ?>"><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="<?php echo $row['status']; ?>"><br><br>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" value="<?php echo $row['amount']; ?>"><br><br>

        <label for="amount">Country:</label>
        <?php
$sql = "SELECT * FROM country";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<select name='country'>";
        // Loop through the results to create the dropdown options
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
        }
        echo "</select>";
    } else {
        echo "No countries available";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

                <br><br>
        <label for="amount">University:</label>
        <?php
                $sql = "SELECT * FROM university";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<select name='country'>";
                    // Loop through the results to create the dropdown options
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['university_id'] . "'>" . $row['university_name'] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "Error: Unable to fetch countries";
                }
                ?>
                <br><br>
        <label for="amount">Category:</label>
        <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<select name='category'>";
                    // Loop through the results to create the dropdown options
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "Error: Unable to fetch countries";
                }}
                ?>
                <br><br>
        <button type="submit" name="update" >Update</button>
            </div>
            </div>
    </form>
            </div>
            <?php
include "../user/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $course_name = $_POST["course_name"];
    $duration = $_POST["duration"];
    $eligibility = $_POST["eligibility"];
    $criteria = $_POST["criteria"];
    $status = $_POST["status"];
    $amount = $_POST["amount"];
    $country = $_POST["country"];
    $university = $_POST["university"];
    $category = $_POST["category"];

   

    // Perform the update operation using the retrieved form data
    $query = "UPDATE course 
              SET course_name='$course_name', duration='$duration', eligibility='$eligibility', 
              criteria='$criteria', status='$status', amount='$amount', country_id='$country', 
              university_id='$university', category_id='$category' 
              WHERE course_id=$courseid";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Update successful
        echo "<script>alert('Updated Successfully')</script>";
        echo '<meta http-equiv="refresh" content="0;view_course.php">';
    } else {
        // Update failed
        echo "Error updating course details: " . mysqli_error($conn);
    }
}
?>

</body>
</html>
