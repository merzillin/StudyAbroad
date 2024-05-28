<?php include "header1.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Feedback Hub</title>
  <style>
    /* body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
} */

.container-feed {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  margin-bottom: 20px;
}

.form-group-feed {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input,
select,
textarea {
  width: 90%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.feedbutton button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.feedbutton button:hover {
  background-color: #0056b3;
}

    </style>
</head>
<body>
  <div class="container-feed">
    <h1>Feedback Hub & FAQ</h1>
    <p>Welcome to our Feedback Hub! We value your thoughts and opinions, and we're dedicated to creating the best experience for our users. Your feedback helps us understand how we can improve and tailor our services to meet your needs. Please take a moment to share your thoughts with us.</p>
    <form method="post">
    
      <div class="form-group-feed">
        <label for="feedback-type">Feedback Type:</label>
        <select id="feedback-type" name="feedback-type">
          <option value="general">General Feedback</option>
          <option value="bug">Bug Report</option>
          <option value="feature">Feature Request</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group-feed">
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" ></textarea>
      </div>
      <button class="feedbutton" type="submit">Submit</button>
    </form>
    <p>Thank you for taking the time to share your feedback with us. We appreciate your input and will use it to enhance our services. If you have any urgent concerns, 
        please don't hesitate to contact our support team at <a href="mailto:study_abroad@gmail.com">study_abroad@.com</a>.</p>
    <p>We look forward to hearing from you and using your feedback to make our services even better!</p>
  </div>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  include "dbconnect.php";
    session_start();
    $user_id=$_SESSION['user_id'];
    $ftype=$_POST['feedback-type'];
    $message=$_POST['message'];

    $sql = "INSERT INTO feedback (Type,message,user_id) VALUES ('$ftype', '$message', '$user_id')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
}
  ?>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").addEventListener("submit", function(event) {
      var feedbackType = document.getElementById("feedback-type").value;
      var message = document.getElementById("message").value;

      if (feedbackType === "" || message === "") {
        alert("Please fill out all the fields");
        event.preventDefault();
      }
    });
  });
</script>
</body>
</html>
