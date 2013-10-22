<?php

 
 echo form_open('errorlog/register');
   
   
   $username=array(
   'name'=>'username',
   'id' =>'username',
   'value'=>''
   );
  
 
?>
 <ul>
  <li>
  <label>Username</label>
  <div><?php echo form_input($username); ?>  </div>
  <div><?php echo form_submit(array('name'=>'register'),'Register');?></div>
  <?php echo form_close(); ?>