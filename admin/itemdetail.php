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
           tb_items.id = %i ", $get_item_id );


  $item = $item[0];

  if(empty($item) || $get_item_id == false){
    echo '<script>window.location.href = "404.php";</script>';
    exit;
}



?>

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
                

                <?php include('includes/admin-sidemenu.php'); ?>

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
                                <span class="label label-<?php echo ($item['tb_items.is_active']) ? 'primary' : 'default'; ?>">
                                    <?php echo ($item['tb_items.is_active']) ? 'Active' : 'Inactive'; ?>
                                </span>
                                <h1 class="text-center"><?php echo $item['tb_items.name']; ?></h1>
                                <p class="price">&#8369;<?php echo $item['tb_items.price']; ?>.00</p>
                                
                                <p class="goToDescription">
                                    <a href="#details" class="scroll-to">

                                        <img style="height:80px;width:80px;border-radius:50%" src="uploads/users/<?php echo $item['tb_users.image_url'];?>">
                                        <br><br>
                                        by <?php echo $item['tb_users.fname'];?> <?php echo $item['tb_users.lname'];?><br />
                                        Joined <?php echo date('M d, Y', strtotime($item['tb_users.date_reg']));?>
                                       
                                       
                                        
                                    </a>
                                </p>

                                <p class="text-center buttons">
                                    <a href="#" class="btn btn-default"><i class="fa fa-phone"></i> <?php echo $item['tb_users.contact']; ?> </a>
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

<?php include('includes/footer.php'); ?>
 <!--give active state to navigation-->
<script type="text/javascript">
var sub_page = "items";
$("." + sub_page).addClass("active");
</script>