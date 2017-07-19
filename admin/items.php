<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>


<?php


$profile = $_SESSION['admindata'];

/*pagination data*/
$limit = 10;
$current_page = isset($_GET['page']) ? $_GET['page'] : 0;
DB::query("SELECT * FROM tb_items WHERE is_active = 1");
$total_count = DB::count();
$pages_count = ceil($total_count / $limit);
$offset = ($current_page == 0) ? 0 : ($current_page - 1) * $limit;

//get items of user
$items = DB::queryFullColumns("SELECT * FROM tb_items 
           LEFT JOIN tb_users 
           ON tb_items.user_id = tb_users.id 
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id ORDER BY date_posted DESC LIMIT $offset,$limit");


?>


    <div id="all">

        <div id="content">
            <div class="container">


                
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
                                        <th>Category</th>
                                        <th>Item name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Activate</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($items as $key=>$item) { ?>
                                    <tr>
                                        <th><?php echo ($key + 1); ?></th>
                                        <td>
                                            <?php echo $item['tb_item_category.name']; ?>
                                        </td>
                                        <td>
                                            <a href="itemdetail.php?id=<?php echo $item['tb_items.id']; ?>">
                                                <?php echo $item['tb_items.name']; ?>
                                            </a>
                                        </td>
                                        <td>&#8369;<?php echo $item['tb_items.price']; ?>.00</td>
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

                        <!--pagination-->
                        <div class="pages">
                            <?php echo Common::pagination($current_page, $pages_count); ?>
                        </div>
                        <!--end pagination-->

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
var sub_page = "items";
$("." + sub_page).addClass("active");
</script>