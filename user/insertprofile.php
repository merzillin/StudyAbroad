<?php include "header1.php"; 
    session_start();
    $id=$_SESSION["user_id"];
    //echo "<p>$id</p>";
    
    
    ?>
    

<html>
<head>
   
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
     input[type="submit"]{
            background-color: #4caf50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
         input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
     
</head>
<body>
   
<div class="custom-container">
        <h2>User Information Form</h2>
        <form  method="POST" enctype="multipart/form-data" >
            <div class="custom-form-group">
                <label for="fname" class="custom-label">First Name:</label>
                <input type="text" id="fname" name="fname" class="custom-input" >
                <span id="ufnameError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="lname" class="custom-label">Last Name:</label>
                <input type="text" id="lname" name="lname" class="custom-input" >
                <span id="ulnameError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="phone" class="custom-label">Phone:</label>
                <input type="tel" id="phone" name="phone" class="custom-input" >
                <span id="uphoneError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="email" class="custom-label">Email:</label>
                <input type="email" id="email" name="email" class="custom-input" >
                <span id="uemailError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="dob" class="custom-label">Date of Birth:</label>
                <input type="date" id="dob" name="dob" class="custom-input">
                <span id="udobError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label class="custom-label">Gender:</label>
                <div class="custom-radio-group">
                    <input type="radio" id="male" name="sex" value="male" >
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="sex" value="female" >
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="sex" value="other" >
                    <label for="other">Other</label>
                </div>
                <span id="ugenderError" style="color:red"></span>
            </div>
            <div class="custom-form-group">
                <label for="passport_number" class="custom-label">Passport Number:</label>
                <input type="text" id="passport_number" name="passport_number" class="custom-input">
                <span id="upassError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="university" class="custom-label">University:</label>
                <input type="text" id="university" name="university" class="custom-input">
                <span id="universityError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="college" class="custom-label">College:</label>
                <input type="text" id="college" name="college" class="custom-input" >
                <span id="collegeError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="course" class="custom-label">Course:</label>
                <input type="text" id="course" name="course" class="custom-input" >
                <span id="courseError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="percentage" class="custom-label">Percentage:</label>
                <input type="number" id="percentage" name="percentage" class="custom-input" >
                <span id="percentageError" style="color:red"></span><br>
            </div>
            <div class="custom-form-group">
                <label for="certificate">Upload Certificate [include all requried certificate] :</label>
                <input type="file" id="certificate" name="certificate"  class="custom-input" >
                <span id="certificateError" style="color:red"></span><br>
            </div>
            
             <div class="custom-form-group">
                <input type="submit" class="custom-input" id="submit"  value="Submit" onclick="return validateprofile()">
            </div>
        </form>
    </div>
    <script>
document.getElementById('submit').addEventListener('click', function(event) {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;
    var dob = document.getElementById('dob').value;
    var gender = document.querySelector('input[name="sex"]:checked');
    var passportNumber = document.getElementById('passport_number').value;
    var university = document.getElementById('university').value;
    var college = document.getElementById('college').value;
    var course = document.getElementById('course').value;
    var percentage = document.getElementById('percentage').value;
    var certificate = document.getElementById('certificate').value;

    var isValid = true;

    if (fname === '') {
        document.getElementById('ufnameError').textContent = 'Please enter your first name';
        isValid = false;
    } else {
        document.getElementById('ufnameError').textContent = '';
    }

    if (lname === '') {
        document.getElementById('ulnameError').textContent = 'Please enter your last name';
        isValid = false;
    } else {
        document.getElementById('ulnameError').textContent = '';
    }

    if (phone === '') {
        document.getElementById('uphoneError').textContent = 'Please enter your phone number';
        isValid = false;
    } else {
        document.getElementById('uphoneError').textContent = '';
    }
    if (email === '') {
        document.getElementById('uemailError').textContent = 'Please enter your email';
        isValid = false;
    } else {
        document.getElementById('uemailError').textContent = '';
    }

    // Add similar validation for other fields

    if (!gender) {
        document.getElementById('ugenderError').textContent = 'Please select your gender';
        isValid = false;
    } else {
        document.getElementById('ugenderError').textContent = '';
    }
    if (passsportnumber === '') {
        document.getElementById('upassError').textContent = 'Please enter your passport number';
        isValid = false;
    } else {
        document.getElementById('upassError').textContent = '';
    }
    if (university === '') {
        document.getElementById('uuniversityError').textContent = 'Please enter your university name';
        isValid = false;
    } else {
        document.getElementById('uuniversityError').textContent = '';
    }
    if (college === '') {
        document.getElementById('ucollegeError').textContent = 'Please enter your college name';
        isValid = false;
    } else {
        document.getElementById('ucollegeError').textContent = '';
    }
    if (course === '') {
        document.getElementById('ucourseError').textContent = 'Please enter your course';
        isValid = false;
    } else {
        document.getElementById('ucourseError').textContent = '';
    }
    if (percentage === '') {
        document.getElementById('upercentageError').textContent = 'Please enter your percentage';
        isValid = false;
    } else {
        document.getElementById('upercentageError').textContent = '';
    }
    if (certificate === '') {
        document.getElementById('certificateError').textContent = 'Please upload your certificate';
        isValid = false;
    } else {
        document.getElementById('certificateError').textContent = '';
    }

    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});

    </script>
    <?php
    $id=$_SESSION["user_id"];
    echo "<p>$id</p>";

    if (isset($_POST["submit"])) {
       
        include "dbconnect.php";

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $sex=$_POST['sex'];
        $passport_number = $_POST['passport_number'];
        $university = $_POST['university'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $percentage = $_POST['percentage'];
        $user_id=$_SESSION["user_id"];
        
       

    
        
        if (isset($_FILES['certificate'])) {
            $certificateName = $_FILES['certificate']['name'];
            $certificateTempName = $_FILES['certificate']['tmp_name'];
            $uploadfileDirectory = 'certificate/'; 
            $certificatePath =  $uploadfileDirectory.$certificateName; 
            move_uploaded_file($certificateTempName, $certificatePath);
        } else {
            echo "<p>Certificate file not uploaded</p>";
        }

        $query = "INSERT INTO profile (fname, lname, dob, gender, email, phone, passport_number, university, college, course, percentage, certificate, user_id) 
                   VALUES ('$fname', '$lname', '$dob', '$sex', '$email', '$phone', '$passport_number', '$university', '$college', '$course', '$percentage', '$certificatePath',  '$user_id')";
    
        
        if (mysqli_query($conn, $query)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }  

        
    
//    $errors =array();
//    if (empty($fname)  ) {
//     $errors['fname'] = "First Name is required";
// } 
// elseif ((!preg_match("/^[a-zA-Z\s]+$/", $fname)))
// {
//     $errors['fname'] = "First Name should contains Alphabets";
// }
// elseif(empty($lname)){
//     $errors['lname']="Last Name is required";
// }
// elseif ((!preg_match("/^[a-zA-Z\s]+$/", $lname)))
// {
//     $errors['lname'] = "Last Name should contains Alphabets";
// }
// elseif(empty($phone)){
//     $errors['phone']="Phone Number is required";
// }
// elseif((!preg_match ("/^[0-9]*$/", $phone) )){
//     $errors['phone']="Phone Number is required";
// }
// elseif (empty($email)){
//     $errors['email'] = "Email is  Required";
// }
// elseif (empty($dob)){
//     $errors['dob'] = "DOB is  Required";
// }
// elseif (empty($sex)){
//     $errors['sex'] = "Sex is  Required";
// }
// elseif (empty($passport_number)){
//     $errors['passport_number'] = "Passport Number is  Required";
// }
// elseif (empty($university)){
//     $errors['university'] = "University Name is  Required";
// }
// elseif ((!preg_match("/^[a-zA-Z\s]+$/", $university)))
// {
//     $errors['university'] = "University Name should contains Alphabets";
// }
// elseif (empty($college)){
//     $errors['College'] = "College Name is  Required";
// }
// elseif ((!preg_match("/^[a-zA-Z\s]+$/", $college)))
// {
//     $errors['college'] = "College Name should contains Alphabets";
// }
// elseif (empty($course)){
//     $errors['course'] = "Course Name is  Required";
// }
// elseif ((!preg_match("/^[a-zA-Z\s]+$/", $course)))
// {
//     $errors['course'] = "course Name should contains Alphabets";
// }
// elseif (empty($percentage)){
//     $errors['percentage'] = "Percentage is  Required";
// }
// elseif (!preg_match ("/^[0-9]*$/", $mobileno) ){
//     $errors['percentage'] = "Only Numbers permitted";
// }
// elseif (empty($certificatePath)){
//     $errors['certificate'] = "Certificate required";
// }
// else{

// }

// if (!empty($errors)){
//     foreach ($errors as $field => $error) {
//         echo "<p>Error at $error</p>";
//     }
// }
// else{
    
//         $query = "INSERT INTO profile (fname, lname, dob, gender, email, phone, passport_number, university, college, course, percentage, certificate, user_id) 
//                   VALUES ('$fname', '$lname', '$dob', '$sex', '$email', '$phone', '$passport_number', '$university', '$college', '$course', '$percentage', '$certificatePath',  '$user_id')";
    
        
//         if (mysqli_query($conn, $query)) {
//             echo "Record inserted successfully";
//         } else {
//             echo "Error: " . $query . "<br>" . mysqli_error($conn);
//         }
        
    }
    ?>
    
   

    
    </body>
    </html>