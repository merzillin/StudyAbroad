<?php
include "header1.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .custom-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .custom-form-group {
            margin-bottom: 20px;
        }
        .custom-label {
            display: block;
            margin-bottom: 5px;
        }
        .custom-input{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .custom-button{
            background-color: #FF5733;
            border: none;
            color: white;
            padding: 10px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <h2>Update Profile</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="custom-form-group">
                <label for="certificate">Update Certificate [include all required certificates]:</label>
                <input type="file" id="certificate" name="certificate" class="custom-update" required>
            </div>
            <div class="custom-form-group-update">
                <input type="submit" class="custom-button" value="Update">
            </div>
        </form>
    </div>
    <?php
    session_start();
    $id = $_SESSION["user_id"];
    echo "$id";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "dbconnect.php";

        if (isset($_FILES['certificate'])) {
            $certificateName = $_FILES['certificate']['name'];
            $certificateTempName = $_FILES['certificate']['tmp_name'];
            $uploadfileDirectory = 'certificate/'; 
            $certificatePath =  $uploadfileDirectory.$certificateName; 
            move_uploaded_file($certificateTempName, $certificatePath);
        } else {
            echo "<p>Certificate file not uploaded</p>";
        }

        $query = "UPDATE profile set certificate='$certificatePath' where user_id='$id';";
    
        
        if (mysqli_query($conn, $query)) {
            echo "Record Update successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
