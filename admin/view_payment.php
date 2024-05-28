
<?php require('../config/autoload.php'); ?>

<?php

$dao=new DataAccess();
?>
<?php 
include('header1.php'); 
?>

    
    <div class="row" id="">
    <h2 class="row1" >View Payments</h2>
    <div class="">
    	<div class="">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>id</th>
                        <th>Card Number</th>
                        <th>User</th>
                        <th>Transaction Amount</th>
                        <th>card owner Name</th>
                        <th>Transaction Time</th>
                        
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    //'edit'=>array('label'=>'Edit','link'=>'editcategory.php','params'=>array('id'=>'category_id'),'attributes'=>array('class'=>'btn btn-success')),
    
  //'delete'=>array('label'=>'Delete','link'=>'editcategory.php','params'=>array('id'=>'category_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('pay_id')
        
        
    );

   
   $join=array(
        //'dept as dt'=>array('dt.dno=s.dno','join'),
    );  $fields=array('pay_id','card_number','user_id','transaction_amount','card_holder_name','process_time',);

    $users=$dao->selectAsTable($fields,'payment as p',1,$join,$actions,$config);
    
    echo $users;
              
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
