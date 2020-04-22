<?php require_once dirname(__FILE__) . "/templates/header.php"; ?>

    <?php  


        if( isset($_POST['submit']) ){

          // get form data 
            $sname = $_POST['sname'];
            $roll = $_POST['roll'];
            $reg = $_POST['reg'];
            $board = $_POST['board'];
            $ins = $_POST['ins'];


            // File management 
            $sphoto = $_FILES['sphoto']['name'];
            $sphotot = $_FILES['sphoto']['tmp_name'];
            $pic_ext_array =  explode('.', $sphoto);
            $ext = end($pic_ext_array);
            $u_pic_name = md5(time().rand(). $sphoto ).'.'. strtolower(  $ext );



            if( empty($sname) || empty($roll) || empty($reg) || empty($board) || empty($ins) || empty( $sphoto)  ){
                $mess = "<p class='alert alert-danger'>Field must not be empty !<button class='close' data-dismiss='alert'>&times;</button></p>";
            }else{

                $mess = $student -> addStudents($sname, $roll, $reg, $board, $ins, $sphotot, $u_pic_name );
                


            }


        }


    ?>

    <div class="row">
        <div class="col-md-12">
            <section class="panel b-a">

                <div class="panel-heading b-b">  
                    <a href="#" class="font-bold">Edit Admin Information</a> 
                </div>

                <div class="panel-body"> 
                <!-- MAIN CODE GOES HERE  -->

                    <div class="mess">
                        <?php  

                          if( isset($mess) ){
                            echo $mess;
                          }

                        ?>
                    </div>
                    <form action="<?php  echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label for="">Admin Name</label>
                        <input name="sname" class="form-control" type="text">
                      </div>

                      <div class="form-group">
                        <label for="">Admin Username</label>
                        <input name="roll" class="form-control" type="text">
                      </div>

                      <div class="form-group">
                        <label for="">Admin Email</label>
                        <input name="reg" class="form-control" type="text">
                      </div>

                      <div class="form-group">
                        <label for="">Admin Password</label>
                        <input name="board" class="form-control" type="password">
                      </div>

                      <div class="form-group">
                        <label for="">Admin Cell</label>
                        <input name="ins" class="form-control" type="text">
                      </div>


                      <div class="form-group">
                        <label for="">Admin Photo</label>
                        <input name="sphoto" class="" type="file">
                      </div>

                      <div class="form-group">
                    
                        <input name="submit" class="btn btn-success" type="submit" value="Update Information">
                      </div>

                    </form>

                     


                </div>

                <div class="clearfix panel-footer"> 

                </div>
            </section>
        </div>
    </div>

<?php require_once dirname(__FILE__) . "/templates/footer.php"; ?>



