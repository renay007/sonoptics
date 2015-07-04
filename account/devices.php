<?php                                                                           
  session_start();
  require_once('functions.php');
  isGoodUser();
  $info['encryptedEmail'] = $_COOKIE['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>Sonoptics - Responsive Admin Dashboard</title>

    <!--easy pie chart-->
    <link href="js/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="js/vector-map/jquery-jvectormap-1.1.1.css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="js/switchery/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

	  <!--bootstrap-fileinput-master-->
	     <link rel="stylesheet" type="text/css" href="js/bootstrap-fileinput-master/css/fileinput.css" />

    <!--jquery-ui-->
    <link href="js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

		<!--toastr-->
    <link href="js/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

    <!--iCheck-->
    <link href="js/icheck/skins/all.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
<!--    <link href="stylesheets/style.css" rel="stylesheet"> -->

    <!--them color layout-->
    <link href="css/layout-theme-one.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
        <div class="sidebar-left sticky-sidebar">
            <!--responsive view logo start-->
            <div class="logo theme-logo-bg visible-xs-* visible-sm-*">
                <a href="index.php">
                    <img src="img/logo-icon.png" alt="">
                    <!--<i class="fa fa-maxcdn"></i>-->
                    <span class="brand-name">Sonoptics</span>
                </a>
            </div>
            <!--responsive view logo end-->

            <div class="sidebar-left-info">
                <!-- visible small devices start-->
                <div class=" search-field">  </div>
                <!-- visible small devices end-->

                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked side-navigation">
                    <li>
                        <h3 class="navigation-title">Navigation</h3>
                    </li>
                    <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class="menu-list">
                        <a href=""><i class="fa fa-laptop"></i>  <span>Layouts</span></a>
                        <ul class="child-list">
                            <li><a href="boxed-layout.html"> Boxed Page</a></li>
                            <li><a href="collapsed-menu.html"> Sidebar Collapsed</a></li>
                            <li><a href="blank-page.html"> Blank page</a></li>
                            <li><a href="different-theme-layouts.html"> Different Theme Layouts</a></li>
                        </ul>
                    </li>
                    <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>UI Elements</span></a>
                        <ul class="child-list">
                            <li><a href="general.html"> BS Elements</a></li>
                            <li><a href="buttons.html"> Buttons</a></li>
                            <li><a href="toastr.html"> Toaster Notification</a></li>
                            <li><a href="widgets.html"> Widgets</a></li>
                            <li><a href="ion-slider.html"> Ion Slider</a></li>
                            <li><a href="tree.html"> Tree View</a></li>
                            <li><a href="nestable.html"> Nestable</a></li>
                            <li><a href="fontawesome.html"> Fontawesome</a></li>
                            <li><a href="line-icon.html"> Line Icon</a></li>
                        </ul>
                    </li>
                    <li>
                        <h3 class="navigation-title">Components</h3>
                    </li>
                    <li class="menu-list"><a href=""><i class="fa fa-cogs"></i> <span>Components <span class="badge noti-arrow bg-success pull-right">3</span> </span></a>
                        <ul class="child-list">
                            <li><a href="grid.html"> Grids</a></li>
                            <li><a href="calendar.html"> Calendar</a></li>
                            <li><a href="timeline.html"> Timeline </a></li>
                        </ul>
                    </li>

                    <li class="menu-list"><a href="javascript:;"><i class="fa fa-th-list"></i> <span>Data Tables</span></a>
                        <ul class="child-list">
                            <li><a href="table-static.html"> Basic Table</a></li>
                            <li><a href="table-dynamic.html"> Advanced Table</a></li>
                        </ul>
                    </li>

                    <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>Forms</span></a>
                        <ul class="child-list">
                            <li><a href="form-layout.html"> Form Layouts</a></li>
                            <li><a href="advanced-components.html"> Advanced Components</a></li>
                            <li><a href="form-wizard.html"> Form Wizards</a></li>
                            <li><a href="form-validation.html"> Form Validation</a></li>
                            <li><a href="form-editor.html"> Editors</a></li>
                        </ul>
                    </li>

                    <li class="menu-list"><a href=""><i class="fa fa-bar-chart-o"></i> <span>Charts </span></a>
                        <ul class="child-list">
                            <li><a href="flot-chart.html"> Flot Charts</a></li>
                            <li><a href="morris-chart.html"> Morris Charts</a></li>
                            <li><a href="chartjs.html"> Chartjs</a></li>
                        </ul>
                    </li>
                    <li>
                        <h3 class="navigation-title">Extra</h3>
                    </li>

                    <li class="menu-list"><a href="javascript:;"><i class="fa fa-envelope-o"></i> <span>Email <span class="label noti-arrow bg-danger pull-right">4 Unread</span> </span></a>
                        <ul class="child-list">
                            <li><a href="inbox.html"> Inbox</a></li>
                            <li><a href="inbox-details.html"> View Mail</a></li>
                            <li><a href="inbox-compose.html"> Compose Mail</a></li>
                        </ul>
                    </li>

                    <li class="menu-list"><a href="javascript:;"><i class="fa fa-map-marker"></i> <span>Maps</span></a>
                        <ul class="child-list">
                            <li><a href="google-map.html"> Google Map</a></li>
                            <li><a href="vector-map.html"> Vector Map</a></li>
                        </ul>
                    </li>

                    <li class="menu-list"><a href=""><i class="fa fa-file-text"></i> <span>Extra Pages</span></a>
                        <ul class="child-list">
                            <li><a href="profile.html"> Profile</a></li>
                            <li><a href="invoice.html"> Invoice</a></li>
                            <li><a href="login.php"> Login </a></li>
                            <li><a href="registration.html"> Registration </a></li>
                            <li><a href="lock.html"> Lock Screen </a></li>
                            <li><a href="404.html"> 404 Error</a></li>
                            <li><a href="500.html"> 500 Error</a></li>

                        </ul>
                    </li>

                </ul>
                <!--sidebar nav end-->

                <!--sidebar widget start-->
                <div class="sidebar-widget">
                    <h4>Server Status</h4>
                    <ul class="list-group">
                        <li>
                            <span class="label label-danger pull-right">33%</span>
                            <p>CPU Used</p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 33%;">
                                    <span class="sr-only">33%</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="label label-warning pull-right">65%</span>
                            <p>Bandwidth</p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-warning" style="width: 65%;">
                                    <span class="sr-only">65%</span>
                                </div>
                            </div>
                        </li>
                        <li><a href="javascript:;" class="btn btn-success btn-sm ">View Details</a></li>
                    </ul>
                </div>
                <!--sidebar widget end-->

            </div>
        </div>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
            <div class="header-section">

                <!--logo and logo icon start-->
                <div class="logo theme-logo-bg hidden-xs hidden-sm">
                    <a href="index.php">
                        <img src="img/logo-icon.png" alt="">
                        <!--<i class="fa fa-maxcdn"></i>-->
                        <span class="brand-name">Sonoptics</span>
                    </a>
                </div>

                <div class="icon-logo theme-logo-bg hidden-xs hidden-sm">
                    <a href="index.php">
                        <img src="img/logo-icon.png" alt="">
                        <!--<i class="fa fa-maxcdn"></i>-->
                    </a>
                </div>
                <!--logo and logo icon end-->

                <!--toggle button start-->
                <a class="toggle-btn"><i class="fa fa-outdent"></i></a>
                <!--toggle button end-->

                <div class="notification-wrap">
                <!--left notification start-->
                <div class="left-notification">
                <ul class="notification-menu">
                <!--mail info start-->
                <li class="d-none">
                    <a href="javascript:;" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-primary">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-title">
                        <div class="title-row">
                            <h5 class="title purple">
                                You have 2 Unread Mail
                            </h5>
                            <a href="javascript:;" class="btn-primary btn-view-all">View all</a>
                        </div>
                        <div class="notification-list mail-list">
                            <a href="javascript:;" class="single-mail">
                                <span class="icon bg-primary">
                                    S
                                </span>
                                <strong>Sonoptics Systems</strong>
                                <small> Just Now</small>
                                <p>
                                    <small>Hello Rene, welcome to Sonoptics ... </small>
                                </p>
                                <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                    <i class="fa fa-circle"></i>
                                </span>
                            </a>
                            <a href="javascript:;" class="single-mail">
                                <span class="icon bg-success">
                                    M
                                </span>
                                <strong>Mr. Plumber </strong>
                                <small> 30 Mins Ago</small>
                                <p>
                                    <small>Hello Rene, I can come tomorrow at ...</small>
                                </p>
                                <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                    <i class="fa fa-circle"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <!--mail info end-->

                <!--task info start-->
                <li class="d-none">
                    <a href="javascript:;" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-tasks"></i>
                        <span class="badge bg-success">3</span>
                    </a>

                    <div class="dropdown-menu dropdown-title">
                        <div class="title-row">
                            <h5 class="title green">
                                You have 3 task
                            </h5>
                            <a href="javascript:;" class="btn-success btn-view-all">View all</a>
                        </div>
                        <div class="notification-list task-list">
                            <a href="javascript:;">
                                <span class="icon ">
                                    <i class="fa fa-plug green-color"></i>
                                </span>
                                <span class="task-info">
                                Battery Life
                                <small> Fully charge the battery of your devices every two weeks</small>
                                    </span>
                            </a>
                            <a href="javascript:;">
                                <span class="icon ">
                                    <i class="fa fa-camera blue-color"></i>
                                </span>
                                <span class="task-info">Take a picture of your pipes' location
                                <small> Done 60% of his task</small>

                                <div class="progress progress-striped">
                                    <div style="width: 66%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="66"
                                         role="progressbar" class="progress-bar progress-bar-info"></div>
                                </div>

                                </span>
                            </a>
                            <a href="javascript:;">
                                <span class="icon ">
                                    <i class="fa fa-wifi"></i>
                                </span>
                                <span class="task-info">Data Transmission
                                <small> Make sure that all your devices are actually transmitting data</small>
                                    </span>
                            </a>
                        </div>
                    </div>
                </li>
                <!--task info end-->

                <!--notification info start-->
                <li>
                    <a href="javascript:;" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning">3</span>
                    </a>

                    <div class="dropdown-menu dropdown-title ">

                        <div class="title-row">
                            <h5 class="title yellow">
                                You have 3 New Notification
                            </h5>
                            <a href="javascript:;" class="btn-warning btn-view-all">View all</a>
                        </div>
                        <div class="notification-list-scroll sidebar">
                            <div class="notification-list mail-list not-list">
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-primary">
                                        <i class="fa fa-exclamation"></i>
                                    </span>
                                    <strong>Device 001 not transmitting</strong>

                                    <p>
                                        <small>Just Now</small>
                                    </p>
                                    <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </a>
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-warning">
                                        <i class="fa fa-warning"></i>
                                    </span> <strong>Warning! Check Device 002</strong>
                                    <p>
                                        <small> 2 Days Ago</small>
                                    </p>
                                    <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </a>
                                <a href="javascript:;" class="single-mail">
                                    <span class="icon bg-danger">
                                        <i class="fa fa-warning"></i>
                                    </span>
                                    <strong>Critical! Check Device 003</strong>

                                    <p>
                                        <small>10 Days Ago</small>
                                    </p>
                                    <span class="un-read tooltips" data-original-title="Mark as Read" data-toggle="tooltip" data-placement="left">
                                        <i class="fa fa-circle"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <!--notification info end-->
                </ul>
                </div>
                <!--left notification end-->


                <!--right notification start-->
                <div class="right-notification">
                    <ul class="notification-menu">
                        <li>
                            <form class="search-content" action="index.php" method="post">
                                <input type="text" class="form-control" name="keyword" placeholder="Search...">
                            </form>
                        </li>

                        <li>
                            <a href="javascript:;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <img src="img/rene.jpg" alt="">Rene Midouin
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu purple pull-right">
                                <li><a href="javascript:;"><i class="fa fa-user pull-right"></i>  Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                    <!--  <span class="badge bg-danger pull-right">40%</span> -->
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <!--    <span class="label bg-info pull-right">new</span> -->
                                        Help
                                    </a>
                                </li>
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--right notification end-->
                </div>

            </div>
            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head" style="text-align: center;">
                <h3>
                    <a href="index.php" style="color: #91918E;">Devices</a>
                </h3>
                		<a href="index.php">
											<span class="sub-title"><?php devices_header();?></span>
										</a>
            </div>
						
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">
							<div class="panel-body">
									<div class="panel-body" style="float: right;">
											<a class="btn btn-success" data-toggle="modal" href="#myModal2"><i class="fa fa-plus" style="margin-right: 13px"></i>Add Device</a>
											<!-- Modal -->
											<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
													<div class="modal-dialog modal-lg">
							<div class="modal-content">
																	<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																			<h4 class="modal-title">+ Add Location</h4>
																	</div>
							<form method="post" action="device_config.php" name="location">
								<div style="margin-top: -5px; margin-bottom: 30px" ;="" id="message"></div>                       
								<div class="form-signin">
															<input type="text" id="identifier1" name="identifier1" class="registrationBox form-control" placeholder="Unique identifier*" autofocus="" style="background-color: transparent;border-color: #55b786;color: black;" required="">
															<input type="text" id="address1" name="address1" class="registrationBox form-control" placeholder="Address*" autofocus="" style="background-color: transparent;border-color: #55b786;color: black;" required="">
															<input type="text" id="city1" name="city1" class="registrationBox form-control" placeholder="City/Town*" autofocus="" style="background-color: transparent;border-color: #55b786;color: black;" required="">
															<input type="text" id="state1" name="state1" class="registrationBox form-control" placeholder="State*" autofocus="" style="background-color: transparent;border-color: #55b786;color: black;" required="">
															<input type="text" id="zip1" name="zip1" class="registrationBox form-control" placeholder="Zip Code*" autofocus="" style="background-color: transparent;border-color: #55b786;color: black;" required="">
															</div>
								<div class="modal-footer" style="margin-top: 35px;">
								<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
								<button id="addLocationSubmit" class="btn btn-warning" type="submit" name="confirm" style="
										background-color: #5cc691;
										border-color: #55b786;
								"> Confirm</button>
								</div>
							 </form>
															</div>
													</div>
											</div>
									</div>							
							</div>
						<!--
							<div class="panel-body">
								<button type="button" class="btn btn-success"
								style="float: right;"><i class="fa fa-plus"></i>
								Add Device
								</button>
							</div> --> <!-- End div panel-body -->
							<div class="row">    
								<?php loadDevices();?>
							</div> <!-- End div row -->
            </div> <!-- End div wrapper -->
            <!--body wrapper end-->


            <!--footer section start-->
            <footer>
                2015 &copy; Sonoptics Systems.
            </footer>
            <!--footer section end-->

        </div>
        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery/switchery.min.js"></script>
<script src="js/switchery/switchery-init.js"></script>

<!--flot chart -->
<script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="js/flot-chart/jquery.flot.pie.js"></script>
<script src="js/flot-chart/jquery.flot.selection.js"></script>
<script src="js/flot-chart/jquery.flot.stack.js"></script>
<script src="js/flot-chart/jquery.flot.crosshair.js"></script>


<!--earning chart init-->
<script src="js/earning-chart-init.js"></script>


<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>

<!--easy pie chart-->
<script src="js/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>


<!--vectormap-->
<script src="js/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/vector-map/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard-vmap-init.js"></script>

<!--Icheck-->
<script src="js/icheck/skins/icheck.min.js"></script>
<script src="js/todo-init.js"></script>

<!--jquery countTo-->
<script src="js/jquery-countTo/jquery.countTo.js"  type="text/javascript"></script>

<!--owl carousel-->
<script src="js/owl.carousel.js"></script>

<!--bootstrap-fileinput-master-->
<script type="text/javascript" src="js/bootstrap-fileinput-master/js/fileinput.js"></script>
<script type="text/javascript" src="js/file-input-init.js"></script>

<!--toastr-->
<script src="js/toastr-master/toastr.js"></script>
<script src="js/toastr-init.js"></script>

<!--common scripts for all pages-->

<script src="js/scripts.js"></script>


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });

</script>

</body>
</html>
