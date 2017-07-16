<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php


$profile = $_SESSION['admindata'];

//get users of user
$banners = DB::query("SELECT * FROM tb_banners WHERE is_active = 1");


?>


    <div id="all">

        <div id="content">
            <div class="container">

                <br>

                
                 <?php include('includes/admin-sidemenu.php'); ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">

                        <h1>Banner Ad List</h1>
                        <a href="addbanner.php" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>

                        <p class="lead">Listing of all banner ads.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Preview</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($banners as $key=>$banner) { ?>
                                    <tr>
                                        <th><?php echo ($key + 1); ?></th>

                                        <td>
                                            <img class="thumnail" style="width:160px;height:60px" src="uploads/banners/<?php echo ($banner['image_url']); ?>" />  
                                        </td>
                                       
                                        <td>
                                            <?php echo ucwords($banner['name']); ?>
                                        </td>

                                        <td>
                                            <?php echo $banner['link']; ?>
                                        </td>
                                       
                                        <td>
                                            <a href="editbanner.php?id=<?php echo $banner['id']; ?>" class="btn btn-warning btn-sm" alt="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="deletebanner.php?id=<?php echo $banner['id']; ?>" class="btn btn-danger btn-sm" alt="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
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
var sub_page = "banners";
$("." + sub_page).addClass("active");
</script>