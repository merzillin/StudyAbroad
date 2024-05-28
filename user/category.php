<?php include "header1.php";
include "dbconnect.php"; ?>



<!DOCTYPE html>
<html>
<head>
    <title>Country Information</title>
    <link rel="stylesheet" href="css/show.css">
</head>
<body>
  
    <h1>Course Category Information</h1>

    <?php
    
   
    

    // Fetching data from the table
    $query = "SELECT category_name,category_id FROM category";
    $result = mysqli_query($conn, $query);

    // Displaying the data in HTML
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="country">';

      echo "<a href='category_view.php?category=" . urlencode($row['category_id']) . "'>";
      echo "<h2>" . $row['category_name'] . "</h2>";
      echo "</a>";
     
      echo '</div>';
  }
  

    
    mysqli_close($conn);
    ?>

</body>
</html>
