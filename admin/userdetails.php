<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php

$profile = $_SESSION['admindata'];

$get_user_id = isset($_GET['id']) ?  $_GET['id'] : false;

$user = DB::queryFullColumns("SELECT * FROM tb_users
           LEFT JOIN tb_user_role
           ON tb_users.user_role_id = tb_user_role.id 
           WHERE 
           tb_users.id = %i ", $get_user_id );


  $user = $user[0];

  /*other items form poster*/
  $item_by_owner = DB::query("SELECT * FROM tb_items 
           WHERE 
           user_id = %i ",  $user['tb_users.id']);


  if(empty($user) || $get_user_id == false){
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
                        <li>user List</li>
                    </ul>
                </div> -->
                <br>

                <a href="users.php" class="btn btn-success pull-right" style="margin-bottom:10px"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to User list</a>
                

                <?php include('includes/admin-sidemenu.php'); ?>

                <div class="col-md-9">

                    <div class="row" id="productMain" style="margin-bottom: 0px;">
                        <div class="col-sm-12">
                            <div class="box">
                                <h1 class="text-center"><?php echo $user['tb_users.fname'] .' '. $user['tb_users.lname']; ?></h1>
                                
                                <p class="goToDescription">
                                    <a href="#details" class="scroll-to">

                                        <img style="height:180px;width:180px;border-radius:50%;padding-bottom:5px" src="uploads/users/<?php echo $user['tb_users.image_url'];?>">
                                        <br>
                                        <span class="label label-<?php echo $user['tb_user_role.theme']; ?>">
                                            <?php echo ucwords($user['tb_user_role.name']); ?>
                                        </span>
                                        <br><br>
                                        ID# <?php echo $user['tb_users.student_id'];?>
                                       
                                    </a>
                                </p>

                                <p class="text-center buttons">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-phone"></i> <?php echo $user['tb_users.contact']; ?> </a>
                                </p>


                            </div>

                        </div>

                    </div>


                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height" style="text-align:center">
                                <h3>Other items posted by <?php echo ucwords($user['tb_users.fname']); ?></h3>
                            </div>
                        </div>

                        <?php foreach($item_by_owner as $key=>$item_by){ ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height" >
                                <div class="flip-container">
                                      <div class="flipper">
                                        <div class="front">
                                            <a href="itemdetail.php?id=<?php echo $item_by['id']; ?>">
                                                <img src="uploads/items/<?php echo $item_by['image_url']; ?>" alt="" style="width:100%;height:200px" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="itemdetail.php?id=<?php echo $item_by['id']; ?>">
                                                <img src="uploads/items/<?php echo $item_by['image_url']; ?>" style="width:100%;height:220px" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="itemdetail.php?id=<?php echo $item_by['id']; ?>" class="invisible">
                                    <img src="uploads/items/<?php echo $item_by['image_url']; ?>" alt="" style="width:100%;height:200px" class="img-responsive">
                                </a>
                                <div class="text" style="margin:20px 0;text-align:center">
                                    <h3><a href="itemdetail.php?id=<?php echo $item_by['id']; ?>"><?php echo $item_by['name']; ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item_by['price']; ?>.00</p>
                                    <span class="label label-<?php echo ($item_by['is_active']) ? 'primary' : 'default'; ?>">
                                        <?php echo ($item_by['is_active']) ? 'Active' : 'Inactive'; ?>
                                    </span>
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