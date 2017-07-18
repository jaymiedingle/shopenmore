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


                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="box">
                                <h2><span class="highlight"><?php echo $messages['tb_messages.subject']; ?></span> </h2>
                                <p class=""><?php echo $messages['tb_messages.message']; ?></p>

                                <div class="message_template">
                                        <ul class="messages">
                                <!--loop item-->
                                <?php foreach($replies as $key=>$reply){ ?>

                                    <li class="message <?php echo ($reply['tb_users.id'] == $profile['id']) ? 'right' : 'left'; ?> appeared">
                                        <div class="avatar">
                                            <img class="avatar" src="admin/uploads/users/<?php echo $reply['tb_users.image_url'];?>">
                                        </div>
                                        <div class="text_wrapper">
                                           <div class="text"><?php echo $reply['tb_messages.message'];?></div>
                                        </div>
                                    </li>
                                          
                                <?php } ?>
                                    </ul>
                                  </div>

                                  <div class="reply-input">

                                      <form id="messageform" name="messageform" action="addmessage.php" method="POST" style="text-align:right" >

                                        <!--hidden fields-->
                                        <input type="hidden" name="parent_id" value="<?php echo $messages['tb_messages.id']; ?>" />
                                        <input type="hidden" name="receiver_id" value="<?php echo $messages['tb_messages.sender_id']; ?>" />
                                        <input type="hidden" name="sender_id" value="<?php echo $profile['id']; ?>" />
                                        <input type="hidden" name="subject" class="form-control" value="<?php echo $messages['tb_messages.subject']; ?>" >
                                        <input type="hidden" name="return_url" value="messagedetail.php?id=<?php echo $messages['tb_messages.id']; ?>" />
                                        <!--endhidden fields-->


                                        <div class="form-group">
                                            <textarea placeholder="Message" class="form-control" id="message" name="message" rows="2" required></textarea>
                                        </div>

                                        <div class="btn-group" data-toggle="buttons">
                                            <input type="submit" name="submit_message" class="btn btn-danger" value="Send">
                                        </div>
                                    </form>
                                    
                                  </div>

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

<!--give active state to navigation-->
  <script type="text/javascript">
    var page = 'myaccount';
    $("." + page + " > a").addClass("active");

    var subpage = "message";
    $("." + subpage).addClass("active");

    /*update message counter*/
    var message_count = "<?php echo $count_unread_message; ?>";
    $('.badge .red').html(message_count);
    $('.message .badge').html(message_count);

    /*scroll to last li*/
    var mydiv = $(".messages");
    mydiv.scrollTop(mydiv.prop("scrollHeight"));

  </script>

