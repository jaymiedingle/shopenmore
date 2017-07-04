<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php


$latest_item = DB::query("SELECT * FROM tb_items ORDER BY date_posted LIMIT 10 ");


?>


    <div id="all">

        <div id="content">

            <!--banner slider-->
            <?php include('includes/banner-slider.php'); ?>
            <!--end banner slider-->

            <!-- *** CATEGORIES ***
 _________________________________________________________ -->
            <div id="advantages">
                
                <!-- <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Categories</h2>
                        </div>
                    </div>
                </div> -->

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
                                            <a href="detail.html">
                                                <img style="height:200px" src="<?php echo $item['image_url']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img style="height:220px" src="<?php echo $item['image_url']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html"><?php echo $item['name']; ?></a></h3>
                                    <p class="price"><?php echo $item['price']; ?></p>
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