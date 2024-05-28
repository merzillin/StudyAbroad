<?php 
include "header1.php";
include "dbconnect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Course, Country, and University Information</title>
    <link rel="stylesheet" href="css/course.css">
    <style>
        /* Add your CSS styles here */
        .course-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .course {
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            text-align: center;
        }
        .course img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .custom-form-group a {
    background-color: #2e9dd4;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none; /* Added to remove underline from the anchor */
}

.custom-form-group a:hover {
    background-color: #1c7dab;
}
    </style>
</head>
<body>
    <h1>Course Information</h1>

    <div class="course-container">
        <?php
        $id = $_GET['course'];
    session_start();
    $_SESSION['course_id']=$id;
        
        $courseQuery = "SELECT c.course_name, c.duration, c.eligibility, c.criteria, c.status, c.syllabus, u.university_name, u.location, co.country_name
                        FROM course c
                        INNER JOIN university u ON c.university_id = u.university_id
                        INNER JOIN country co ON c.country_id = co.country_id
                        WHERE c.course_id = $id";
        $courseResult = mysqli_query($conn, $courseQuery);

        while ($row = mysqli_fetch_assoc($courseResult)) {
            echo '<div class="course">';
            echo "<h2>" . $row['course_name'] . "</h2>";
            echo "<p>Duration: " . $row['duration'] . "</p>";
            echo "<p>Eligibility: " . $row['eligibility'] . "</p>";
            echo "<p>Criteria: " . $row['criteria'] . "</p>";
            echo "<p>Status: " . $row['status'] . "</p>";
            echo "<p>Syllabus: <a href='../uploads/" . $row['syllabus'] . "'>View Syllabus</a></p>";
            echo "<p>University: " . $row['university_name'] . "</p>";
            echo "<p>Location: " . $row['location'] . "</p>";
            echo "<p>" . $row['country_name'] . "</p>";
            echo '<div class="custom-form-group"> <a href="payment.php?amount=1000">APPLY</a></div>';
            echo '</div>';
            
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
