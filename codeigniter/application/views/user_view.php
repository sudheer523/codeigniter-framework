<?php
//echo form_open('$base_url','user/register');


$username=array(
    'name'=>'username',
    'id' =>'username',
    'value'=> set_value('username')
);

$firstname=array(
    'name'=>'first_name',
    'id' =>'first_name',
    'value'=>set_value('first_name')
);
$middlename=array(
    'name'=>'middle_name',
    'id' =>'middle_name',
    'value'=>set_value('middle_name')
);
$lastname=array(
    'name'=>'last_name',
    'id' =>'last_name',
    'value'=>set_value('last_name')
);

$password=array(
    'name'=>'password',
    'id' =>'password',
    'value'=>''
);
$companyid=array(
    'name'=>'company_id',
    'id' =>'company_id',
    'value'=>set_value('company_id')
);
$email=array(
    'name'=>'email',
    'id' =>'email',
    'value'=>set_value('email')
);
$conf_password=array(
    'name'=>'conf_password',
    'id' =>'conf_password',
    'value'=>''
);
$phone=array(
    'name'=>'phone',
    'id' =>'phone',
    'value'=>set_value('phone')
);
$phonext=array(
    'name'=>'phone_ext',
    'id' =>'phone_ext',
    'value'=>set_value('phone_ext')
);



foreach($usrtype_result as $data)
{
    $grpid=$data['UserTypeID'];
    $usertype_options[$grpid] = $data['UserTypeName'];
}

//$usertype_options= array('1101' => 'IEM');

foreach($usrgrp_result as $data) {
    $grpid=$data['UserGroupId'];
    $usergroup_options[$grpid] = $data['GroupDescription'];
}

//print_r($usergroup_options);

//$usergroup_options= array('1' => 'GRP1','2' => 'GRP2',);



$checkbox = array(
    'name'        => 'send_email',
    'id'          => 'send_email',
    'value'       => 'accept',
    //'checked'     => TRUE,
    'style'       => 'margin:10px',
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Safe Guard</title>

    <meta name="viewport" content="width=device-width, initial-scale=0.54">
    <style type="text/css">
        form li{list-style:none;}

    </style>
    <!-- Bootstrap -->
    <link href="<?=base_url('')?>css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?=base_url('')?>css/font-awesome.min.css" rel="stylesheet" media="all">



    <!--plugins css-->

    <!--custom css-->
    <link href="<?=base_url('')?>css/site_custom_styles1.css" rel="stylesheet" media="screen">
    <link href="<?=base_url('')?>css/offcanvas.css" rel="stylesheet" media="screen">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=base_url('')?>assets/js/html5shiv.js"></script>
    <script src="<?=base_url('')?>assets/js/respond.min.js"></script>
    <![endif]-->


</head>



<body>


<div class="row" style="background-color: #1063B8;">

    <div class="col-lg-1">
        <img src="<?=base_url('')?>images/logo.png" style="padding-top:10px;">
    </div>


    <div class="col-lg-8 col-md-8 col-sm-8">



        <ul  class="nav navbar-nav nav-pills   pull-right text-center">
            <li class="active"><a href="#"><i class="icon-home "></i> <br> Home</a></li>
            <li class=""><a href="#"><i class="icon-tags"></i><br> Sales</a></li>
            <li class=""><a href="#"><i class="icon-bar-chart"></i> <br>Claims</a></li>
            <li class=""><a href="#" style="width: 174px;"><i class="icon-group"></i><br> Risk Management</a></li>
            <li class=""><a href="#"><i class="icon-book"></i><br>  Accounting</a></li>
            <li class=""><a href="#"><i class="icon-cogs"></i><br> Operations</a></li>

            </li>
        </ul>

    </div>

    <div class=" col-lg-1 col-md-1 col-lg-1  pull-left">

        <img src="<?=base_url('')?>images/eebf9429dd437ab83c926184e1625ff9.jpeg" class="pull-left">

    </div>


    <div class=" col-lg-2 col-md-2 col-lg-2 pull-left usrdet pull-left">



        <ul>
            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>

    </div>



</div>
<div class="row row-offcanvas row-offcanvas-left">

    <div class="col-xs-2 col-sm-2 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="list-group left_menu">
            <a href="#" class="list-group-item active"><span style="font-weight:bold; font-size:20px;">Menu</span></a>
            <a href="#" class="list-group-item"> <i class="icon-dashboard"></i><p>Dashboard</p></a>
            <a href="#" class="list-group-item"><i class="icon-list-alt"></i><p>Events</p></a>
            <a href="#" class="list-group-item"><i class="icon-search"></i><p>Monitor</p></a>
            <a href="#" class="list-group-item"><i class="icon-envelope"></i><p>Messages</p></a>
            <a href="#" class="list-group-item"><i class="icon-check"></i><p>Orders</p></a>
            <a href="#" class="list-group-item"><i class="icon-comment-alt"></i><p>F.A.Qs</p> </a>
            <a href="#" class="list-group-item"><i class="icon-bullhorn"></i><p>Announcements</p></a>
            <a href="#" class="list-group-item"><p>Messages</p></a>
            <a href="#" class="list-group-item"><p>Messages</p></a>
        </div>
    </div>


    <p class="pull-left ">
        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas" style="z-index: 200; top: 3px; position: absolute;left: 20px;">
            <i class="icon-align-justify"></i></button>
    </p>
<div align='center' height=500>


    <h2>User Registration</h2>
<?php echo form_open('usercontroller/register');

$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>'); ?>
    <ul>
        <li><div>
            <label>Username *</label>
            <?php echo form_input($username); ?>  </div>
            <span> <?php echo form_error('username'); ?></span>
        </li>

        <li> <div>
            <label>First Name *</label>
           <?php echo form_input($firstname); ?>  </div>
            <span> <?php echo form_error('first_name'); ?></span>
        </li>
        <li> <div>
            <label>Middle Name</label>
            <?php echo form_input($middlename); ?>  </div>
            <span> <?php echo form_error('middle_name'); ?></span>
        </li>
        <li> <div>
            <label>Last Name *</label>
            <?php echo form_input($lastname); ?>  </div>
            <span> <?php echo form_error('last_name'); ?></span>
        </li>
        <li> <div>
            <label>Email *</label>
            <?php echo form_input($email); ?>  </div>
            <span> <?php echo form_error('email'); ?></span>
        </li>


        <li> <div>

            <label>Password *</label>
            <?php echo form_password($password); ?>  </div>
            <span> <?php echo form_error('password'); ?></span>
        </li>

        <li> <div>
            <label>Confirm Password *</label>
            <?php echo form_password($conf_password); ?>  </div>
            <span> <?php echo form_error('conf_password'); ?></span>
        </li>

        <li> <div>
            <label>Phone *</label>
            <?php echo form_input($phone); ?>  </div>
            <span> <?php echo form_error('phone'); ?></span>
        </li>
        <li> <div>
            <label>Phone Ext *</label>
            <?php echo form_input($phonext); ?>  </div>
            <span> <?php echo form_error('phone_ext'); ?></span>
        </li>
        <li> <div>
            <label>Company ID * </label>
           <?php echo form_input($companyid); ?>  </div>
            <span> <?php echo form_error('company_id'); ?></span>
        </li>
        <li> <div>
            <label>User Type *</label>
            <?php
                //$shirts_on_sale = array('small', 'large');
            $select=set_value('Usertype');
                echo form_dropdown('Usertype', $usertype_options, $select);
                ?>
                <span> <?php echo form_error('Usertype'); ?></span>
        </li>
        <li> <div>
            <label>User Group *</label>
            <?php
            $select=set_value('Usergroup');
                echo form_dropdown('Usergroup', $usergroup_options, $select);
                ?></div>
            <span> <?php echo form_error('Usergroup'); ?></span>
        </li>

        <li> <div>
            <label>Send an update email to user </label>
           <?php

                echo form_checkbox($checkbox);

                ?>


        <li>
            <div><?php echo form_submit(array('name'=>'register'),'Register');?></div>

        </li>
        <li>
            <div><a href='http://localhost:8080/github/codeigniter/index.php/usercontroller'>Cancel</a></div>
        </li>


    </ul>
    <?php echo form_close(); ?>
</div>


</div>















<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.10.2.min.js"></script>

<script src="js/jquery-1.10.2.min.js"></script>

<script  type="text/javascript">

    $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
            $('.row-offcanvas').toggleClass('active');
        });

        $('#user').popover();

    });

</script>



<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
