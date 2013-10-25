<?php
//echo form_open('$base_url','user/register');


$userid=array(
    'name'=>'userid',
    'id' =>'userid',
    'class' =>'form-control',
    'value'=> set_value('username')
);

$firstname=array(
    'name'=>'first_name',
    'id' =>'first_name',
    'class' =>'form-control',
    'value'=>set_value('first_name')
);

$lastname=array(
    'name'=>'last_name',
    'id' =>'last_name',
    'class' =>'form-control',
    'value'=>set_value('last_name')
);


$cmsid=array(
    'name'=>'cms_id',
    'id' =>'cms_id',
    'class' =>'form-control',

    'value'=>set_value('cms_id')
);

$phone=array(
    'name'=>'phone',
    'id' =>'phone',
    'class' =>'form-control',

    'value'=>set_value('phone')
);

$email=array(
    'name'=>'email',
    'id' =>'email',
    'class' =>'form-control',

    'value'=>set_value('email')
);

foreach($usrtype_result as $data)
{
    $grpid=$data['UserTypeID'];
    $usertype_options['']='Select';
    $usertype_options[$grpid] =$data['UserTypeName'];
}

//$usertype_options= array('1101' => 'IEM');

foreach($usrgrp_result as $data) {
    $grpid=$data['UserGroupId'];
    $usergroup_options['']='Select';
    $usergroup_options[$grpid] = $data['GroupDescription'];
}
foreach($result as $data)
{
    $userid['value']=$data['UserName'];
    $firstname['value']=$data['FirstName'];

    $lastname['value']=$data['LastName'];

    $email['value']=$data['Email'];
    $cmsid['value']=$data['CMSID'];
    $phone['value']=$data['Phone'];
    $selected_grp_edit=$data['UserGroupId'];
    $selected_type_edit=$data['UserTypeId'];

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

?><!DOCTYPE html>
<html>
<head>
    <title>Safe Guard</title>

    <meta name="viewport" content="width=device-width, initial-scale=0.63">

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
        <img src="<?=base_url('')?>images/logo.png" style="padding:14px 0 13px 0px;">
    </div>


    <div class="col-lg-8 col-md-8 col-sm-8">

        <nav class="navbar navbar" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul  class="nav navbar-nav nav-pills   pull-right text-center topnav">
                    <li class="active"><a href="#"><i class="icon-home "></i> <br> Home</a></li>
                    <li class=""><a href="#"><i class="icon-tags"></i><br> Sales</a></li>
                    <li class=""><a href="#"><i class="icon-bar-chart"></i> <br>Claims</a></li>
                    <li class=""><a href="#"><i class="icon-group"></i><br> Risk Management</a></li>
                    <li class=""><a href="#"><i class="icon-book"></i><br>  Accounting</a></li>
                    <li class=""><a href="#"><i class="icon-cogs"></i><br> Operations</a></li>

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <!--<ul  class="nav navbar-nav nav-pills   pull-right text-center topnav">
              <li class="active"><a href="#"><i class="icon-home "></i> <br> Home</a></li>
              <li class=""><a href="#"><i class="icon-tags"></i><br> Sales</a></li>
              <li class=""><a href="#"><i class="icon-bar-chart"></i> <br>Claims</a></li>
              <li class=""><a href="#"><i class="icon-group"></i><br> Risk Management</a></li>
              <li class=""><a href="#"><i class="icon-book"></i><br>  Accounting</a></li>
              <li class=""><a href="#"><i class="icon-cogs"></i><br> Operations</a></li>

              </li>
        </ul>
        -->
    </div>

    <div class="profiledet">

        <div class=" col-lg-1 col-md-1 col-lg-1  pull-left">

            <img src="<?=base_url('')?>images/eebf9429dd437ab83c926184e1625ff9.jpeg" class="pull-left hidden-xs">

        </div>


        <div class=" col-lg-1 col-md-1 col-lg-1 pull-left usrdet pull-left" style="padding:0; margin:0;">



            <ul>
                <li><a href="#">Edit Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>

        </div>
    </div>


</div>




<div class="row-offcanvas row-offcanvas-left">

    <div class="col-xs-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="list-group left_menu" style="">
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



    <button type="button" class="btn btn-primary btn-xs toggleiconmenu" data-toggle="offcanvas" style="z-index: 200; top: 3px; position: absolute;left:138px;">
        <i class="icon-align-justify"></i></button>

</div>

<div class="col-xs-10 col-sm-8 col-lg-8 col-md-8" style=" margin-top:30px;">
    <div class="usergropadminblock">


        <p style=" font-size:20px;">Edit User

        <hr style="margin:0px; padding:10px;">




        <div class="Usergroup_serach">

            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'form-horizontal');
            echo form_open('usereditcontroller/save',$attributes);

            $this->form_validation->set_error_delimiters('<span class="error" style="color:red">', '</span>'); ?>

                <div class="form-group">

                    <?php echo form_hidden('user_id', $usr_id);?>
                    <div class="col-xs-4 text-right control-label">
                        First Name
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php echo form_input($firstname); ?>
                         <span> <?php echo form_error('first_name'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right control-label">
                        Last Name
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php echo form_input($lastname); ?>
                        <span> <?php echo form_error('first_name'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right control-label">
                        User Id
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php echo form_input($userid); ?>
                        <span class="error" style="color:red"><?php echo $usr_error;?> </span>
                        <span> <?php echo form_error('userid'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right control-label">
                        Email
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php echo form_input($email); ?>
                        <span> <?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right control-label">
                        Phone
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php echo form_input($phone); ?>
                        <span> <?php echo form_error('phone'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right control-label">
                        Group
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php
                        $attr='class ="form-control" ';
                        $select=set_value($selected_grp_edit);
                        $select=$selected_grp_edit;
                        echo form_dropdown('Usergroup', $usergroup_options, $select,$attr);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right control-label">
                        User Type
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php
                        //$shirts_on_sale = array('small', 'large');
                        $select=set_value($selected_type_edit);
                        $attr='class ="form-control" ';
                        $select=$selected_type_edit;

                        echo form_dropdown('Usertype', $usertype_options, $select,$attr);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4 text-right control-label">
                        CMS Id
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <?php echo form_input($cmsid); ?>
                        <span> <?php echo form_error('cms_id'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">
                                Send an update email to the user </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-6 text-right" style="margin-left:20px;">
                        <?php echo form_submit(array('name'=>'save'),'Save');?>
                    </div>
                    <div class="col-xs-4" style="line-height:2; text-decoration:underline;">
                        <a href='http://localhost:8080/github/codeigniter/index.php/usereditcontroller'>Cancel</a>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>



</div>










<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url('')?>js/jquery-1.10.2.min.js"></script>

<script src="<?=base_url('')?>js/jquery-1.10.2.min.js"></script>

<script  type="text/javascript">

    $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
            $('.row-offcanvas').toggleClass('active');
        });

        $('#user').popover();

    });

</script>



<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?=base_url('')?>js/jquery.validate.min.js"></script>
<script src="<?=base_url('')?>js/bootstrap.min.js"></script>
</body>
</html>