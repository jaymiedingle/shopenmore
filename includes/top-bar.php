    <?php

    //get unread message count
    if(isset($_SESSION['userdata'])){
        $unread_message = DB::query("SELECT * FROM tb_messages WHERE receiver_id = ".$_SESSION['userdata']['id']." AND is_active = 1 AND is_opened = 0");
        $count_unread_message = DB::count();
    }
    

    ?>


    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown" style="margin:12px 0">
                <?php if(!isset($_SESSION['userdata'])) { ?>
                <a href="registration.php" class="btn btn-success btn-sm" data-animate-hover="shake">Start selling your stuff</a>
                <?php }else{ ?>
                Welcome back,&nbsp; <?php echo $_SESSION['userdata']['fname']; ?>
                <?php } ?>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <?php if(isset($_SESSION['userdata'])) { ?>

                    <li>
                        <?php
                            $profile_image = ($_SESSION['userdata']['image_url']) ? 'admin/uploads/users/'.$_SESSION['userdata']['image_url'] : 'images/default.png';
                        ?>
                        <a href="profile.php" title="My profile">
                        <img style="width:45px;height: 45px;border-radius:50%" src="<?php echo $profile_image; ?>">

                        </a>
                    </li>

                    <li>
                        <a href="myitems.php" title="My items">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li style="position:relative">
                        <a href="messages.php" class="message-count-container" title="Messages">
                            <i class="fa fa-comments" aria-hidden="true"></i>

                            <?php if($count_unread_message > 0){ ?> 
                            <span class="badge red"><?php echo $count_unread_message; ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" title="Logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                    </li>

                    


                    
                    <?php }else{ ?>

                    <li>
                        <a href="#" data-toggle="modal" data-target="#login-modal" style="font-size:14px">Login</a>
                    </li>
                    <li>
                        <a href="registration.php" style="font-size:14px">Register</a>
                    </li>

                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--modal area-->
        <!--end modal area-->

    </div>

    <!-- *** TOP BAR END *** -->
