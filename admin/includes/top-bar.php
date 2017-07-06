    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a class="home" href="index.php" data-animate-hover="bounce" style="color:#669999;font-family:Garamond, Georgia, serif;font-size: 34px;">
                    <?php echo $site_data['title']; ?>
                </a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    
                    <?php if(isset($_SESSION['admindata'])) { ?>

                    <li>
                        <a href="myitems.php">My Profile</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>&nbsp;&nbsp;
                        <img style="width:45px;height: 45px;border-radius:50%" src="../<?php echo $_SESSION['admindata']['image_url']; ?>">
                    </li>


                    
                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--modal area-->
        <!--end modal area-->

    </div>

    <!-- *** TOP BAR END *** -->
