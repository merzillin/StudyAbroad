<?php include "header1.php";
include "dbconnect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>University Information</title>
</head>
<body>
    <?php
    // Retrieve the ID from the URL
    $id=0;
    $id = $_GET['country'];

    

    // Fetching data from the table
    $query = "SELECT university_name,university_id , uimage,location FROM university WHERE country_id = $id";
    $result = mysqli_query($conn, $query);

    // Displaying the data in HTML
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="country">';
      echo "<h2>" . $row['university_name'] . "</h2>";
      echo "<a href='course.php?university=" . urlencode($row['university_id']) . "'>";
      echo "<img src='uploads/" . $row['uimage'] . "' alt='" . $row['university_name'] . "' />";
      echo "</a>";
      echo "<p>" . $row['location'] . "</p>";
      echo '</div>';
  }
  

    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>
