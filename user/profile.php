<?php include "header1.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <style>
 

    </style>
</head>

<?php
session_start();
$id=$_SESSION["user_id"];
echo "<p>$id</p>";
include "dbconnect.php";
$query1 = "SELECT fname FROM profile WHERE user_id='$id'";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);
if(isset($row1['fname'])) {
    header("Location: ../user/viewprofile.php");
} else {
    header("Location: ../user/insertprofile.php");
}

?>

<body>
    

            <br>
            <?php 



?>

            

          </div>          
        </form>
    </div>
    </body>
    </html>