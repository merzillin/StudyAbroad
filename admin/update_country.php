<?php 

 require('../config/autoload.php'); 
include("header1.php");
$cid = $_GET['id'];
$file=new FileUpload();
$elements=array(
        "cname"=>"","des"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cname'=>"Country Name",'des'=>"Country Description" );

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
    "des"=>array("required"=>true,"minlength"=>2,"maxlength"=>800,),
   

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	

    $cname=$_POST['cname'];
    $cdes=$_POST['des'];
    $sql = "UPDATE country SET country_name = '$cname', description = '$cdes' WHERE country_id = $cid";
    include "../user/dbconnect.php";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('New record created successfully');</script> ";
header('location:view_country.php');
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
<h2 class="row" >Update Category</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            Country Name:
            <?php
            $cid = $_GET['id'];
            #echo $cid;
            include "../user/dbconnect.php";
            $query = "SELECT country_name,description FROM country WHERE country_id=$cid";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <input type="text" name="cname" class="" value="<?php echo $row['country_name']; ?>"><br>
                <?= $validator->error('cname'); ?>
                Description:
                <textarea name="des" class="des" style="width: 500px; height: 200px;"><?php echo $row['description']; ?></textarea><br>
                <?= $validator->error('des'); ?>
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


