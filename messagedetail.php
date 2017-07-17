<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>
<?php include('includes/nav-bar.php'); ?>

<?php

$get_message_id = isset($_GET['id']) ?  $_GET['id'] : false;

if(!isset($_SESSION['userdata']) || ($get_message_id == false)){
  echo '<script>window.location.href = "404.php";</script>';
    exit;
}


$profile = $_SESSION['userdata'];

//get messages of user
$messages = DB::queryFullColumns("SELECT * FROM tb_messages
           LEFT JOIN tb_users 
           ON tb_messages.sender_id = tb_users.id
           WHERE tb_messages.id = %i ", $get_message_id );

$messages = $messages[0];


$replies = DB::queryFullColumns("SELECT * FROM tb_messages
           LEFT JOIN tb_users 
           ON tb_messages.sender_id = tb_users.id
           WHERE tb_messages.parent_id = %i ", $messages['tb_messages.id']);


?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Subject : <?php echo $messages['tb_messages.subject']; ?></li>
                    </ul>
                </div>

                
                <?php include('includes/account-sidemenu.php'); ?>

                <div class="col-md-9">

                    <div class="box">
                        <h1><span class="highlight"><?php echo $messages['tb_messages.subject']; ?></span> </h1>
                        <p class="lead"><?php echo $messages['tb_messages.message']; ?></p>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="box">
                                <!--loop item-->
                                <?php foreach($replies as $key=>$reply){ ?>

                                <?php if($reply['tb_users.id'] == $profile['id']) { ?>
                                        <div class="replies row">
                                            <div class="col-xs-3" style="text-align:center" >
                                                <img class="reply-img" src="admin/uploads/users/<?php echo $reply['tb_users.image_url']; ?>">
                                            </div>
                                            <div class="reply-box col-xs-9">
                                                <?php echo $reply['tb_messages.message']; ?>
                                            </div>
                                        </div>
                                        <!-- /.reply -->
                                <?php }else{ ?>
                                          <div class="replies row">
                                            <div class="reply-box col-xs-9">
                                                <?php echo $reply['tb_messages.message']; ?>
                                            </div>
                                            <div class="col-xs-3" style="text-align:center">
                                                <img class="reply-img" src="admin/uploads/users/<?php echo $reply['tb_users.image_url']; ?>">
                                            </div>
                                        </div>
                                        <!-- /.reply -->
                                <?php } ?>

                                
                                    
                                
                                <?php } ?>

                            </div>
                        
                        </div>

                       

                    </div>
                    <!-- /.products -->


                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        

 <?php include('includes/footer.php'); ?>

