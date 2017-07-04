<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php

 $get_category_id = isset($_GET['id']) ?  $_GET['id'] : 'No Category set';

//get site info from database
$category = DB::queryFirstRow("SELECT * FROM tb_item_category WHERE id=%s", $get_category_id);

$category_items = DB::query("SELECT * FROM tb_items WHERE item_category_id = " . $category['id']);



?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.category > a{
    color: #fff !important;
    background-color: #6eb752;
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

                
                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <!--loop category-->
                                 <?php foreach($item_categories as $key=>$category){ ?>
                                 <?php
                                    /*count items per category*/
                                    DB::query("SELECT * FROM tb_items WHERE item_category_id=%s", $category['id']);
                                    $counter = DB::count();
                                 ?>
                                <li>
                                    <a href="category.php?id=<?php echo $category['id']; ?>"> <span class="badge pull-right"><?php echo $counter; ?></span> <?php echo $category['name']; ?> </a>
                                </li>
                                <?php } ?>
                                <!--end loop category-->
                            </ul>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                </div>

                <div class="col-md-9">

                    <div class="box">
                        <h1><?php echo $category['name']; ?></h1>
                    </div>


                    <div class="row products">
                        
                        <!--loop item-->
                        <?php foreach($category_items as $key=>$item){ ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img src="<?php echo $item['image_url']; ?>" alt="" style="width:100%;height:280px" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img src="<?php echo $item['image_url']; ?>" style="width:100%;height:300px" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html"><?php echo $item['name']; ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item['price']; ?>.00</p>
                                    <p class="buttons">
                                        <a href="detail.php?id=<?php echo $item['id']; ?>" class="btn btn-default">View detail</a>
                                        <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>

                       

                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>