<!DOCTYPE html>
<html>
<head>
    <title>Safe Guard</title>

    <meta name="viewport" content="width=device-width, initial-scale=0.63">

    <!-- Bootstrap -->
    <link href="<?=base_url('')?>css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?=base_url('')?>css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('')?>css/dataTables.bootstrap.css" rel="stylesheet" media="all">



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

<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10" id='user_list_table'style="margin-top:10px;">


    <p style="font-family:flat; font-size:20px;">User Administration</p>
    <hr>




    <div class="panel panel-success">
        <div class="panel-heading">Search Users</div>
        <div class="panel-body panel-default" style="padding:0">

            <form class="form-inline">

                <table class="table" style="margin-top:0px !important;">

                    <tr>
                        <td>


                            <div class="form-group">
                                <div class="col-md-6 text-right control-label">
                                    First Name
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                        </td>

                        <td>


                            <div class="form-group">
                                <div class="col-md-4 text-right control-label">
                                    Group
                                </div>
                                <div class="col-md-8  control-label">
                                    <select class="form-control">
                                        <option>Executives</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                        </td>

                        <td>
                            <div class="form-group">
                                <div class="col-md-4 text-right control-label">
                                    Status
                                </div>
                                <div class="col-md-8 control-label">
                                    <select class="form-control">
                                        <option>Acive</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>


                        </td>



                    </tr>



                    <tr>

                        <td>
                            <div class="form-group">
                                <div class="col-md-6 text-right control-label">
                                    Last Name
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>


                        </td>


                        <td>

                            <div class="form-group">
                                <div class="col-md-4 text-right control-label" style="text-align:left">
                                    CMS Id
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" style="margin-left: -13px;">
                                </div>
                            </div>


                        </td>

                        <td>


                            <div class="text-center">
                                <div class="col-md-8 col-md-offset-3"  style="margin-left:23%">

                                    <button type="submit" class="btn btn-primary col-md-8">
                                        <i class="icon-search" style="font-size:18px;"></i> Search
                                    </button>


                                </div>
                            </div>

                        </td>



                    </tr>


                </table>

                <p><a href="#" style="text-decoration:underline; padding:5px;">Clear fields</a></p>


            </form>




        </div>
    </div>









</div>





<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"  style="margin-top:10px;">


    <!--
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="data_table">
            <thead>
            <tr>
                <th width="20%">Select</th>
                <th width="20%">UserName</th>
                <th width="25%">FirstName</th>
                <th width="25%">LastName</th>
                <th width="15%">Email</th>
                <th width="15%">UserGroupId</th>
                <th width="15%">CMSID</th>
               <th width="25%">Action</th>

            </tr>
            </thead>
            <tbody>-->
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
        <tr>
            <th style="width:50px;">Select</th>
            <th>User</th>
            <th>First</th>
            <th>Last</th>
            <th>Email</th>
            <th>Group</th>
            <th>CMS id</th>
            <th>Status</th>
            <th>Last Login</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td colspan="5" class="dataTables_empty">Loading data from server</td>
        </tr>
        </tbody>
    </table>



</div>

</div>





<script src="<?=base_url('')?>js/jquery-1.10.2.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<!--<script type="text/javascript" language="javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<script  type="text/javascript">

    $(document).ready(function() {
        //alert('********************************************845655765');
        $('[data-toggle=offcanvas]').click(function() {
            $('.row-offcanvas').toggleClass('active');
        });

        $('#user').popover();

    });

</script>
-->


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?=base_url('')?>js/jquery.validate.min.js"></script>

<script src="<?=base_url('')?>js/bootstrap.min.js"></script>
<!--<script src="<?=base_url('')?>js/dataTables.bootstrap.js">-->
<script type="text/javascript" language="javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    var detail_data_table_loaded=0;
    $(document).ready(function ()
    {

        if ( detail_data_table_loaded ) return;
        $('#example').dataTable(
            {
                "iDisplayStart": 0,
                "iDisplayLength": 25,
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "aaSorting": [[ 0, "desc" ]],
                "bProcessing": true,
                "bServerSide": true,
                "bFilter": true,
                "aoColumns": [
                    {"bSortable": false, "sClass": "tar"},
                    {"bSortable": true, "sClass": "tar"},
                    {"bSortable": true, "sClass": "tar"},
                    {"bSortable": true, "sClass": "tar"},
                    {"bSortable": true, "sClass": "tar"},
                    {"bSortable": true, "sClass": "tar"},
                    {"bSortable": true, "sClass": "tar"},
                    {"bSortable": false, "sClass": "tar"},
                    {"bSortable": false, "sClass": "tar"},
                    {"bSortable": false, "sClass": "tar"}
                ],
                "sAjaxSource": '<?php echo site_url('userlistcontroller1/user_list_ajax')?>'
        });
        detail_data_table_loaded=1;
        return true;
    });
</script>
</body>
</html>