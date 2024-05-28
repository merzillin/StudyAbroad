<?php 
include "guestheader.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Gallery</title>
  <style>
.gallery {
  margin-top:80px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.image-container {
  position: relative;
  overflow: hidden;
  margin: 0px;
  transition: transform 0.3s;
}

.image-container img {
  width: 800px;
  height: 300px;
  object-fit: cover;
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  transition: opacity 0.3s;
}

.image-container:hover .image-overlay {
  opacity: 1;
}

.image-container:hover {
  transform: scale(1.1);
}

    </style>
</head>
<body>
<?php
  include "../user/dbconnect.php";

  $sql = "SELECT image_name, image_type, description FROM image";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
?>
      <div class="gallery">
        <div class="image-container">
          <img src="../uploads/<?php echo $row['image_name'];?>" alt="Image">
          <div class="image-overlay">
            
            <h3><?php echo $row['description'];?></h3>
          </div>
        </div>
      </div>
<?php
    }
  }
?>

    <!-- Add more image containers as needed -->
  </div>

  <script>
    
  </script>
</body>
</html>
