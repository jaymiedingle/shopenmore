<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php


if(!isset($_SESSION['admindata'])){
  echo '<script>window.location.href = "404.php";</script>';
  exit;
}

$profile = $_SESSION['admindata'];

// Check if addstuff form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  
    /*call file_upload function in common*/
    $upload_dir = 'uploads/items/';
    $image_url = Common::file_upload($_FILES["files"], $upload_dir);

     /*step 2 gather form data to be saved in database*/
      /*predefined value for registration form*/
      $user_id = $profile['id']; //user role id for members
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

        echo '<script>window.location.href = "items.php";</script>';
     }
}


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.additem {
    background-color: #6eb752;
} 
.additem a{
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
                        <h1>Add Item</h1>
                        <a href="items.php" class="btn btn-success pull-right"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Item list</a>
                        <p class="lead">Add items to your list of stuff.</p>


                        <hr>

                        <form name="additem" id="additem" enctype="multipart/form-data" method="POST">

                            <div class="row">
                                <div class="col-sm-6">
                                    <img id="image" style="width:100%;height:50%" class="img-thumbnail form-thumbnail"  src="../images/thumbnail-default.png"><br />
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
                                      <a href="javascript:history.go(-1)" class="btn btn-danger pull-right" >Cancel</a>
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