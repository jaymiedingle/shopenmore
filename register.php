<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php


if(isset($_SESSION['userdata'])){
    echo '<script>window.location.href = "index.php";</script>';
    exit;
}


// Check if registration form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['register'])){

      /*step 1 check and validate file to upload*/
        // Check if file was uploaded without errors
        if(isset($_FILES["files"]) && $_FILES["files"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["files"]["name"];
            $filetype = $_FILES["files"]["type"];
            $filesize = $_FILES["files"]["size"];

            $upload_dir = 'admin/uploads/users/';
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){

              $unique_filename = time().uniqid(rand())."-".$filename;
              move_uploaded_file($_FILES["files"]["tmp_name"], $upload_dir . $unique_filename);
              $image_url = $upload_dir.$unique_filename;
            } 
        } else {
            $image_url = '';
        }



         /*step 2 gather form data to be saved in database*/
          /*predefined value for registration form*/
          $user_role_id = 3; //user role id for members
          $is_active = 1; //flag for active users

          $data = array(
              'email' => $_POST['email'],
              'fname' => $_POST['fname'],
              'lname' => $_POST['lname'],
              'contact' => $_POST['contact'],
              'password' => md5($_POST['password']),
              'image_url' => $image_url,
              'user_role_id' => $user_role_id,
              'is_active' => $is_active,
            );

          //insert data in database
         $inserted = DB::insert('tb_users',$data);

         if($inserted){
            echo '<script>window.location.href = "index.php";</script>';
         }
    }
      

}


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.category > a{
    color: #fff !important;
    background-color: #6eb752;
} 
</style>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><?php echo $category['name']; ?></li>
                    </ul>
                </div>

                
                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered member yet?</p>

                        <hr>

                        <form id="registration" name="registration" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;float:right" />
                                <img id="image" style="width:40%;height:20%" class="img-thumbnail form-thumbnail"  src="images/default.png"><br />
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="fname">First name</label>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>

                            <div class="form-group">
                                <label for="lname">Last name</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>


                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" name="register" value="Register">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>

                        <hr>

                        <form name="login" id="login" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email-modal" name="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password-modal" name="password" placeholder="password">
                        </div>

                        <p class="text-center">
                           <!--  <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button> -->
                            <input class="btn btn-primary" type="submit" name="login" value="Login">
                        </p>

                    </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>