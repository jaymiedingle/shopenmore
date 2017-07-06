    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown" style="margin-top:12px">
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
                        <a href="myitems.php">My Profile</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>&nbsp;&nbsp;
                        <img style="width:45px;height: 45px;border-radius:50%" src="../<?php echo $_SESSION['userdata']['image_url']; ?>">
                    </li>


                    
                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--modal area-->
        <!--end modal area-->

    </div>

    <!-- *** TOP BAR END *** -->