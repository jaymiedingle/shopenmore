    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 col-xs-12 offer" data-animate="fadeInDown" style="text-align:center">
                <a class="navbar-brand home" href="#" data-animate-hover="bounce" style="text-align:center">
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
    <br>

    <!--alert display-->
    <?php if(isset($_SESSION['error_type']) && isset($_SESSION['error_message'])) { ?>
        <div class="container">
            <div class="col-md-12" style="position:absolute;z-index:999;margin-top:10px">
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
