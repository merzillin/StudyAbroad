<?php include "header1.php"; ?>
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
        
        .custom-form-group2 a {
            
            background-color: #4CAF50;
            color: white;
            padding: 14px 269px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none; /* Added to remove underline from the anchor */

        }
        
        .custom-form-group2 a:hover {
            background-color: #45a049;
        }
        .custom-form-group2 a {
            margin-top:10px;
        }
        
        .custom-form-group a {
            
    background-color: #2e9dd4;
    color: white;
    padding: 14px 284px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none; /* Added to remove underline from the anchor */
}

.custom-form-group a:hover {
    background-color: #1c7dab;
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

<?php
session_start();
$id=$_SESSION["user_id"];
//echo "<p>$id</p>";
include "dbconnect.php";

$query = "SELECT fname, lname, dob, gender, email, phone, passport_number,university, college, course,percentage FROM profile WHERE user_id='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);

?>

<body>
    
   <div class="custom-container">
    <h2>Update Profile</h2>
    <form method="post" onsubmit="return validateupdateForm()">
        <div class="custom-form-group">
            <label for="fname" class="custom-label">First Name:</label>
            <input type="text"  name="fname" class="custom-input" value="<?php echo $row['fname']; ?>" required>
        </div>
        <div class="custom-form-group">
            <label for="lname" class="custom-label">Last Name:</label>
            <input type="text"  name="lname" class="custom-input" value="<?php echo $row['lname']; ?>" required>
        </div>
        <div class="custom-form-group">
            <label for="phone" class="custom-label">Phone:</label>
            <input type="text"  name="phone" class="custom-input" value="<?php echo $row['phone']; ?>" required>
        </div>
        <div class="custom-form-group">
            <label for="email" class="custom-label">Email:</label>
            <input type="email"  name="email" class="custom-input" value="<?php echo $row['email']; ?>" required>
        </div>
        <div class="custom-form-group">
            <label for="dob" class="custom-label">Date of Birth:</label>
            <input type="date"  name="dob" class="custom-input" value="<?php echo $row['dob']; ?>" required>
        </div>
        <div class="custom-form-group">
            <label class="custom-label">Gender:</label>
            <div>
                <input type="radio"  name="gender" value="male" <?php if ($row['gender'] === 'male') echo 'checked'; ?>>
                <label for="male">Male</label>
                <input type="radio"  name="gender" value="female" <?php if ($row['gender'] === 'female') echo 'checked'; ?>>
                <label for="female">Female</label>
                <input type="radio"  name="gender" value="other" <?php if ($row['gender'] === 'other') echo 'checked'; ?>>
                <label for="other">Other</label>
            </div>
        </div>
        <div class="custom-form-group">
                <label for="passport_number" class="custom-label">Passport Number:</label>
                <input type="text"  name="passport_number" class="custom-input" value="<?php echo $row['passport_number']; ?>" required>
            </div>
            <div class="custom-form-group">
                <label for="university" class="custom-label">University:</label>
                <input type="text" name="university" class="custom-input" value="<?php echo $row['university']; ?>" required>
            </div>
            <div class="custom-form-group">
                <label for="college" class="custom-label">College:</label>
                <input type="text"  name="college" class="custom-input" value="<?php echo $row['college']; ?>" required>
            </div>
            <div class="custom-form-group">
                <label for="course" class="custom-label">Course:</label>
                <input type="text"  name="course" class="custom-input" value="<?php echo $row['course']; ?>" required>
            </div>
        <div class="custom-form-group">
            <label for="percentage" class="custom-label">Percentage:</label>
            <input type="text"  name="percentage" value="<?php echo $row['percentage']; ?>" required>
        </div>
        <div class="custom-form-group-update">
            <input type="submit" class="custom-button" value="Update">
        </div>
        <div class="custom-form-group-update">
        <a href="update_certificate.php">
        <button type="button">update Certificate</button>
    </a>
        </div>
        
    </form>
</div>

            <br>
            <?php 
}

$id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "dbconnect.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $passport_number = $_POST['passport_number'];
    $university = $_POST['university'];
    $college = $_POST['college'];
    $course = $_POST['course'];
    $percentage = $_POST['percentage'];

    $sql = "UPDATE profile SET fname='$fname', lname='$lname', phone='$phone', email='$email', dob='$dob', gender='$gender', passport_number='$passport_number', university='$university', college='$college', course='$course', percentage='$percentage' WHERE user_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../user/profile.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

?>


            

          </div>          
        </form>
    </div>
    <script>
        function validateupdateForm() {
            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;
            var dob = document.getElementById('dob').value;
            var passportNumber = document.getElementById('passport_number').value;
            var university = document.getElementById('university').value;
            var college = document.getElementById('college').value;
            var course = document.getElementById('course').value;
            var percentage = document.getElementById('percentage').value;

            if (fname.trim() === '') {
                alert('Please enter the first name');
                return false;
            }

            if (lname.trim() === '') {
                alert('Please enter the last name');
                return false;
            }

            if (phone.trim() === '') {
                alert('Please enter the phone number');
                return false;
            }

            if (email.trim() === '') {
                alert('Please enter the email');
                return false;
            }

            if (dob.trim() === '') {
                alert('Please enter the date of birth');
                return false;
            }

            if (passportNumber.trim() === '') {
                alert('Please enter the passport number');
                return false;
            }

            if (university.trim() === '') {
                alert('Please enter the university');
                return false;
            }

            if (college.trim() === '') {
                alert('Please enter the college');
                return false;
            }

            if (course.trim() === '') {
                alert('Please enter the course');
                return false;
            }

            if (percentage.trim() === '' || isNaN(percentage)) {
                alert('Please enter a valid percentage');
                return false;
            }

            return true; // Form is valid
        }
    </script>
    </body>
    </html>