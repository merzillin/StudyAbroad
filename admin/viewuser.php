
<?php require('../config/autoload.php'); ?>

<?php

$dao=new DataAccess();
?>
<?php 
include('header1.php'); 
?>

    
    <div class="row" id="">
    <h2 class="row1" >View Users</h2>
    <div class="">
    	<div class="">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>user Id</th>
                        <th>user name</th>
                        <th>phone number</th>
                        <th>mail address</th>
                        <th>date of birth</th>
                        
                        
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    //'edit'=>array('label'=>'Edit','link'=>'editcategory.php','params'=>array('id'=>'category_id'),'attributes'=>array('class'=>'btn btn-success')),
    
  //'delete'=>array('label'=>'Delete','link'=>'editcategory.php','params'=>array('id'=>'category_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('user_id'),
        'images'=>array(
            'field'=>'profile',
            'path'=>'../profile',
            'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
   $join=array(
        //'dept as dt'=>array('dt.dno=s.dno','join'),
    );  $fields=array('user_id','username','phone','email','dob');

    $users=$dao->selectAsTable($fields,'user as u',1,$join,$actions,$config);
    
    echo $users;
              
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
