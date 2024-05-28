<?php include "header1.php";
include "dbconnect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>University and Course Information</title>
    <link rel="stylesheet" href="css/course.css">
</head>
<body>
    <h1>University and Course Information</h1>

    <?php
    $id=0;
    $id = $_GET['university'];

    // Fetch and display university information
    $universityQuery = "SELECT university_name, uimage, location FROM university WHERE university_id=$id";
    $universityResult = mysqli_query($conn, $universityQuery);

    while ($universityRow = mysqli_fetch_assoc($universityResult)) {
        echo '<div class="university">';
        echo "<header><p>" . $universityRow['university_name'] . "</p></header>";
        echo "<img src='uploads/" . $universityRow['uimage'] . "' alt='" . $universityRow['university_name'] . "' />";
        echo '<p class="und-img">Location: ' . $universityRow['location'] . '</p>';
        
    }

    // Fetch and display course information
    $courseQuery = "SELECT course_name, duration, eligibility, criteria, status FROM course WHERE university_id=$id";
    $courseResult = mysqli_query($conn, $courseQuery);

    while ($courseRow = mysqli_fetch_assoc($courseResult)) {
        echo '<div class="university-2">';
        echo '<h2 class="part-2">' . $courseRow['course_name'] . "</h2>";
        echo "<p class='part-2'>Duration: " . $courseRow['duration'] . "</p>";
        echo "<p class='part-2'>Eligibility: " . $courseRow['eligibility'] . "</p>";
        echo "<p class='part-2'>Criteria: " . $courseRow['criteria'] . "</p>";
        echo "<p class='part-2'>Status: " . $courseRow['status'] . "</p>";
        echo '</div>';
        echo '</div>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
