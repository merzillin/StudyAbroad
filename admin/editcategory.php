<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','category','category_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "cname"=>$info[0]['category_name'],);

	$form = new FormAssist($elements,$_POST);

$labels=array('cname'=>"Category Name", );

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{


$data=array(

        'category_name'=>$_POST['cname'],
        
    );
  $condition='category_id='.$_GET['id'];

    

if($dao->update($data,'category',$condition))
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
Category Name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>


<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>