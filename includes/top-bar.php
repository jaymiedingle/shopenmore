    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown" style="margin:12px 0">
                <?php if(!isset($_SESSION['userdata'])) { ?>
                <a href="register.php" class="btn btn-success btn-sm" data-animate-hover="shake">Start selling your stuff</a>
                <?php }else{ ?>
                Welcome back,&nbsp; <?php echo $_SESSION['userdata']['fname']; ?>
                <?php } ?>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    
                    <?php if(isset($_SESSION['userdata'])) { ?>

                    <li>
                        <a href="profile.php"><?php echo ucwords($_SESSION['userdata']['fname']); ?>'s Profile</a>
                    </li>
                    <li>
                        <a href="myitems.php">My Items</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>&nbsp;&nbsp;
                        <?php
                            $profile_image = ($_SESSION['userdata']['image_url']) ? 'admin/uploads/users/'.$_SESSION['userdata']['image_url'] : 'images/default.png';
                        ?>
                        <img style="width:45px;height: 45px;border-radius:50%" src="<?php echo $profile_image; ?>">
                    </li>


                    
                    <?php }else{ ?>

                    <li>
                        <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>

                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--modal area-->
        <!--end modal area-->

    </div>

    <!-- *** TOP BAR END *** -->
