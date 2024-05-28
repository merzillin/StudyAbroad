<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('header1.php'); ?>

    
    <div class="row" id="home_feat_1">
    <h2 class="row1" >View Gallery Images</h2>
    <div class="container">
    	<div class="row1">
            <div class="">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>image Id</th>
                        <th>Image</th>
                        <th>image type</th>
                        <th>description</th>

                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    //'edit'=>array('label'=>'Edit','link'=>'editstudentsimage.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'delete_image.php','params'=>array('id'=>'image_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('image_id'),
'actions_td'=>false,
         'images'=>array(
                        'field'=>'image_name',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
    );

   
   $join=array(
        //'dept as dt'=>array('dt.dno=s.dno','join'),

	//'batch as bt'=>array('bt.batchid=s.batchid','join')
	
    );  
$fields=array('image_id','image_name','image_type','description');

    $users=$dao->selectAsTable($fields,'image as i',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
