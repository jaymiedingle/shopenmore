    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 col-xs-12 offer" data-animate="fadeInDown" style="text-align:center">
                <a class="navbar-brand home" href="../index.php" style="text-align:center" target="__blank">
                    <img class="logo" src="../images/shopenmore-logo-white.png" alt="Obaju logo" class="hidden-xs">
                </a>
            </div>
            <div class="col-md-6 col-xs-12 " data-animate="fadeInDown">
                <ul class="menu">
                    
                    <?php if(isset($_SESSION['admindata'])) { ?>

                    <li>
                        <?php
                            $profile_image = 'uploads/users/'.$_SESSION['admindata']['image_url'];
                        ?>
                        <a href="profile.php" title="My profile">
                        <img style="width:45px;height: 45px;border-radius:50%" src="<?php echo $profile_image; ?>">

                        </a>
                    </li>

                    <li>
                        <a href="logout.php" title="Logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                    </li>
                    
                    <?php } ?>



                </ul>
            </div>
        </div>
        <!--modal area-->
        <!--end modal area-->

    </div>

    <!-- *** TOP BAR END *** -->
    <br>

    <!--alert display-->
    <?php if(isset($_SESSION['error_type']) && isset($_SESSION['error_message'])) { ?>
        <div class="container">
            <div class="col-md-10" style="position:absolute;z-index:999;margin-top:10px">
                <div class="alert alert-<?php echo $_SESSION['error_type']; ?> alert-dismissible" style="display:none" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php echo $_SESSION['error_message']; ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!--end alert display-->
