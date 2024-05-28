
<?php include "header1.php" ?>
<body>
  
    <div class="main">
        <div class="container-1">
          <img src="img/img.jpg" alt="Sample Image">
          <div class="text-overlay"><p>Study Abroad</p></div>
          <div class="text-overlay-1"><p><i>" We are here for your Dreams "</i></p></div>
        </div>
      <h1>Welcome to Our Website</h1>
      <p>When it comes to selecting the finest study abroad
consultants,  Study Abroad Consultants in
Ernakulam stand out as a prime choice. As recognized
experts and among the best study abroad
consultants in the field, our agency offers
unparalleled guidance and support to students
seeking international education opportunities.</p>
      
      <h1>Countries</h1>
      <?php
    
   
    
      include "dbconnect.php";
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
      
    </div>
  </div>
</body>
</html>
