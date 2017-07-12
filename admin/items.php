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
           ON tb_items.item_status_id = tb_item_status.id");


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.items {
    background-color: #6eb752;
} 
.items a{
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

                <!--alert display-->
                <?php if(isset($_SESSION['error'])) { ?>}
                <div class="container">
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-dismissible" style="display:none" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <?php echo $_SESSION['error']; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!--end alert display-->

                <br>

                
                <?php include('includes/admin-sidemenu.php'); ?>

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
                                        <th>Owner</th>
                                        <th>Status</th>
                                        <th>Activate</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($items as $key=>$item) { ?>
                                    <tr>
                                        <th><?php echo ($key + 1); ?></th>
                                        <td>
                                            <a href="itemdetail.php?id=<?php echo $item['tb_items.id']; ?>">
                                                <?php echo $item['tb_items.name']; ?>
                                            </a>
                                        </td>
                                        <td>&#8369;<?php echo $item['tb_items.price']; ?>.00</td>
                                        <td><?php echo ucwords($item['tb_users.fname']); ?> <?php echo ucwords($item['tb_users.lname']); ?></td>
                                        <td><span class="label label-<?php echo $item['tb_item_status.theme']; ?>"><?php echo $item['tb_item_status.name']; ?></span>
                                        </td>
                                        <td>

                                            <!-- Rounded switch -->
                                            <label class="switch">
                                              <input class="tb_items" alt="<?php echo $item['tb_items.id']; ?>" type="checkbox" <?php echo ($item['tb_items.is_active'] ) ? 'checked' : ''; ?>>
                                              <div class="slider round"></div>
                                            </label>

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