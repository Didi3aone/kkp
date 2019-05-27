<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <title><?= (isset($TITLE_TAB)) ? "INDAROMA || " .$TITLE_TAB : "INDAROMA ||" ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- chartist CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/material/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url(); ?>assets/material/css/colors/red.css" id="theme" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/material/css/new_modif.css" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b>
                            <!-- You can put here icon as well //  -->                                
                            <i class="wi wi-sunset"></i> 
                            <!-- Dark Logo icon -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            PT. INDAROMA
                        </span> 
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">-->
                                            <!-- Message -->
                                           <!-- <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>-->
                                            <!-- Message -->
                                            <!--<a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>-->
                                            <!-- Message -->
                                            <!--<a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>-->
                                            <!-- Message -->
                                            <!--<a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>-->
                                    <!-- <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url(); ?>assets/images/download.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <!-- <div class="u-img"><img src="<?php// base_url(); ?>assets/images/users/1.jpg" alt="user"></div> -->
                                            <div class="u-text">
                                                <h4><?= $this->session->userdata('name'); ?></h4>
                                               <!--  <p class="text-muted"><?php // $this->session->userdata('email'); ?></p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div> -->
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= site_url('Auth/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <!--<div class="user-profile">-->
                    <!-- User profile image -->
                    <!--<div class="profile-img"> <img src="<?php// base_url(); ?>assets/images/download.png" alt="user" class="profile-pic" /></div>-->
                    <!-- User profile text-->
                    <!--<div class="profile-text"> 
                        <a href="#" class=""><?php// $this->session->userdata('name'); ?></a>
                    </div>
                </div>-->
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Home </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "dashboard") ? "active" : "" ?>">
                                    <a href="<?=site_url('dashboard?LOGIN(TRUE)&name='.URL_HACKED.'&'.URL_ENCODE); ?>">Dashboard</a>
                                </li>
                            </ul>
                        </li>
                        <?php 
                            $level = $this->session->userdata("level");

                            if($level == "Administrator") :
                        ?>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Work Order</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "work_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('work-order'); ?>">List WO</a>
                                </li>
                                <li><a href="<?= site_url('work_order/create'); ?>">Create WO</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file-o"></i><span class="hide-menu">BPP</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "bpp_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('bpp'); ?>">List BPP</a>
                                </li>
                            </ul>
                        </li>

                       <!--  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti ti-truck"></i><span class="hide-menu">Warehouse</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?php //(isset($active_page) && $active_page == "warehouse" ) ? "active" : "" ?>">
                                    <a href="<?php //site_url('warehouse'); ?>">List Warehouse</a>
                                </li>
                            </ul>
                        </li> -->

                       <!--  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?php// (isset($active_page) && $active_page == "user" ) ? "active" : "" ?>">
                                    <a href="<?php// site_url(); ?>">List</a>
                                </li>
                            </ul>
                        </li> -->
                        <?php elseif($level == "PPIC") : ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Work Order</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "work_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('work-order'); ?>">List WO</a>
                                </li>
                                <li class="<?= (isset($active_page) && $active_page == "work_create") ? "active" : "" ?>"><a href="<?= site_url('work_order/create'); ?>">Buat WO</a></li>
                            </ul>
                        </li>
                        <?php elseif($level == "Staff Gudang"): ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file-o"></i><span class="hide-menu">BPP</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "bpp_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('bpp'); ?>">List BPP</a>
                                </li>
                            </ul>
                        </li>
                        <?php elseif($level == "Leader Produksi") :?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Work Order</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "work_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('work-order'); ?>">List WO</a>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file-o"></i><span class="hide-menu">BPP</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "bpp_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('bpp'); ?>">List BPP</a>
                                </li>
                            </ul>
                        </li>
                        <?php elseif($level == "QC") : ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file-o"></i><span class="hide-menu">BPP</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "bpp_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('bpp'); ?>">List BPP</a>
                                </li>
                            </ul>
                        </li>
                        <?php elseif($level == "Manager Produksi") : ?>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Work Order</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "work_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('work-order'); ?>">List WO</a>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file-excel-o"></i><span class="hide-menu">Reporting</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="<?= (isset($active_page) && $active_page == "bpp_list") ? "active" : "" ?>">
                                    <a href="<?= site_url('report'); ?>">Reporting</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->

            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="<?= site_url('Auth/logout'); ?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"><?= isset($menu_breadcrumb) ? $menu_breadcrumb : ""; ?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><?= isset($menu_breadcrumb) ? $menu_breadcrumb : ""; ?></li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <!-- <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">$48,356</h4></div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div> -->
                            <!-- <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- all content like this -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->