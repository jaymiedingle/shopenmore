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
                        <h1>Subject :  <span class="highlight"><?php echo $messages['tb_messages.subject']; ?></span> </h1>
                    </div>


                    <div class="row products">
                        
                        <!--loop item-->
                        <?php foreach($replies as $key=>$reply){ ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <?php var_dump($reply); ?>
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

