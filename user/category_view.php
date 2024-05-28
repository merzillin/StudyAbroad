<?php 
include "header1.php";
include "dbconnect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>University and Course Information</title>
    <link rel="stylesheet" href="css/course.css">
    <style>
        /* Add your CSS styles here */
        .university-3-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .university-3 {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            text-align: center;
        }
        
        
    </style>
</head>
<body>
    <h1>University and Course Information</h1>

    <div class="university-container">
        <?php
        $id = $_GET['category'];

        // Fetch and display course and university information
        $courseQuery = "SELECT c.course_id,c.course_name, c.duration, c.eligibility, c.criteria, c.status, c.university_id, u.university_name, u.location 
                        FROM course c
                        INNER JOIN university u ON c.university_id = u.university_id
                        WHERE c.category_id = $id";
        $courseResult = mysqli_query($conn, $courseQuery);

        while ($row = mysqli_fetch_assoc($courseResult)) {
            echo '<div class="university-3">';
             echo "<a href='courseone.php?course=" . urlencode($row['course_id']) . "'>";
            echo "<h2>" . $row['course_name'] . "</h2>";
            echo "</a>";
            echo "<h3>" . $row['university_name'] . "</h3>";
            echo '<p>Location: ' . $row['location'] . '</p>';
            echo "<p>Duration: " . $row['duration'] . "</p>";
            echo "<p>Eligibility: " . $row['eligibility'] . "</p>";
            echo "<p>Criteria: " . $row['criteria'] . "</p>";
            echo "<p>Status: " . $row['status'] . "</p>";
            
            echo '</div>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
