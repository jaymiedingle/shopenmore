<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php


if(!isset($_SESSION['admindata'])){
  echo '<script>window.location.href = "404.php";</script>';
  exit;
}

$profile = $_SESSION['admindata'];


$banner_to_edit = $_GET['id'];

$edit_banner = DB::query("SELECT * FROM tb_banners WHERE id = %i", $banner_to_edit);
$edit_banner = $edit_banner[0];




// Check if registration form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['editbanner'])){

      /*step 1 check and validate file to upload*/
      /*call file_upload function in common*/
        $upload_dir = 'uploads/banners/';
        $get_image_url = Common::file_upload($_FILES["files"], $upload_dir);
        $image_url = ($get_image_url) ? $get_image_url : $edit_banner['image_url'];


         /*step 2 gather form data to be saved in database*/
          /*predefined value for registration form*/
          $is_active = 1; //flag for active users

          $data = array(
              'name' => $_POST['name'],
              'link' => $_POST['link'],
              'image_url' => $image_url,
              'is_active' => $is_active,
            );

          //insert data in database
         $updated = DB::update('tb_banners',$data, "id=%s", $edit_banner['id']);

         if($updated){
            $type = 'success';
            $message = "Banner updated successfully";
            Common::display_message_alert($type, $message);
            echo '<script>window.location.href = "banners.php";</script>';
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
                        <h1>Edit banner</h1>
                        <a href="banners.php" class="btn btn-success pull-right"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to banner list</a>
                        <p class="lead">Edit banner : <span class="highlight"><?php echo ucwords($edit_banner['name']); ?></span> </p>

                        <hr>

                        <form id="editbannerform" name="editbannerform" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                
                                <img id="image" style="width:80%;height:160px" class="img-thumbnail form-thumbnail"  src="<?php echo (isset($edit_banner['image_url'])) ? 'uploads/banners/' . $edit_banner['image_url'] : '../images/thumbnail-default.png'; ?>"><br />
                                <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;" />
                            </div>
                          

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($edit_banner['name'])) ? $edit_banner['name'] : ''; ?>" required>
                            </div>

                             <div class="form-group">
                                <label for="link">Link url</label>
                                <input type="text" class="form-control" id="link" name="link" value="<?php echo (isset($edit_banner['link'])) ? $edit_banner['link'] : ''; ?>">
                            </div>


                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" name="editbanner" value="Edit banner">
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
  var sub_page = "categories";
  $("." + sub_page).addClass("active");
  </script>