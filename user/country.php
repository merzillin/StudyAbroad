<?php include "header1.php";
include "dbconnect.php"; ?>



<!DOCTYPE html>
<html>
<head>
    <title>Country Information</title>
    <link rel="stylesheet" href="css/show.css">
</head>
<body>
  
    <h1>Country Information</h1>

    <?php
    
   
    

    // Fetching data from the table
    $query = "SELECT country_name,country_id , image FROM country";
    $result = mysqli_query($conn, $query);

    // Displaying the data in HTML
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="country">';
      echo "<h2>" . $row['country_name'] . "</h2>";
      echo "<a href='university.php?country=" . urlencode($row['country_id']) . "'>";
      echo "<img src='uploads/" . $row['image'] . "' alt='" . $row['country_name'] . "' />";
      echo "</a>";
     
      echo '</div>';
  }
  

    
    mysqli_close($conn);
    ?>

</body>
</html>
