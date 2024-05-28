<?php
include "header1.php";
include "dbconnect.php";

session_start();
$id=$_SESSION["user_id"];

$query = "SELECT u.profile_pic, p.fname, p.lname, p.phone, p.email, DATE_FORMAT(p.dob, '%d/%m/%Y') AS dob, p.gender, p.passport_number, p.university, p.course, p.college, p.percentage, p.certificate
FROM user u
JOIN profile p ON u.user_id = p.user_id
WHERE u.user_id = '$id';";
$result = mysqli_query($conn, $query);

if ($result) {
        $row = mysqli_fetch_assoc($result);
    $profile_pic = $row['profile_pic'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $phone = $row['phone'];
    $email = $row['email'];
    $dob = $row['dob']; 
    $gender = $row['gender'];
    $passnum = $row['passport_number'];
    $university = $row['university'];
    $course = $row['course'];
    $college = $row['college'];
    $percentage = $row['percentage'];
    $certificate = $row['certificate'];
}




?>
<html>
    <head>
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
            align-items:center;
        }
        .custom-form-group {
            margin-bottom: 20px;
            padding-left:30px;
        }
        .custom-label {
            display: block;
            margin-bottom: 5px;
        }
        .custom-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .custom-radio-group {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        #custom-form-group2 a {
            
            background-color: #4CAF50;
            color: white;
            padding: 14px 269px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none; /* Added to remove underline from the anchor */

        }
        
        #custom-form-group2 a:hover {
            background-color: #45a049;
        }
        #custom-form-group2 a {
            margin-top:10px;
        }
        
        #custom-form-group a {
            
    background-color: #2e9dd4;
    color: white;
    padding: 14px 200px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none; /* Added to remove underline from the anchor */
}

#custom-form-group a:hover {
    background-color: #1c7dab;
}
.profile-photo {
  width: 350px;
  height: 350px;
  align-items:center;
  margin-left:100px;
  object-fit: cover;
  border-radius: 70%; /* Create a circular shape */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow effect */
}
.custom-form-group-update{
    background-color: #7F00FF;
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
/* Add this CSS code to your style.css file */
.table-container {
  margin-top: 20px;
}

.custom-table {
  width: 100%;
  border-collapse: collapse;
}

.custom-table td {
  padding: 8px;
  text-align: left;
  border: none;
}

    
            </style>
</head>
<body>
<div class="custom-container">
        <h2>Profile Information</h2>
        <form action="profile.php" method="post">
        <div class="custom-form-group">
        <a href="../profile<?php echo $profile_pic; ?>" target="_blank">
    <img class="profile-photo" src="../profile/<?php echo $profile_pic; ?>" alt="User Profile Photo">
</a>

</div>

<div class="table-container">
  <table class="custom-table">
    <tr>
      <td>First Name:</td>
      <td><?php echo $fname; ?></td>
    </tr>
    <tr>
      <td>Last Name:</td>
      <td><?php echo $lname; ?></td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td><?php echo $phone; ?></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><?php echo $email; ?></td>
    </tr>
    <tr>
      <td>Date of Birth:</td>
      <td><?php echo $dob; ?></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><?php echo $gender; ?></td>
    </tr>
    <tr>
      <td>Passport Number:</td>
      <td><?php echo $passnum; ?></td>
    </tr>
    <tr>
      <td>University Studied:</td>
      <td><?php echo $university; ?></td>
    </tr>
    <tr>
      <td>College Studied:</td>
      <td><?php echo $college; ?></td>
    </tr>
    <tr>
      <td>Course:</td>
      <td><?php echo $course; ?></td>
    </tr>
    <tr>
      <td>Percentage:</td>
      <td><?php echo $percentage; ?></td>
    </tr>
  </table>
</div>

            <div class="custom-form-group">
    <label class="custom-label">Certificate Attached:</label>
    <a href="../user/<?php echo $certificate; ?>" target="_blank">
        <button type="button">View Certificate</button>
    </a>
</div>
<?php
$query="SELECT course from payment where user_id='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $course=$row['course'];
}
$query="SELECT course_name from course where course_id='$course'";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    
?>
<label class="custom-label">Course Applied : <?php echo $row['course_name']; ;?></label>
<?php
}

?>
<a href="updateprofile.php">
<div class="custom-form-group-update">
        Update Profile
</div>
</a>
<a href="updateprofile_pic.php">
<div class="custom-form-group-update">
        Update Profile Picture
   </div>
   </a>



</body>