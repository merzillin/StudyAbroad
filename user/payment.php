<?php 
include "header1.php";
$amount = $_GET['amount'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Card Payment</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    
    .container-pay {
        margin-top: 40px;
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

h1 {
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
}

input[type="text"] {
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

    </style>
<body>
  <div class="container-pay">
    <h1>Card Payment</h1>
    <form method="POST" onsubmit="return validatepayForm()">
      <label for="cardNumber">Card Number:</label>
      <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter card number" >
      
      <label for="expirationDate">Expiration Date:</label>
      <input type="text" id="expirationDate" name="expirationDate" placeholder="MM/YY" >
      
      <label for="cvv">CVV:</label>
      <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" >
      
      <label for="cardholderName">Cardholder Name:</label>
      <input type="text" id="cardholderName" name="cardholderName" placeholder="Enter cardholder name" >
      
      <label for="transactionAmount">Transaction Amount:</label>
      <input type="text" id="transactionAmount" name="transactionAmount" placeholder="Enter transaction amount" value="<?php echo $amount; ?>" >
      
      <button type="submit">Pay Now</button>
    </form>
  </div>
  <?php
  session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include "dbconnect.php";

    $cardNumber = $_POST['cardNumber'];
    $expirationDate = $_POST['expirationDate'];
    $cvv = $_POST['cvv'];
    $cardholderName = $_POST['cardholderName'];
    if($amount===$_POST['transactionAmount']){
    $transactionAmount = $_POST['transactionAmount'];}
    else{
      echo "<p>Transaction error!</p>";
    }
    $process_time = date("H:i:s");
    $user_id = $_SESSION["user_id"]; 
    $courseid= $_SESSION["course_id"]; 

    $query = "INSERT INTO payment (card_number, expiry_date, cvv, card_holder_name, transaction_amount,process_time, user_id,course) 
              VALUES ('$cardNumber', '$expirationDate', '$cvv', '$cardholderName', '$transactionAmount','$process_time', '$user_id','$courseid')";

   
    if (mysqli_query($conn, $query)) {
        //echo "Payment data inserted successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
<script>
    function validatepayForm() {
      var cardNumber = document.getElementById('cardNumber').value;
      var expirationDate = document.getElementById('expirationDate').value;
      var cvv = document.getElementById('cvv').value;
      var cardholderName = document.getElementById('cardholderName').value;
      var transactionAmount = document.getElementById('transactionAmount').value;

      // Card number validation (16 digits)
      if (cardNumber.length !== 16 || isNaN(cardNumber)) {
        alert('Please enter a valid 16-digit card number');
        return false;
      }

      // Expiration date validation (MM/YY format)
      if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expirationDate)) {
        alert('Please enter a valid expiration date in MM/YY format');
        return false;
      }

      // CVV validation (3 or 4 digits)
      if (cvv.length < 3 || cvv.length > 4 || isNaN(cvv)) {
        alert('Please enter a valid 3 or 4-digit CVV');
        return false;
      }

      // Cardholder name validation (non-empty)
      if (cardholderName.trim() === '') {
        alert('Please enter the cardholder name');
        return false;
      }

      // Transaction amount validation (numeric)
      if (isNaN(transactionAmount)) {
        alert('Please enter a valid transaction amount');
        return false;
      }

      return true; // Form is valid
    }
  </script>
</body>
</html>
