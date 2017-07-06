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
    // Check if file was uploaded without errors
    if(isset($_FILES["files"]) && $_FILES["files"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["files"]["name"];
        $filetype = $_FILES["files"]["type"];
        $filesize = $_FILES["files"]["size"];

        $upload_dir = 'admin/uploads/items/';
    
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
      $user_id = $_SESSION['userdata']['id']; //user role id for members
      $is_active = 1; //flag for active users

      $data = array(
          'name' => $_POST['name'],
          'price' => $_POST['price'],
          'item_category_id' => $_POST['item_category_id'],
          'item_status_id' => $_POST['item_status_id'],
          'description' => $_POST['description'],
          'image_url' => $image_url,
          'user_id' => $user_id,
          'is_active' => $is_active,
        );

      //insert data in database
     $inserted = DB::insert('tb_items',$data);

     if($inserted){
        echo '<script>window.location.href = "myitems.php";</script>';
     }
}


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.profile > a{
    color: #fff;
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

                
                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo ucwords($profile['fname']); ?>'s Account</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="profile.php"><i class="fa fa-user"></i> <?php echo ucwords($profile['fname']); ?>'s Profile</a>
                                </li>
                                <li>
                                    <a href="myitems.php"><i class="fa fa-list"></i> My items</a>
                                </li>
                                <li class="active">
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

                <div class="col-md-9">
                    <div class="box">
                        <h1>Add Item</h1>
                        <p class="lead">Add items to your list of stuff.</p>


                        <hr>

                        <form name="additem" id="additem" enctype="multipart/form-data" method="POST">

                            <div class="row">
                                <div class="col-sm-6">
                                    <img id="image" style="width:100%;height:50%" class="img-thumbnail form-thumbnail"  src="images/thumbnail-default.png"><br />
                                    <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;" value="Change Profile" />
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="name">Item name</label>
                                      <input type="text" name="name" class="form-control" placeholder="Item name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="lname">Price</label>
                                      <input type="text" name="price" class="form-control"  placeholder="0.00" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="fname">Status</label>
                                      <select name="item_status_id" style="width:100%" required>
                                          <option value="">--select--</option>
                                          <?php 
                                          $item_status = DB::query("SELECT * FROM tb_item_status");
                                          foreach($item_status as $key=>$status){ 
                                          ?>
                                          <option value="<?php echo $status['id']; ?>"><?php echo $status['name']; ?></option>
                                          <?php } ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Category</label>
                                      <select name="item_category_id" style="width:100%" required>
                                        <option value="">--select--</option>
                                          <?php foreach($item_categories as $key=>$category){ ?>
                                          <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                          <?php } ?>
                                      </select>
                                    </div>
                                    

                                    <div class="form-group">
                                      <label for="fname">Description</label>
                                      <textarea name="description" style="width:100%"></textarea>
                                    </div>
                                    
                                    <div style="float:right;margin:10% 0">
                                      <input type="submit" class="btn btn-primary" name="btn-register" value="Add Item">&nbsp;
                                      <a href="mystuff.php" class="btn btn-danger pull-right" >Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>