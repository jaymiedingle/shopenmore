<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>
<?php include('includes/nav-bar.php'); ?>

<?php

if(!isset($_SESSION['userdata'])){
  echo '<script>window.location.href = "404.php";</script>';
  exit;
}

$profile = $_SESSION['userdata'];

/*rate*/
$positive_rate = DB::query("SELECT * FROM tb_rating WHERE rate = 1 AND user_id = %i", $profile['id']);
$positive_rate_count = DB::count();

$negative_rate = DB::query("SELECT * FROM tb_rating WHERE rate = 0 AND user_id = %i", $profile['id']);
$negative_rate_count = DB::count();


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


        $type = 'success';
        $message = "Profile updated successfully";
        Common::display_message_alert($type, $message);
        echo '<script>window.location.href = "profile.php";</script>';
     }

}
?>


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            My Account
                        </li>
                        <li>Profile</li>
                    </ul>
                </div>

                
                 <?php include('includes/account-sidemenu.php'); ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <form id="profile-form" name="profile-form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <h1><?php echo ucwords($profile['fname']); ?>'s Profile</h1>
                                <p class="lead">
                                    <?php echo ucwords($profile['fname']); ?> <?php echo ucwords($profile['lname']); ?>
                                    &nbsp;
                                    <small class="" style="font-size:14px;font-style:italic">
                                        <i class="fa fa-envelope"></i> 
                                        <?php echo $profile['email']; ?>
                                    </small>
                                </p>

                                <div class="">
                                    People's rating &nbsp;
                                    <div class="btn-group" data-toggle="buttons">
                                      <label class="btn btn-primary active">
                                        <input type="radio" name="rate" autocomplete="off" value="1" ><i class="fa fa-thumbs-up" aria-hidden="true"> <?php echo $positive_rate_count;?></i>
                                      </label>&nbsp;
                                      <label class="btn btn-danger active">
                                        <input type="radio" name="rate" autocomplete="off" value="0"><i class="fa fa-thumbs-down" aria-hidden="true"> <?php echo $negative_rate_count;?></i>
                                      </label>
                                    </div>
                                </div>
                                
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

 <!--give active state to navigation-->
  <script type="text/javascript">
    var page = 'myaccount';
    $("." + page + " > a").addClass("active");

    var sub_page = "profile";
    $("." + sub_page).addClass("active");
  </script>