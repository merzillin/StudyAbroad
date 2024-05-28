<?php 

 require('../config/autoload.php'); 
include("header1.php");
$cid = $_GET['id'];
$file=new FileUpload();
$elements=array(
        "cname"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cname'=>"Category Name" );

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
   

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	

    $cname=$_POST['cname'];
    $sql = "UPDATE category SET category_name = '$cname' WHERE category_id = $cid";
    include "../user/dbconnect.php";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('New record created successfully');</script> ";
header('location:view_category.php');
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
            Category Name:
            <?php
            $cid = $_GET['id'];
            #echo $cid;
            include "../user/dbconnect.php";
            $query = "SELECT category_name FROM category WHERE category_id=$cid";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <input type="text" name="cname" class="" value="<?php echo $row['category_name']; ?>">
                <?= $validator->error('cname'); ?>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="row">
        <button type="submit" name="btn_insert">Submit</button>
    </div>
</form>


</body>

</html>


