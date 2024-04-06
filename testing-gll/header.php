<?php
include_once("seccion_create.php");
include_once("url.php");
?>
<!DOCTYPE HTML>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo $url; ?>/index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">More Option</li><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo $url; ?>/add_country.php"> <i class="fa fa-map-pin"></i>Add Country </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/three_links/"> <i class="fa fa-link"></i>Make Three Redirect</a>
                    </li>
                    <li class="menu-title">Make Login</li><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo $url; ?>/make_login.php"> <i class="fa fa-map-pin"></i>Make Login Area </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/make_login_view.php"> <i class="fa fa-eye"></i>View Login Area </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/view_forgot.php"> <i class="fa fa-eye"></i>View Forgot Password </a>
                    </li>
                    <li class="menu-title">Clients</li><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo $url; ?>/add_client.php"> <i class="fa fa-plus-square-o"></i>Add Client </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/view_client.php"> <i class="fa fa-eye"></i>View Client </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/client_add_project.php"> <i class="fa fa-address-card"></i>Add Project</a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/client_final_id.php"> <i class="fa fa-ioxhost"></i>Add Final Id's </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/client_wp.php"> <i class="fa fa-chain-broken"></i>Working Project </a>
                    </li>

                    <li class="menu-title">Vender</li>

                    <li>
                        <a href="<?php echo $url; ?>/add_vender.php"> <i class="fa fa-plus-square-o"></i>Add Vender </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/view_vender.php"> <i class="fa fa-eye"></i>View Vender </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/lot_project.php"> <i class="fa fa-address-card"></i>Lot Project </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/vender_project_view.php"> <i class="fa fa-ioxhost"></i>View Project Status </a>
                    </li>
                    <li class="menu-title">Employees</li><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo $url; ?>/add_employees.php"> <i class="fa fa-plus-square-o"></i>Add Employee </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/view_employess.php"> <i class="fa fa-eye"></i>View Employee </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/lot_employees_project.php"> <i class="fa fa-address-card"></i>Employee Project </a>
                    </li>
                    <li class="menu-title">Company Profit</li><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo $url; ?>/view_projects.php"> <i class="fa fa-eye"></i>View Project Status </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/widgets.html"> <i class="fa fa-rub"></i>Clear Amount </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/widgets.html"> <i class="fa fa-rub"></i>Vender Amount </a>
                    </li>
                    <li>
                        <a href="<?php echo $url; ?>/widgets.html"> <i class="fa fa-percent"></i>Your Profit </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index"><img src="<?php echo $url; ?>/images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Invoice">
                                <i class="fa fa-clipboard"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo $url; ?>/images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo $url; ?>/profile.html"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="<?php echo $url; ?>/setting.html"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="<?php echo $url; ?>/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->