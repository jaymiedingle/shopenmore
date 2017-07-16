<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>


<?php


if(!isset($_SESSION['admindata'])){
  echo '<script>window.location.href = "404.php";</script>';
  exit;
}

$profile = $_SESSION['admindata'];

// Check if registration form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['addbanner'])){

      /*step 1 check and validate file to upload*/
      /*call file_upload function in common*/
        $upload_dir = 'uploads/banners/';
        $image_url = Common::file_upload($_FILES["files"], $upload_dir);


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
         $inserted = DB::insert('tb_banners',$data);

         if($inserted){
            $type = 'success';
            $message = "Banner added successfully";
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
                        <h1>Add banner</h1>
                        <a href="banners.php" class="btn btn-success pull-right"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to banner list</a>
                        <p class="lead">Add banner item to the system</p>

                        <hr>

                        <form id="addbannerform" name="addbannerform" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                
                                <img id="image" style="width:80%;height:160px"class="img-thumbnail form-thumbnail"  src="../images/thumbnail-default.png"><br />
                                <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;" />
                            </div>
                          

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="link">Link url</label>
                                <input type="text" class="form-control" id="link" name="link" value="">
                            </div>



                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" name="addbanner" value="Save banner">
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
var sub_page = "banners";
$("." + sub_page).addClass("active");
</script>