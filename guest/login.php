<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        
        body {
    font-family: Arial, sans-serif;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: url("../user/img/background2.gif");
    background-size: cover; /* Adjust as needed */
    background-position: center; /* Adjust as needed */
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(255, 255, 255, 0.2); /* Adjust the opacity as needed */
    z-index: -1;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    transition: transform 0.3s ease;
}

        .login-container:hover {
            transform: scale(1.05);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #4caf50;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
        }
        .login-image {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }
        .reg{
            background-color: grey;
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
        .reg button{
            background-color: black;
            color: white;
  padding: 10px 12px;
  text-align: center;
        }
    </style>
</head>
<body>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include "../user/dbconnect.php";

    $input_username = $_POST["email"];
    $input_password = $_POST["password"];

        // Prepare a SQL query to fetch the user from the database
        $sql = "SELECT user_id,email,password,user_type FROM user WHERE email = '$input_username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User found, verify the password
            $row = $result->fetch_assoc();
            if (($input_password === $row["password"]) && $row["user_type"]=='admin') {
                              
                echo "<script>alert('Login successful ');</script>";
                header("Location: ../admin/category.php");
            } 
            elseif (($input_password === $row["password"]) && $row["user_type"]=='user') {
                
                $_SESSION["user_id"] = $row["user_id"];
                echo "<script>alert('Login successful');</script>";
                header("Location: ../user/index.php");
                
            }else {
                // Invalid password
                echo "<script>alert('Invalid password');</script>";
            }
        } else {
            // User not found
            echo "<script>alert('Invalid username');</script>";
        }

        $conn->close();
}
?>
<div class="login-container">
    <img class="login-image" src="../user/img/login.gif" alt="Login Image">
    <h2>Login</h2>

   

    <?php if (isset($error_message)) { ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php } ?>

    <form action="login.php" method="post">
        <div>
            <label for="username">User Email:</label>
            <input type="text" id="username" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
    <div class="reg">
    <label>Not a Member !</label>
    <a href="registration.php" target="_blank">
        <button type="button">Register Here</button>
    </a>
    </div>
</div>
<?php

?>
 
</body>
</html>
<?php
    // Example error message handling
    $error_message = "Invalid email or password";
    ?>