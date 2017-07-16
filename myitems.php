<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php

if(!isset($_SESSION['userdata'])){
  echo '<script>window.location.href = "404.php";</script>';
    exit;
}


$profile = $_SESSION['userdata'];

//get items of user
$items = DB::queryFullColumns("SELECT * FROM tb_items 
           LEFT JOIN tb_users 
           ON tb_items.user_id = tb_users.id 
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id 
           WHERE tb_users.id = %i ", $profile['id'] );





?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.myaccount >a,
.myitem > a{
    color: #fff !important;
    background-color: #6eb752;
} 
.myaccount > a:hover, .myaccount > li:hover,
.myitem > a:hover, .profile > li:hover{
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
                        <li><?php echo $category['name']; ?></li>
                    </ul>
                </div>

                
                 <?php include('includes/account-sidemenu.php'); ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My Items</h1>
                        <a href="additem.php" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>

                        <p class="lead">Your orders on one place.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($items as $key=>$item) { ?>
                                    <tr>
                                        <th><?php echo ($key + 1); ?></th>
                                        <td>
                                            <a href="detail.php?id=<?php echo $item['tb_items.id']; ?>">
                                                <?php echo ucwords($item['tb_items.name']); ?>
                                            </a>
                                        </td>
                                        <td>&#8369;<?php echo $item['tb_items.price']; ?>.00</td>
                                        <td><span class="label label-<?php echo $item['tb_item_status.theme']; ?>"><?php echo $item['tb_item_status.name']; ?></span>
                                        </td>
                                        <td>
                                            <span class="label label-<?php echo ($item['tb_items.is_active'] ) ? 'primary' : 'default'; ?>">
                                            <?php echo ($item['tb_items.is_active'] ) ? 'Active' : 'Pending'; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="edititem.php?id=<?php echo $item['tb_items.id']; ?>" class="btn btn-warning btn-sm" alt="Edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                            <a href="deleteitem.php?id=<?php echo $item['tb_items.id']; ?>" class="btn btn-danger btn-sm" alt="Delete"><i class="fa fa-times" aria-hidden="true"></i> Remove</a>
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
    var page = 'myaccount';
    $("." + page + " > a").addClass("active");

    var sub_page = "myitem";
    $("." + sub_page).addClass("active");
  </script>