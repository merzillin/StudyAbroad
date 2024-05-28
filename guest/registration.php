<?php include "guestheader.php";?>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .reg-container {
  max-width: 400px;
  margin: 80px auto; 
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .row {
            
            input[type="text"],
            input[type="number"],
        input[type="password"],
        input[type="email"],
        input[type="date"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="file"]{
            display: block;
            width: 50%;
            padding: 10px;
            background-color: grey;
            color: #fff;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        input[type="file"]:hover {
            background-color: orange;
            margin-bottom: 20px;
        }

        .btn_insert{
            display: block;
            width: 30%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn_insert:hover {
            background-color: #45a049;
            margin-bottom: 20px;
        }
        
        }
        .col-md-6{
            padding:10px;
        }
        </style>
         <script src="src/validator.js">
            
        </script>
</head>
    <body>
       
    <div class="reg-container">
        <h2 class="row" >User Registraiton</h2>
        <form action="" method="POST" enctype="multipart/form-data" >
<div class="row">
    <div class="col-md-6">
        <label>User Name </label>
        <input type="text" name="uname" id="uname" >
        <span id="unameError" style="color:red"></span><br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label>User Phone </label>
        <input type="number" name="phone" id="phone" >
        <span id="uphoneError" style="color:red"></span><br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label>User Email </label>
        <input type="email" name="mail" id="mail" >
        <span id="uemailError" style="color:red"></span><br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label>Date of  Birth </label>
        <input type="date" name="dob" id="dob" >
        <span id="udobError" style="color:red"></span><br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label>Profile Photo </label>
        <input type="file" name="uimg" id="uimg" >
        <span id="upicError" style="color:red"></span><br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label>Password </label>
        <input type="password" name="pass" id="pass" >
        <span id="upassError" style="color:red"></span><br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label>Confirm Password </label>
        <input type="password" name="cpass" id="cpass" >
        <span id="ucpassError" style="color:red"></span><br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <input type="submit" name="submit" id="submit" value="Submit" class="btn_insert" onclick="return validate()"><br>
    </div>
    </div>
    </form>
    </div>
    </div>
<?php
include "../user/dbconnect.php";
if(isset($_POST["submit"]))
{
    $uname = $_POST['uname'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'];
    $dob = $_POST['dob'];
    $password = $_POST['pass'];

    if (isset($_FILES['uimg'])) {
        $imageName = $_FILES['uimg']['name'];
        $imageTempName = $_FILES['uimg']['tmp_name'];
        $uploadfileDirectory = 'profile/'; 
        $imagePath =  $uploadfileDirectory.$imageName; 
        move_uploaded_file($imageTempName, $imagePath);
    } else {
        echo "<p>Profile photo not uploaded</p>";
    }

    $sql = "INSERT INTO user (username, phone, email, dob, password, user_type,profile_pic) 
    VALUES ('$uname', '$phone', '$email', '$dob', '$password','user','$imageName')";
   // print_r($uname,$phone,$email,$dob,$password,$imageName);
if (mysqli_query($conn, $sql)) {
    echo "New record inserted successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
    </body>
    </html>