<?php    
    session_start();
    include_once dirname(__FILE__) . "/autoload.php";   
    use Apps\Libs\Admins\Admin;

    $admin = new Admin;


    if( isset($_SESSION['admin_name']) ){
        header("location:dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="assets\hydrocheck.ico">
    <title>HydroCheck | Web</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="assets/css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">

        
        <?php  

            if( isset($_POST['submit']) ){

                // Get data from form 
                $name = $_POST['name'];

                // User management 
                $uname = $_POST['uname'];
                $admin_name_check = $admin -> userNameCheck($uname);

                // Email check
                $email = $_POST['email'];
                $email_check = $admin -> emailCheck($email);

                // Password hash manage
                $pass = $_POST['pass'];
                $hash_pass = password_hash( $pass, PASSWORD_DEFAULT);


                //  Agree value manage
                if( isset($_POST['agree']) ){
                    $agree = true;
                }else{
                    $agree = false;
                }



                if( empty($name) || empty($uname) || empty($email) || empty($pass) ){
                    $mess = "<p class='alert alert-danger'>Field must not be empty !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }elseif( $agree == false ) {
                    $mess = "<p class='alert alert-danger'>Check agree to go !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }elseif( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
                    $mess = "<p class='alert alert-danger'>Invalid Email address !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }elseif($admin_name_check == false){
                    $mess = "<p class='alert alert-danger'>Username already exists !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }elseif($email_check == false){
                    $mess = "<p class='alert alert-danger'>Email already exists !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }else{

                    $data = $admin -> addInfo($name, $uname, $email, $hash_pass);

                    if( $data == true ){
                        $mess = "<p class='alert alert-success'>Admin Registration successfull !<button class='close' data-dismiss='alert'>&times;</button></p>";
                    }
                }

            }


        ?>



    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Create an account</a>
            <br>
            <section class="m-b-lg">

                <div class="mess">
                    <?php  

                      if( isset($mess) ){
                        echo $mess;
                      }

                    ?>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


                    <div class="list-group">
                        <div class="list-group-item">
                            <input name="name" placeholder="Name" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="uname" placeholder="Username" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="email" placeholder="Email" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="pass" type="password" placeholder="Password" type="password" class="form-control no-border"> 
                        </div>
                    </div>


                    <div class="checkbox m-b">
                        <label>
                            <input name="agree" value="agree" type="checkbox"> Agree Terms and Policy </label>
                    </div>


                    <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>


                    <div class="line line-dashed"></div>


                    <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a> 
                </form>





            </section>
        </div>
    </section>



















    <!-- Bootstrap -->
    <!-- App -->
    <script src="assets/js/app.v1.js"></script>
    <script src="assets/js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

</html>