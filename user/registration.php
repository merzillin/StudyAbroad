<?php 

 require('../config/autoload.php'); 
include("header1.php");

$file=new FileUpload();
$elements=array(
        "uname"=>"","phone"=>"","email"=>"","dob"=>"","pass"=>"","cpass"=>"",);


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('uname'=>"User Name",
                'phone'=>"Phone Number",
                'email'=>"Email",
                'dob'=>"date of birth",
                'pass'=>"password",
                'cpass'=>"confirm password",

);

$rules=array(
    "uname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
    "phone"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
   "email"=>array("required"=>true,"minlength"=>3,"maxlength"=>40,),
    "dob"=>array('required'=>true,),
    "pass"=>array("required"=>true,"minlength"=>3,"maxlength"=>20),
    "cpass"=>array("required"=>true,"compare"=>array("comparewith"=>"pass","operator"=>"="))
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	

$data=array(

        'username'=>$_POST['uname'],
        'phone'=>$_POST['phone'],
        'email'=>$_POST['email'],
        'dob'=>$_POST['dob'],
        'password'=>$_POST['pass'],
        'user_type'=>'user',
    );
  
    if($dao->insert($data,"user"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:registration.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    


}

}


?>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
        
            max-width: 400px;
            margin-top: 80px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .row {
            
            input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn_insert{
            display: block;
            width: 30%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn_insert:hover {
            background-color: #45a049;
            margin-bottom: 20px;
        }
        
        }
        .col-md-6{
            padding:10px;
        }
        </style>
</head>
<body>
<div class="container">
<h2 class="row" >Add UserDetails</h2>
 <form action="" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-6">
User Name : 

<?= $form->textBox('uname',array('class'=>'form-control')); ?>
<?= $validator->error('uname'); ?>

</div>
</div>
<div class="row">
    <div class="col-md-6">
User Phone : 

<?= $form->textBox('phone',array('class'=>'form-control')); ?>
<?= $validator->error('phone'); ?>

</div>
</div>
<div class="row">
    <div class="col-md-6">
User Email : 

<?= $form->textBox('email',array('class'=>'form-control')); ?>
<?= $validator->error('email'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Date Of Birth:

<?= $form->inputBox('dob',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('dob'); ?></span>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Password :

<?= $form->passwordBox('pass',array('class'=>'form-control')) ?>
<span style="color:red;"><?= $validator->error('pass'); ?></span>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Confirm Password :

<?= $form->passwordBox('cpass',array('class'=>'form-control')) ?>
<span style="color:red;"><?= $validator->error('cpass'); ?></span>

</div>
</div>
<div class="row">
<button type="submit" name="btn_insert" class="btn_insert"  >Submit</button>
</div>
</div>
</form>


</body>

</html>


