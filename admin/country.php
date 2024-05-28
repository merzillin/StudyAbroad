<?php 

 require('../config/autoload.php'); 
include("header1.php");

$msg="";

$elements=array(
        "country_name"=>"","image"=>"","description"=>"");

$form=new FormAssist($elements,$_POST);


$file=new FileUpload();

$dao=new DataAccess();

$labels=array('country_name'=>"Country Name",'image'=>"Country image",'description'=>"Country Description");

$rules=array(
    "country_name"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true,),
	"image"=> array('filerequired'=>true),  
    "description"=>array("required"=>true,"minlength"=>2,),

);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
	
	if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
		{
	
$data=array(

        'country_name'=>$_POST['country_name'],
        'description'=>$_POST['description'],
	    'image'=>$fileName,
    );
  //print_r($data);
    if($dao->insert($data,"country"))
    {
        echo "<script> alert('New record created successfully');</script> ";
	header('location:country.php');

    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
}
}



?>


<html>
<head>
</head>
<body>
	
	 
	
<form action="" method="POST"  enctype="multipart/form-data" >
<h2 class="row" >Add Country</h2>
	<div class="row">
                    <div class="col-md-6">
Country Name : 
<?= $form->textBox('country_name',array('class'=>'form-control')); ?>
<?= $validator->error('country_name'); ?>
		</div></div>

        <div class="row">
                    <div class="col-md-6">
Country Description : 
<?= $form->textBox('description',array('class'=>'form-control')); ?>
<?= $validator->error('description'); ?>
		</div></div>					
	<div class="row">
                    <div class="col-md-6">
Image : 

<?= $form->fileField('image',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('image'); ?></span>

</div>
</div>
<br><br>
	<div class="row">
    <button type="submit" name="btn_insert" >Submit</button>
</div>					

</form>
</body>
</html>