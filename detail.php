<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php

$get_item_id = isset($_GET['id']) ?  $_GET['id'] : false;

$item = DB::queryFullColumns("SELECT * FROM tb_items 
           LEFT JOIN tb_users 
           ON tb_items.user_id = tb_users.id 
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id 
           WHERE 
           tb_items.is_active = 1 
           AND 
           tb_items.id = %i ", $get_item_id );


  $item = $item[0];

  /*other items form poster*/
  $item_by_owner = DB::query("SELECT * FROM tb_items 
           WHERE 
           is_active = 1 
           AND id != %i
           AND user_id = %i ",  $item['tb_items.id'], $item['tb_users.id']);



  if(empty($item) || $get_item_id == false){
    echo '<script>window.location.href = "404.php";</script>';
    exit;
}



?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.category > a{
    color: #fff !important;
    background-color: #6eb752;
} 
</style>

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59682226aec25f00114bf183&product=sticky-share-buttons"></script>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="category.php?id=<?php echo $item['tb_item_category.id']; ?>"><?php echo $item['tb_item_category.name']; ?></a>
                            
                        </li>
                        <li>
                            <?php echo $item['tb_items.name']; ?>
                        </li>
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

                    <!-- <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div> -->
                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="admin/uploads/items/<?php echo $item['tb_items.image_url'];?>" alt="" style="width:100%;height:440px" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon"><?php echo strtoupper($item['tb_item_status.name']);?></div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $item['tb_items.name']; ?></h1>
                                <p class="price">&#8369;<?php echo $item['tb_items.price']; ?>.00</p>
                                
                                <p class="goToDescription">
                                    <a href="#details" class="scroll-to">

                                        <img style="height:80px;width:80px;border-radius:50%" src="admin/uploads/users/<?php echo $item['tb_users.image_url'];?>">
                                        <br><br>
                                         by <?php echo $item['tb_users.fname'];?> <?php echo $item['tb_users.lname'];?> <br >ID# <?php echo $item['tb_users.student_id'];?>
                                    </a>
                                </p>

                                <p class="text-center buttons">

                                    <?php if(isset($_SESSION['userdata'])){ ?>
                                        <i class="fa fa-phone"></i> <?php echo $item['tb_users.contact']; ?>
                                    <?php }else{ ?>
                                        <a href="register.php" onclick="window.open('register.php', 'newwindow', 'width=1200,height=650'); return false;" class="btn btn-primary"><i class="fa fa-phone"></i> Register to view Contact </a>
                                    <?php } ?>
                                </p>


                            </div>

                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Description</h4>
                            <blockquote>
                                <p>
                                    <em><?php echo $item['tb_items.description']; ?></em>
                                </p>
                            </blockquote>

                            <hr>
                    </div>


                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height" style="text-align:center">
                                 <img style="height:80px;width:80px;border-radius:50%" src="admin/uploads/users/<?php echo $item['tb_users.image_url'];?>">
                                <br>
                                <h3>Other items posted by <?php echo ucwords($item['tb_users.fname']); ?></h3>
                            </div>
                        </div>

                        <?php foreach($item_by_owner as $key=>$item_by){ ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height" >
                                <div class="flip-container">
                                      <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $item_by['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item_by['image_url']; ?>" alt="" style="width:100%;height:200px" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?php echo $item_by['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item_by['image_url']; ?>" style="width:100%;height:220px" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="admin/uploads/items/<?php echo $item_by['image_url']; ?>" alt="" style="width:100%;height:200px" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html"><?php echo $item_by['name']; ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item_by['price']; ?>.00</p>
                                    <p class="buttons">
                                        <a href="detail.php?id=<?php echo $item_by['id']; ?>" class="btn btn-default">View detail</a>
                                        <!-- <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                    </p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>




                    </div>

                </div>
                <!-- /.col-md-9 -->


                
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


      <?php include('includes/footer.php'); ?>