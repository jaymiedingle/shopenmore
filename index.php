<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php


$latest_item = DB::query("SELECT * FROM tb_items WHERE is_active = 1 ORDER BY date_posted DESC LIMIT 10 ");


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.home > a{
    color: #fff !important;
    background-color: #6eb752;
} 
.home > a:hover, .home > li:hover{
    color: #000 !important;
    /*background-color: #6eb752;*/
} 
</style>

    <div id="all">

        <div id="content">


            <!--banner slider-->
            <?php include('includes/banner-slider.php'); ?>
            <!--end banner slider-->

            <!-- *** CATEGORIES ***
 _________________________________________________________ -->
            <div id="advantages">
                

                <div class="container">
                    <div class="same-height-row">
                        <!--loop category-->
                        <?php foreach($item_categories as $key=>$category){ ?>
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <!-- <div class="icon">
                                    <i class="fa fa-desktop"></i>
                                </div> -->

                                <h3><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></h3>
                                <img style="height:140px;width:80%" src="<?php echo $category['image_url']; ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <!--end loop category-->

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** CATEGORIES END *** -->

            <!-- *** LATEST ITEMS SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Latest items</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">

                        <!--latest items loop-->
                        <?php foreach($latest_item as $key=>$item){ ?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img style="width:100%;height:200px" src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img style="width:100%;height:220px" src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?id=<?php echo $item['id']; ?>" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item['price']; ?>.00</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>
                        <!--end latest items loop-->


                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** LATEST ITEMS END *** -->

  


        </div>
        <!-- /#content -->

  <?php include('includes/footer.php'); ?>