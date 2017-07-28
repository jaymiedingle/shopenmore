<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>


<?php
$profile = $_SESSION['admindata'];

if($profile['user_role_id'] != 1){
  echo '<script>window.location.href = "404.php";</script>';
  exit;
}

$profile = $_SESSION['admindata'];

// Check if registration form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['adduser'])){

      /*step 1 check and validate file to upload*/
      /*call file_upload function in common*/
        $upload_dir = 'uploads/users/';
        $image_url = Common::file_upload($_FILES["files"], $upload_dir);


         /*step 2 gather form data to be saved in database*/
          /*predefined value for registration form*/
          $is_active = 1; //flag for active users

          $data = array(
              'student_id' => $_POST['student_id'],
              'email' => $_POST['email'],
              'fname' => $_POST['fname'],
              // 'mname' => $_POST['mname'],
              'lname' => $_POST['lname'],
              'contact' => $_POST['contact'],
              'password' => md5($_POST['password']),
              'image_url' => $image_url,
              'user_role_id' => $_POST['user_role_id'],
              'is_active' => $is_active,
            );

          //insert data in database
         $inserted = DB::insert('tb_users',$data);

         if($inserted){
            $type = 'success';
            $message = "User added successfully";
            Common::display_message_alert($type, $message);
            echo '<script>window.location.href = "users.php";</script>';
         }
    }
      

}


?>

    <div id="all">
      <div id="content">
        <div class="container">

                <!-- <div class="col-md-12">
                    <ul class="breadcrumb" style="margin-top:10px">
                        </li>
                        <li>Item List</li>
                    </ul>
                </div> -->
                <br>

                
                <?php include('includes/admin-sidemenu.php'); ?>

                <div class="col-md-9">
                    <div class="box">
                        <h1>Add user</h1>
                        <a href="users.php" class="btn btn-success pull-right"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to User list</a>
                        <p class="lead">Add users to the system</p>

                        <hr>

                        <form id="adduserform" name="adduserform" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;float:right" />
                                <img id="image" style="width:40%;height:20%" class="img-thumbnail form-thumbnail"  src="../images/default.png"><br />
                            </div>
                            <div class="form-group">
                                <label for="fname">User Role</label>
                                <select name="user_role_id" style="width:100%" required>
                                    <option value="">--select--</option>
                                    <?php 
                                    $user_role = DB::query("SELECT * FROM tb_user_role");
                                    foreach($user_role as $key=>$role){ 
                                    ?>
                                    <option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            
                            <div class="form-group">
                                <label for="student_id">Student ID</label>
                                <input type="text" class="form-control" id="student_id" name="student_id" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="fname">First name</label>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>

                            <!-- <div class="form-group"> -->
                                <!-- <label for="mname">Middle name</label> -->
                                <!-- <input type="text" class="form-control" id="mname" name="mname" required> -->
                            <!-- </div> -->

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
                                <input class="btn btn-primary" type="submit" name="adduser" value="Save user">
                            </div>
                        </form>
                    </div>
                </div>



            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>
 <!--give active state to navigation-->
<script type="text/javascript">
var sub_page = "users";
$("." + sub_page).addClass("active");
</script>