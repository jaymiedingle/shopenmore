<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php


$profile = $_SESSION['admindata'];

//get items of user
$items = DB::queryFullColumns("SELECT * FROM tb_items 
           LEFT JOIN tb_users 
           ON tb_items.user_id = tb_users.id 
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id 
           WHERE tb_users.is_active = %i ", true );


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.home > a{
    color: #fff;
    background-color: #6eb752;
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

                
                 <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Admin Panel</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="index.php"><i class="fa fa-list"></i> Items</a>
                                </li>
                                <li>
                                    <a href="users.php"><i class="fa fa-user"></i> Users</a>
                                </li>
                                <li>
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

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>Item List</h1>
                        <a href="additem.php" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>

                        <p class="lead">Listing of all items in system</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($items as $key=>$item) { ?>
                                    <tr>
                                        <th><?php echo ($key + 1); ?></th>
                                        <td>
                                            <a href="detail.php?id=<?php echo $item['tb_items.id']; ?>">
                                                <?php echo $item['tb_items.name']; ?>
                                            </a>
                                        </td>
                                        <td>&#8369;<?php echo $item['tb_items.price']; ?>.00</td>
                                        <td><span class="label label-<?php echo $item['tb_item_status.theme']; ?>"><?php echo $item['tb_item_status.name']; ?></span>
                                        </td>
                                        <td>
                                            <a href="edititem.php?id=<?php echo $item['tb_items.id']; ?>" class="btn btn-default btn-sm" alt="Edit">Activate</a>
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