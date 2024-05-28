<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','university','university_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "uname"=>$info[0]['university_name'],
        "uaddress"=>$info[0]['location'],);

	$form = new FormAssist($elements,$_POST);

$labels=array('uname'=>"University Name",'uaddress'=>'University Address' );

$rules=array(
    "uname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "uaddress"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),

    

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{


$data=array(

        'university_name'=>$_POST['uname'],
        'location'=>$_POST['uaddress'],

        
    );
  $condition='university_id='.$_GET['id'];

    

if($dao->update($data,'university',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
University Name:

<?= $form->textBox('uname',array('class'=>'form-control')); ?>
<?= $validator->error('uname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
University Address:

<?= $form->textBox('uaddress',array('class'=>'form-control')); ?>
<?= $validator->error('uaddress'); ?>

</div>
</div>


<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>