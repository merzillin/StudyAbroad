<?php 

 require('../config/autoload.php'); 
include("header1.php");

$file=new FileUpload();
$elements=array(
        "category_name"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('category_name'=>"Category Name" );

$rules=array(
    "category_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
   

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{

    $cname=$_POST['category_name'];
    $sql = "INSERT INTO category (category_name) VALUES ('$cname')";
    include "../user/dbconnect.php";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('New record created successfully');</script> ";
header('location:category.php');
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
<h2 class="row" >test Add Category</h2>
 <form action="" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-6">
Category Name : 

<?= $form->textBox('category_name',array('class'=>'form-control')); ?>
<?= $validator->error('category_name'); ?>

</div>
</div>

<div class="row">
<button type="submit" name="btn_insert"  >Submit</button>
</div>
</div>
</form>


</body>

</html>