<?php 

 require('../config/autoload.php'); 
include("header1.php");

$file=new FileUpload();
$elements=array(
        "university_name"=>"","location"=>"","country_id"=>"","image"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('university_name'=>"University Name","location"=>"University Location","image"=>"University Image","country_id"=>"country Name" );

$rules=array(
    "university_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "location"=>array("required"=>true,"minlength"=>2,"maxlength"=>50,"alphaspaceonly"=>true),
 "country_id"=>array("required"=>true),
 "image"=> array('filerequired'=>true),  

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{

        if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
		{

$data=array(

        'university_name'=>$_POST['university_name'],
        'location'=>$_POST['location'],
        'uimage'=>$fileName,
          'country_id'=>$_POST['country_id'],
		  
    );
    print_r ($data);
  
    if($dao->insert($data,"university"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:university.php');
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

 <form action="" method="POST" enctype="multipart/form-data">
 <h2 class="row" >Add University</h2>
<div class="row">
                    <div class="col-md-6">
University Name : 

<?= $form->textBox('university_name',array('class'=>'form-control')); ?>
<?= $validator->error('university_name'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
university location :

<?= $form->textBox('location',array('class'=>'form-control')); ?>
<?= $validator->error('location'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Image : 

<?= $form->fileField('image',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('image'); ?></span>

</div>
</div>




<div class="row">
                    <div class="col-md-6">
Country name:

<?php
                    $options = $dao->createOptions('country_name','country_id',"country");
                    echo $form->dropDownList('country_id',array('class'=>'form-control'),$options); ?>
<?= $validator->error('country_id'); ?>

</div>
</div>
<div class="row">
<button type="submit" name="btn_insert" >Submit</button>
</div>
</form>


</body>

</html>


