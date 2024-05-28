<?php 

 require('../config/autoload.php'); 
include("header1.php");

$msg="";

$elements=array(
        "image_name"=>"","image_type"=>"","description"=>"");

$form=new FormAssist($elements,$_POST);


$file=new FileUpload();

$dao=new DataAccess();

$labels=array('image_name'=>"Country Name",'image_type'=>"Country image",'description'=>"Country Description");

$rules=array(
    "image_type"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true,),
	"image_name"=> array('filerequired'=>true),  
    "description"=>array("required"=>true,"minlength"=>2,),

);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
	
	if($fileName=$file->doUploadRandom($_FILES['image_name'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
		{
	
$data=array(

        'image_type'=>$_POST['image_type'],
        'description'=>$_POST['description'],
	    'image_name'=>$fileName,
    );
  //print_r($data);
    if($dao->insert($data,"image"))
    {
        echo "<script> alert('New record created successfully');</script> ";
	header('location:image.php');

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
<h2 class="row" >Add image</h2>
	<div class="row">
                    <div class="col-md-6">
Image File : 
<?= $form->fileField('image_name',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('image_name'); ?></span>
		</div></div>
        <div class="row">
            <div class="col-md-6">
                <select name="image_type">
  <option value="gallery">Gallery</option>
  <option value="events">Events</option>
</select>

                    </div></div>      
        <div class="row">
                    <div class="col-md-6">
Image Description : 
<?= $form->textBox('description',array('class'=>'form-control')); ?>
<?= $validator->error('description'); ?>
		</div></div>					
	
<br><br>
		<div class="row">
        <button type="submit" name="btn_insert" >Submit</button>
</div>				

</form>
</body>
</html>