<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php

 $get_category_id = isset($_GET['id']) ?  $_GET['id'] : 'No Category set';

//get site info from database
$category = DB::queryFirstRow("SELECT * FROM tb_item_category WHERE id=%s", $get_category_id);

$category_items = DB::query("SELECT * FROM tb_items WHERE is_active = 1 AND item_category_id = " . $category['id']);



?>


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><?php echo ucwords($category['name']); ?></li>
                    </ul>
                </div>

                
                <?php include('includes/sidemenu.php'); ?>
               

                <div class="col-md-9">

                    <div class="box">
                        <h1><?php echo $category['name']; ?></h1>
                    </div>


                    <div class="row products">
                        
                        <!--loop item-->
                        <?php foreach($category_items as $key=>$item){ ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product same-height" >
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" style="width:100%;height:280px" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item['image_url']; ?>" style="width:100%;height:300px" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" style="width:100%;height:280px" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?id=<?php echo $item['id']; ?>"><?php echo ucwords($item['name']); ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item['price']; ?>.00</p>
                                    <p class="buttons">
                                        <a href="detail.php?id=<?php echo $item['id']; ?>" class="btn btn-default">View detail</a>
                                        <!-- <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>

                       

                    </div>
                    <!-- /.products -->

                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>

 <!--give active state to navigation-->
  <script type="text/javascript">
    var page = 'category';
    $("." + page + " > a").addClass("active");

    var category_id = "<?php echo $get_category_id; ?>";
    $(".category_" + category_id).addClass("active");
  </script>