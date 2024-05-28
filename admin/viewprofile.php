<?php
include "header1.php";
include "../user/dbconnect.php";

$query = "SELECT profile_id, fname, lname, dob, gender, email, phone, passport_number, university, college, course, percentage, certificate FROM profile";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .center-div {
            margin-top: 20px;
            margin-left: 180px;
        }
        .app-container {
            border: 1px solid #ccc;
            width: 1600px;
            height: 500px;
            border-radius: 5px;
            padding: 10px;
            margin: 200px auto;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        button:hover {
            background-color: #005f7f;
            cursor: pointer;
        }
        .bt-rm {
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .bt-rm button:hover {
            background-color: #005f7f;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="center-div">
        <div class="app-container">
            <h2>User Profile</h2>
            <table>
                <tr>
                    <th>Profile ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Passport Number</th>
                    <th>University</th>
                    <th>College</th>
                    <th>Course</th>
                    <th>Percentage</th>
                    <th>Certificate</th>
                    <th>Remove</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($item = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $item['profile_id']; ?></td>
                    <td><?php echo $item['fname']; ?></td>
                    <td><?php echo $item['lname']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['phone']; ?></td>
                    <td><?php echo $item['dob']; ?></td>
                    <td><?php echo $item['gender']; ?></td>
                    <td><?php echo $item['passport_number']; ?></td>
                    <td><?php echo $item['university']; ?></td>
                    <td><?php echo $item['college']; ?></td>
                    <td><?php echo $item['course']; ?></td>
                    <td><?php echo $item['percentage']; ?>%</td>
                    <td><a href="../user/<?php echo $item['certificate']; ?>"><button>Certificate</button></a></td>
                    <td><a href="remove_user.php?id=<?php echo $item['profile_id']; ?>"><button class="bt-rm">Remove</button></a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
