
<?php include "guestheader.php" ?>
<head>

</head>
<body>

    <div class="main">
        <div class="container-1">
          <img src="../user/img/img.jpg" alt="Sample Image">
          <div class="text-overlay"><p>Study Abroad</p></div>
          <div class="text-overlay-1"><p><i>" We are here for your Dreams "</i></p></div>
        </div>
      <h1>Welcome to Our Website</h1>
      <p>Study Abroad is a top Leading Study Abroad Agency, Because we give the Best out of Best.</p>
      <button>Learn More</button>
      <h1>Countries</h1>
      <?php
    
   
    
      include "../user/dbconnect.php";
    // Fetching data from the table
    $query = "SELECT country_name,country_id , image FROM country";
    $result = mysqli_query($conn, $query);

    // Displaying the data in HTML
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="country" id="country">';
      echo "<h2>" . $row['country_name'] . "</h2>";
      echo "<img src='../uploads/" . $row['image'] . "' alt='" . $row['country_name'] . "' />";
      echo "</a>";
     
      echo '</div>';
  }
  

    
    mysqli_close($conn);
    ?>
      
    </div>
    <div class="containe-about">
    <h1 style="padding-top:30px;">About Us</h1>
        <div class="image-container">
            <img src="../user/img/img.jpg" alt="Company Logo">
        </div>
        <div class="info-container">
            
            <p>ORION Study Abroad Pvt. Ltd, established in the year 2002 is one of the best study abroad consultants, headquartered in Kochi, Kerala, India , headed by its founder and Managing Director Mr. Ajay Babu an astute businessman, illustrious Author, Blogger,
                 philanthropist social worker and sports administrator.The company offers end to end study abroad facilitation services. It’s the authorized representative of 600+ top-notch Universities/ Colleges from over 20+ countries, with branches and associate offices in virtually all districts/
                  cities of Kerala and key Indian cities. The brand today has become synonymous with quality and reliability for hand -holding students wishing to study abroad in the best of overseas educational institutions across the globe, paving the way to phenomenal international academic success and
                   rewarding careers for thousands of students which has earned unwavering trust and patronage of students and parents alike.</p>
            <p>Complementing the management is a team of highly trained motivated professionals with years of experience and skill with international exposure . Team StudyAbroad owes its success to the unwavering dedication, ethics, professional practices, continuous investment in staff training, the use of 
                state of the art technology, and above all to its ‘’client first’’ policy”.</p>
            <p>Contact us at: info@company.com</p>
        </div>
    </div>
  </div>
</body>
</html>
