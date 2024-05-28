<?php 

 require('../config/autoload.php'); 
include("header1.php");

$msg="";

$elements=array(
        "course_name"=>"",
        "duration"=>"",
        "syllabus"=>"",
        "eligibility"=>"",
        "criteria"=>"",
        "status"=>"",
        "amount"=>"",
        "university_id"=>"",
        "category_id"=>"",
        "country_id"=>"", );

$form=new FormAssist($elements,$_POST);


$file=new FileUpload();

$dao=new DataAccess();

$labels=array('course_name'=>"Course Name",
                'duration'=>"Course Duration",
                'syllabus'=>"Syllabus",
                'eligibility'=>"Course eligibility",
                'criteria'=>"criteria",
                'status'=>"status",
                'amount'=>"amount",
                'university_id'=>"University ID",
                'category_id'=>"Category ID",
                'country_id'=>"Country ID",);

$rules=array(
    "course_name"=>array("required"=>true,"minlength"=>2,"maxlength"=>50,),
	"duration"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,),
    "syllabus"=> array('filerequired'=>true),  
    "eligibility"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,),
    "criteria"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,),
    "status"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,),
    "amount"=>array("required"=>true,"maxlength"=>9,"integeronly"=>true,),
    "country_id"=>array("required"=>true),
    "university_id"=>array("required"=>true),
    "category_id"=>array("required"=>true),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
	
	if($fileName=$file->doUploadRandom($_FILES['syllabus'],array('.pdf'),100000,1,'../uploads'))
		{
	
$data=array(

        'course_name'=>$_POST['course_name'],
        'duration'=>$_POST['duration'],
	    'syllabus'=>$fileName,
        'eligibility'=>$_POST['eligibility'],
        'criteria'=>$_POST['criteria'],
        'status'=>$_POST['status'],
        'amount'=>$_POST['amount'],
        'university_id'=>$_POST['university_id'],
        'category_id'=>$_POST['category_id'],
        'country_id'=>$_POST['country_id'],
    );
  //print_r($data);
    if($dao->insert($data,"course"))
    {
        echo "<script> alert('New record created successfully');</script> ";
	header('location:course.php');

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
<h2 class="row" >Add Course</h2>
	<div class="row">
                    <div class="col-md-6">
Course Name : 
<?= $form->textBox('course_name',array('class'=>'form-control')); ?>
<?= $validator->error('course_name'); ?>
		</div></div>

        <div class="row">
                    <div class="col-md-6">
Course Duration : 
<?= $form->textBox('duration',array('class'=>'form-control')); ?>
<?= $validator->error('duration'); ?>
		</div></div>					
	<div class="row">
                    <div class="col-md-6">
Course Syllabus : 

<?= $form->fileField('syllabus',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('syllabus'); ?></span>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Course Eligibility : 
<?= $form->textBox('eligibility',array('class'=>'form-control')); ?>
<?= $validator->error('eligibility'); ?>
		</div></div>
        <div class="row">
                    <div class="col-md-6">
Course Criteria: 
<?= $form->textBox('criteria',array('class'=>'form-control')); ?>
<?= $validator->error('criteria'); ?>
		</div></div>
        <div class="row">
                    <div class="col-md-6">
Course status : 
<?= $form->textBox('status',array('class'=>'form-control')); ?>
<?= $validator->error('status'); ?>
		</div></div>
        </div>
        <div class="row">
                    <div class="col-md-6">
Course Payment : 
<?= $form->textBox('amount',array('class'=>'form-control')); ?>
<?= $validator->error('amount'); ?>
		</div></div>
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
</div>	<div class="row">
                    <div class="col-md-6">
Category name:

<?php
    $options = $dao->createOptions('category_name','category_id',"category");
    echo $form->dropDownList('category_id',array('class'=>'form-control'),$options); ?>
<?= $validator->error('category_id'); ?>
</div>
</div>	
        <div class="row">
                    <div class="col-md-6">
University name:

<?php
    $options = $dao->createOptions('university_name','university_id',"university");
     echo $form->dropDownList('university_id',array('class'=>'form-control'),$options); ?>
<?= $validator->error('university_id'); ?>

</div>


<br><br>
						
<button type="submit" name="btn_insert" >Submit</button>
</form>
</body>
</html>