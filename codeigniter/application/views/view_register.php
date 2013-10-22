<html>
<head>
<title>Registration Form</title>
<style type="text/css">
form li{list-style:none;}

</style>
</head>
<body>
<h2>User Registration</h2>
<?php
   //echo form_open('$base_url','user/register');
   echo form_open('user/register');
   
   

  $username=array(
   'name'=>'username',
   'id' =>'username',
   'value'=>''
   );

  $name=array(
   'name'=>'name',
   'id' =>'name',
   'value'=>''
   );
  $email=array(
   'name'=>'email',
   'id' =>'email',
   'value'=>''
   );
  $password=array(
   'name'=>'password',
   'id' =>'password',
   'value'=>''
   );
  $conf_password=array(
   'name'=>'conf_password',
   'id' =>'conf_password',
   'value'=>''
   );

?>
 <ul>
  <li>
  <label>Username</label>
  <div><?php echo form_input($username); ?>  </div>
  </li>

  <li>
  <label>Name</label>
  <div><?php echo form_input($name); ?>  </div>
  </li>

  <li>
  <label>Email</label>
  <div><?php echo form_input($email); ?>  </div>
  </li>

  <li>
  <label>Password</label>
  <div><?php echo form_password($password); ?>  </div>
  </li>

  <li>
  <label>Conform Password</label>
  <div><?php echo form_password($conf_password); ?>  </div>
  </li>
  <li>
  <?php echo validation_errors(); ?>
  </li>
  <li>
  <div><?php echo form_submit(array('name'=>'register'),'Register');?></div>
  </li>

 </ul>
<?php echo form_close(); ?>
</body>
</html>