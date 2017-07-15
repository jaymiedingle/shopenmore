<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php


if(!isset($_SESSION['admindata'])){
  echo '<script>window.location.href = "404.php";</script>';
  exit;
}

$profile = $_SESSION['admindata'];


$category_to_edit = $_GET['id'];

$edit_category = DB::query("SELECT * FROM tb_item_category WHERE id = %i", $category_to_edit);
$edit_category = $edit_category[0];




// Check if registration form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['editcategory'])){

      /*step 1 check and validate file to upload*/
      /*call file_upload function in common*/
        $upload_dir = 'uploads/category/';
        $get_image_url = Common::file_upload($_FILES["files"], $upload_dir);
        $image_url = ($get_image_url) ? $get_image_url : $edit_category['image_url'];


         /*step 2 gather form data to be saved in database*/
          /*predefined value for registration form*/
          $is_active = 1; //flag for active users

          $data = array(
              'name' => $_POST['name'],
              'image_url' => $image_url,
              'is_active' => $is_active,
            );

          //insert data in database
         $updated = DB::update('tb_item_category',$data, "id=%s", $edit_category['id']);

         if($updated){
            $type = 'success';
            $message = "Category updated successfully";
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
                        <h1>Edit Category</h1>

                        <p class="lead">Edit Category : <span class="highlight"><?php echo ucwords($edit_category['name']); ?></span> </p>

                        <hr>

                        <form id="editcategoryform" name="editcategoryform" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                
                                <img id="image" style="width:40%;height:20%" class="img-thumbnail form-thumbnail"  src="<?php echo (isset($edit_category['image_url'])) ? 'uploads/category/' . $edit_category['image_url'] : '../images/thumbnail-default.png'; ?>"><br />
                                <input type="file" id="files" name="files" class="btn btn-secondary" style="font-size:11px;" />
                            </div>
                          

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($edit_category['name'])) ? $edit_category['name'] : ''; ?>" required>
                            </div>



                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" name="editcategory" value="Edit category">
                            </div>
                        </form>
                    </div>
                </div>



            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>