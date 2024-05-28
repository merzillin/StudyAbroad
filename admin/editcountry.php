<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','country','country_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "cname"=>$info[0]['country_name'],
        "cdescription"=>$info[0]['description'],
        "cimage"=>$info[0]['image'],
    );

	$form = new FormAssist($elements,$_POST);

$labels=array('cname'=>"Country Name",'cdescription'=>"Country Description",'cimage'=>"Country Image" );

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "cdescription"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "cimage"=>array("filerequired"=>true)
    

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
    if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
    {


$data=array(

        'country_name'=>$_POST['cname'],
        'description'=>$_POST['cdescription'],
        'image'=>$_POST['cimage']
        
    );
  $condition='country_id='.$_GET['id'];

    

if($dao->update($data,'country',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    }
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
Country Name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Country Description:

<?= $form->textBox('cdescription',array('class'=>'form-control')); ?>
<?= $validator->error('cdescription'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Image : 

<?= $form->fileField('cimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cimage'); ?></span>

</div>
</div>

<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>