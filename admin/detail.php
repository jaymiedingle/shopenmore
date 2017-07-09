<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php

$profile = $_SESSION['admindata'];

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

                <a href="items.php" class="btn btn-success pull-right" style="margin-bottom:10px"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Item list</a>
                 <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $profile['user_role_id']; ?> Panel</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="index.php"><i class="fa fa-list"></i> Items</a>
                                </li>
                                <li>
                                    <a href="additem.php"><i class="fa fa-plus"></i> Add item</a>
                                </li>
                                <li>
                                    <a href="users.php"><i class="fa fa-user"></i> Users</a>
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

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="uploads/items/<?php echo $item['tb_items.image_url'];?>" alt="" style="width:100%;height:440px" class="img-responsive">
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

                                        <img style="height:80px;width:80px;border-radius:50%" src="uploads/users/<?php echo $item['tb_users.image_url'];?>">
                                        <br><br>
                                        by <?php echo $item['tb_users.fname'];?> <?php echo $item['tb_users.lname'];?>
                                       
                                        
                                    </a>
                                </p>

                                <p class="text-center buttons">
                                    <a href="basket.html" class="btn btn-primary"><i class="fa fa-comment"></i> Message owner</a> 
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-phone"></i> Call <?php echo $item['tb_users.contact']; ?> </a>
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

                    </div>

                </div>
                <!-- /.col-md-9 -->


                
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->





        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious.com</a>
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>






</body>

</html>