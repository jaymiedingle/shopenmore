<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php

$profile = $_SESSION['admindata'];

$get_user_id = isset($_GET['id']) ?  $_GET['id'] : false;

$user = DB::queryFullColumns("SELECT * FROM tb_users
           LEFT JOIN tb_user_role
           ON tb_users.user_role_id = tb_user_role.id 
           WHERE 
           tb_users.is_active = 1 
           AND 
           tb_users.id = %i ", $get_user_id );


  $user = $user[0];

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

                    <div class="row" id="productMain">
                        <div class="col-sm-9">
                            <div class="box">
                                <h1 class="text-center"><?php echo $user['tb_users.fname'] .' '. $user['tb_users.lname']; ?></h1>
                                
                                <p class="goToDescription">
                                    <a href="#details" class="scroll-to">

                                        <img style="height:80px;width:80px;border-radius:50%" src="uploads/users/<?php echo $user['tb_users.image_url'];?>">
                                        <br><br>
                                        ID# <?php echo $user['tb_users.student_id'];?>
                                       
                                       
                                        
                                    </a>
                                </p>

                                <p class="text-center buttons">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-phone"></i> Call <?php echo $user['tb_users.contact']; ?> </a>
                                </p>


                            </div>

                        </div>

                    </div>


                </div>
                <!-- /.col-md-9 -->


                
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->





     <?php include('includes/footer.php'); ?>