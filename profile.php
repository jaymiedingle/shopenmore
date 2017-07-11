<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php

if(!isset($_SESSION['userdata'])){
  echo '<script>window.location.href = "404.php";</script>';
  exit;
}

$profile = $_SESSION['userdata'];


// Check if addstuff form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  /*step 1 check and validate file to upload*/
  /*call file_upload function in common*/
    $upload_dir = 'admin/uploads/users/';
    $get_image_url = Common::file_upload($_FILES["files"], $upload_dir);
    $image_url = ($get_image_url) ? $get_image_url : $profile['image_url'];

     /*step 2 gather form data to be saved in database*/
      /*predefined value for registration form*/
      
      $is_active = 1; //flag for active users

      $data = array(
          'contact' => $_POST['contact'],
          'password' => ($_POST['password'] != "") ? md5($_POST['password']) : $profile['password'],
          'image_url' => $image_url,
        );

      //insert data in database
     $updated = DB::update('tb_users',$data, "id=%s", $profile['id']);

     if($updated){
        /*reset session data*/
        $userdata = DB::queryFirstRow("SELECT * FROM tb_users WHERE id=%s", $profile['id']);
        $_SESSION['userdata'] = $userdata;
        $profile = $_SESSION['userdata'];

        echo '<script>window.location.href = "profile.php";</script>';
     }

}
?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.profile > a{
    color: #fff !important;
    background-color: #6eb752;
} 
.profile > a:hover, .profile > li:hover{
    color: #000 !important;
    /*background-color: #6eb752;*/
} 
</style>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>My Account</li>
                    </ul>
                </div>

                
                 <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo ucwords($profile['fname']); ?>'s Account</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="profile.php"><i class="fa fa-user"></i> <?php echo ucwords($profile['fname']); ?>'s Profile</a>
                                </li>
                                <li>
                                    <a href="myitems.php"><i class="fa fa-list"></i> My items</a>
                                </li>
                                <li>
                                    <a href="additem.php"><i class="fa fa-plus"></i> Add item</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <form id="profile-form" name="profile-form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <h1><?php echo ucwords($profile['fname']); ?>'s Profile</h1>
                                <p class="lead">
                                    <?php echo ucwords($profile['fname']); ?> <?php echo ucwords($profile['lname']); ?>
                                    &nbsp;
                                    <small class="btn btn-danger btn-small" style="font-size:11px;font-style:italic">
                                        <i class="fa fa-envelope"></i> 
                                        <?php echo $profile['email']; ?>
                                    </small>
                                </p>
                                
                            </div> 
                            <div class="col-md-4">
                                <?php if(($profile['image_url']) && isset($profile['image_url'])){ ?>
                                <img id="image" style="width:100%;height:30%" class="img-thumbnail form-thumbnail"  src="admin/uploads/users/<?php echo $_SESSION['userdata']['image_url']; ?>"><br />
                                <?php }else{ ?>
                                <img id="image" style="width:100%;height:30%" class="img-thumbnail form-thumbnail"  src="images/default.png"><br />
                                <?php } ?>
                                <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;" value="Change Profile" />
                            </div>
                        </div>
                        

                        <hr>

                        <h3>Update Profile</h3>
                            <span class="error-wrap password-error-wrap"></span>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" id="contact" value="<?php echo $profile['contact']; ?>" name="contact" required>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
                            </div>
                        </form>

                        <hr>


                    </div>
                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

 <?php include('includes/footer.php'); ?>