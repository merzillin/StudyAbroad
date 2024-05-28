<?php
include "../user/dbconnect.php";
include "header1.php";
$query = "SELECT pay_id,course,user_id from payment where status=1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user = $row['user_id'];
        $course = $row['course'];

        $sql = "SELECT * from profile WHERE user_id='$user'";
        $out = $conn->query($sql);

        if ($out->num_rows > 0) {
            $item = $out->fetch_assoc();

            $sql2 = "SELECT course_name,university_id,country_id from course WHERE course_id='$course'";
            $out2 = $conn->query($sql2);
            if ($out2->num_rows > 0) {
                $item2 = $out2->fetch_assoc();
                $uni = $item2['university_id'];
                $cid = $item2['country_id'];

                $sql3 = "SELECT c.country_name,u.university_name from country c, university u where u.university_id='$uni' and c.country_id='$cid'";
                $out3 = $conn->query($sql3);
                if ($out3->num_rows > 0) {
                    $item3 = $out3->fetch_assoc();
                
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .center-div{
            margin-top:50px;
            margin-left:180px;
        }
        .app-container {
            border: 1px solid #ccc;
            width: 1600px;
            height:500px;
            border-radius: 5px;
            padding: 10px;
            margin: 200px auto; /* Updated margin to center the container horizontally */
            text-align: center;
        }
        table {
            width: 100%; /* Updated width to 100% */
            margin-top: 20px; /* Updated margin to add space above the table */
            border: 1px solid #ccc;
            border-collapse: collapse; /* Added to collapse the border spacing */
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2; /* Added background color for table header */
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
  background-color: #005f7f; /* Darker shade of blue on hover */
  cursor: pointer; /* Change cursor to pointer on hover */
}
.item{
    font-size:20px;
}
    </style>
</head>
<body>
    <div class="center-div">
    <div class="app-container">
        <h2>Application Processing</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Course</th>
                <th>university</th>
                <th>Country</th>
                <th>Remove</th>
            </tr>
            <tr>
                <p class="item">
                <td><?php echo $item['fname']; ?></td>
                <td><?php echo $item['lname']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['phone']; ?></td>
                <td><?php echo $item2['course_name']; ?></td>
                <td><?php echo $item3['university_name']; ?></td>
                <td><?php echo $item3['country_name']; ?></td></p>
                <td><a href="remove_app.php?id=<?php echo $row['pay_id']; ?>"><button>Remove</Button></a></td>
            </tr>
            <?php
            }
        }
    }
}
}
else{
    ?>
    <div class="app-container" style="margin-left:250px;">
    <h2>No Application to Display</h2>
</div>
    <?php
}
?>
        </table>
    </div>
    </div>
</body>
</html>
