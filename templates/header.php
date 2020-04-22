<?php    
    $conn = new mysqli('localhost','root','','hydrocheck');
    session_start();
    include_once dirname(__FILE__) . "/../autoload.php";
    use Apps\Libs\Admins\Admin;
    use Apps\Libs\Students\Student;



    $admin = new Admin;
    $student = new Student;


    if( isset($_GET['logout']) AND $_GET['logout'] == 'logout'  ){
        session_destroy();
        header("location:index.php");
    }

    if( !isset($_SESSION['admin_name']) ){
        header("location:index.php");
    }

?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <link rel="shortcut icon" href="assets\hydrocheck.ico">
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="1" > 
    <title>HydroCheck</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="assets/css/app.v1.css" type="text/css" />
    <link rel="stylesheet" href="assets/js/calendar/bootstrap_calendar.css" type="text/css" />
    <!--<script src="https://kit.fontawesome.com/94a62d64d6.js" crossorigin="anonymous"></script>-->
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">


    <section class="vbox">




        <!-- HEADER PART  -->
        <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
            <div class="navbar-header aside-md dk">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="index.html" class="navbar-brand"> <img src="assets\hydrocheck.ico" class="m-r-sm" alt="scale"> <span class="hidden-nav-xs">HydroCheck</span> </a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a>
            </div>
            <ul class="nav navbar-nav hidden-xs">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-grid"></i> </a>
                    <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
                        <div class="row m-l-none m-r-none m-t m-b text-center">
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-mail i-2x text-primary-lt"></i> </span> <small class="text-muted">Mailbox</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-calendar i-2x text-danger-lt"></i> </span> <small class="text-muted">Calendar</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-map i-2x text-success-lt"></i> </span> <small class="text-muted">Map</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-paperplane i-2x text-info-lt"></i> </span> <small class="text-muted">Trainning</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-images i-2x text-muted"></i> </span> <small class="text-muted">Photos</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-clock i-2x text-warning-lter"></i> </span> <small class="text-muted">Timeline</small> </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="assets/images/a0.png" alt="..."> </span> <?php echo $_SESSION['admin_name']; ?> <b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li> <span class="arrow top"></span> <a href="#">Settings</a> </li>
                        <li> <a href="profile.html">Profile</a> </li>
                        <li>
                            <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
                        </li>
                        <li> <a href="docs.html">Help</a> </li>
                        <li class="divider"></li>
                        <li> <a href="?logout=logout" >Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </header>



        <section>
            <section class="hbox stretch">




                <!-- MENU LEFT  -->
                <!-- .aside -->
                <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
                    <section class="vbox">
                        <section class="w-f scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                




                                <div class="clearfix wrapper dk nav-user hidden-xs">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                            <span class="thumb avatar pull-left m-r"> 
                                                <img src="assets/images/a0.png" class="dker" alt="..."> 
                                                <i class="on md b-black"></i> 
                                            </span> 

                                            <span class="hidden-nav-xs clear"> 
                                                <span class="block m-t-xs"> 
                                                    <strong class="font-bold text-lt"><?php echo $_SESSION['admin_name']; ?></strong> 
                                                    <b class="caret"></b> 
                                                </span> 
                                                <span class="text-muted text-xs block">Admin</span> 
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                            <li> <span class="arrow top hidden-nav-xs"></span> <a href="#">Settings</a> </li>
                                            <li> <a href="profile.html">Profile</a> </li>
                                            <li>
                                                <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
                                            </li>
                                            <li> <a href="docs.html">Help</a> </li>
                                            <li class="divider"></li>
                                            <li> <a href="?logout=logout" >Logout</a> </li>
                                        </ul>
                                    </div>
                                </div>





                                <!-- nav -->
                                <nav class="nav-primary hidden-xs">
                                    
                                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Menu</div>


                                    <ul class="nav nav-main" data-ride="collapse">
                                        <li class="active">
                                            <a href="dashboard.php" class="auto"> 
                                                <i class="fas fa-water"></i> 
                                                <span class="font-bold">Water Level Check</span> 
                                            </a>
                                        </li>

                                        
                                        <li>
                                            <a href="#" class="auto">                                              
                                                <i class="fas fa-user"></i>
                                                <span class="font-bold">Admin Info</span> 
                                            </a>
                                            <ul class="nav dk">
                                                <li>
                                                    <a href="all_students.php" class="auto"> <i class="fas fa-glasses"></i></i> <span>See Admin Info</span> </a>
                                                </li>
                                                <li>
                                                    <a href="add_student.php" class="auto"> <!-- <i class="i i-dot"></i> --> <i class="far fa-edit"></i> <span>Edit Info</span> </a>
                                                </li>
                                               
                                            </ul>
                                        </li>

                                    </ul>

                                </nav>
                                <!-- / nav -->
                            </div>
                        </section>




                        <footer class="footer hidden-xs no-padder text-center-nav-xs">
                            <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a>
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a>
                        </footer>



                    </section>
                </aside>
                <!-- /.aside -->










                <!-- MAIN CONTENT  -->
                <section id="content">
                    <section class="hbox stretch">
                        <section>
                            <section class="vbox">
                                <section class="scrollable padder">


                                    <section class="row m-b-md">

                                        

                                    </section>

