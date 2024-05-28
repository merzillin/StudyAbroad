<?php 

 require('../config/autoload.php'); 
include("header1.php");
$cid = $_GET['id'];
$file=new FileUpload();
$elements=array(
        "uname"=>"","location"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('uname'=>"university Name",'des'=>"university Location" );

$rules=array(
    "uname"=>array("required"=>true,"minlength"=>3,"maxlength"=>50,),
    "location"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
   

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	

    $uname=$_POST['uname'];
    $location=$_POST['location'];
    $sql = "UPDATE university SET university_name = '$uname', location = '$location' WHERE university_id = $cid";
    include "../user/dbconnect.php";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('New record created successfully');</script> ";
header('location:view_university.php');
      } else {
        {$msg="Registration failed";} ?>
      
      <span style="color:red;"><?php echo $msg; ?></span>
<?php
      }
}}
?>


<html>
<head>
    
</head>
<body>
<div class="loading-spinner">
<h2 class="row" >Update University</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            University Name:
            <?php
            $cid = $_GET['id'];
            #echo $cid;
            include "../user/dbconnect.php";
            $query = "SELECT university_name,location FROM university WHERE university_id=$cid";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <input type="text" name="uname" class="" value="<?php echo $row['university_name']; ?>"><br>
                <?= $validator->error('uname'); ?>
                Location:
                <input type="text" name="location" class="" value="<?php echo $row['location']; ?>"><br>
                <?= $validator->error('location'); ?>

                <?php
            }
            ?>
        </div>
    </div>
    <div class="row">
        <button type="submit" name="btn_insert">Update</button>
    </div>
</form>


</body>

</html>


