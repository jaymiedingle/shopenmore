<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>
<?php include('includes/nav-bar.php'); ?>

<?php

if(!isset($_SESSION['userdata'])){
  echo '<script>window.location.href = "404.php";</script>';
    exit;
}


$profile = $_SESSION['userdata'];

//get messages of user
$messages = DB::queryFullColumns("SELECT * FROM tb_messages
           LEFT JOIN tb_users 
           ON tb_messages.sender_id = tb_users.id
           WHERE tb_messages.parent_id = 0 
           AND 
           (
            tb_messages.receiver_id = ".$profile['id']." OR 
            tb_messages.sender_id = ".$profile['id']."
           )");

?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            My Account
                        </li>
                        <li>Messages</li>
                    </ul>
                </div>

                
                 <?php include('includes/account-sidemenu.php'); ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>Messages</h1>

                        <p class="lead">Your list of messages.</p>

                        <hr>

                        <div class="table-responsive">
                            <table id="message-table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sender</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($messages as $key=>$message) { ?>
                                    <tr class="<?php echo ($message['tb_messages.is_opened']) ? 'read' : ''; ?>">
                                        <th><?php echo ($key + 1); ?></th>
                                        <td>
                                            <?php 

                                                if($message['tb_users.id'] == $profile['id']){
                                                    echo "You";
                                                }else{
                                                    echo ucwords($message['tb_users.fname'] . ' ' .$message['tb_users.lname']); 
                                                }

                                        
                                            ?>
                                        </td>
                                        <td>
                                            <a href="update_message_is_opened.php?id=<?php echo $message['tb_messages.id']; ?>">
                                                <?php echo ucwords($message['tb_messages.subject']); ?>
                                            </a>
                                        </td>
                                        <td style="font-size:11px">
                                            <?php echo date('m-j-Y h:i', strtotime($message['tb_messages.date_send'])); ?>
                                        </td>
                                        <td>
                                            <a href="deletemessage.php?id=<?php echo $message['tb_messages.id']; ?>" class="btn btn-danger btn-xs" alt="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    
 <?php include('includes/footer.php'); ?>
 <!--give active state to navigation-->
  <script type="text/javascript">
    var page = 'myaccount';
    $("." + page + " > a").addClass("active");

    var sub_page = "message";
    $("." + sub_page).addClass("active");
  </script>