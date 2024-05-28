<?php
include "header1.php";
?>
<html>
<head>
    <style>
        .f-container{
            margin-top:80px;
            margin-left:250px;
        }
        /* Apply basic styling to the table */
table {
  width: 100%;
  border-collapse: collapse;
}

/* Style the table header */
th {
  background-color: #f2f2f2;
  color: #333;
  font-weight: bold;
  padding: 8px;
  text-align: left;
}

/* Style the table rows */
tr:nth-child(even) {
  background-color: #f9f9f9;
}

/* Style the table cells */
td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
/* Style for the button */
button {
  background-color: #87CEFA; /* Light blue color */
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

/* Hover effect */
button:hover {
  background-color: #ADD8E6; /* Lighter shade of blue on hover */
}



        </style>
</head>
<body>
<h2 class="f-container">Feedback Details</h2>
<?php
  include "../user/dbconnect.php"; // Assuming this file contains the database connection details

  $sql = "SELECT f_id, message, Type FROM feedback";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row
  
    echo '<div class="f-container">';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>SL NO</th>';
    echo '<th>Message</th>';
    echo '<th>Type</th>';
    echo '<th>Action</th>';
    echo '</tr>';

    while($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row['f_id'] . '</td>';
      echo '<td>' . $row['message'] . '</td>';
      echo '<td>' . $row['Type'] . '</td>';
      echo '<td><a href="delete_feedback.php?id=' . $row['f_id'] . '"><button>remove</button></a></td>';  
      echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
  } else {
    echo "0 results";
  }
  $conn->close();
?>


</body>
</html>