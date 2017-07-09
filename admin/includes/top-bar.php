    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 col-xs-12 offer" data-animate="fadeInDown" style="text-align:center">
                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce" style="text-align:center">
                    <img class="logo" src="../images/shopenmore-logo-white.png" alt="Obaju logo" class="hidden-xs">
                </a>
            </div>
            <div class="col-md-6 col-xs-12 " data-animate="fadeInDown">
                <ul class="menu">
                    
                    <?php if(isset($_SESSION['admindata'])) { ?>

                    <li>
                        <a href="myitems.php">My Profile</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>&nbsp;&nbsp;
                        <img style="width:45px;height: 45px;border-radius:50%" src="uploads/users/<?php echo $_SESSION['admindata']['image_url']; ?>">
                    </li>


                    
                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--modal area-->
        <!--end modal area-->

    </div>

    <!-- *** TOP BAR END *** -->
