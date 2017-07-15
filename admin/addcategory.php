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

    if(isset($_POST['addcategory'])){

      /*step 1 check and validate file to upload*/
      /*call file_upload function in common*/
        $upload_dir = 'uploads/category/';
        $image_url = Common::file_upload($_FILES["files"], $upload_dir);


         /*step 2 gather form data to be saved in database*/
          /*predefined value for registration form*/
          $is_active = 1; //flag for active users

          $data = array(
              'name' => $_POST['name'],
              'image_url' => $image_url,
              'is_active' => $is_active,
            );

          //insert data in database
         $inserted = DB::insert('tb_item_category',$data);

         if($inserted){
            $type = 'success';
            $message = "Category added successfully";
            Common::display_message_alert($type, $message);
            echo '<script>window.location.href = "categories.php";</script>';
         }
    }
      

}


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.categories {
    background-color: #6eb752;
} 
.categories a{
    color: #fff !important;
} 
</style>


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
                        <h1>Add Category</h1>

                        <p class="lead">Add category item to the system</p>

                        <hr>

                        <form id="addcategoryform" name="addcategoryform" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                
                                <img id="image" style="width:40%;height:20%" class="img-thumbnail form-thumbnail"  src="../images/thumbnail-default.png"><br />
                                <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;" />
                            </div>
                          

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>



                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" name="addcategory" value="Save category">
                            </div>
                        </form>
                    </div>
                </div>



            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>