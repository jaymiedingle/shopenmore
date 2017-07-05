    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Start selling your stuff</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    
                    <?php if(isset($_SESSION['userdata'])) { ?>

                    <li>
                        <a href="">Welcome back, <?php echo $_SESSION['userdata']['fname']; ?> <?php echo $_SESSION['userdata']['lname']; ?></a>
                    </li>
                    <li>
                        <a href="myitems.php">My Items</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>&nbsp;&nbsp;
                        <img style="width:45px;height: 45px;border-radius:50%" src="<?php echo $_SESSION['userdata']['image_url']; ?>">
                    </li>


                    
                    <?php }else{ ?>

                    <li>
                        <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                    <li>
                        <a href="#">Welcome Guest</a>
                    </li>

                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--modal area-->
        <!--end modal area-->

    </div>

    <!-- *** TOP BAR END *** -->
