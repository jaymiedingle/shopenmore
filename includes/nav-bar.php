    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce" >
                    <img class="logo" src="images/shopenmore-logo.png" alt="Obaju logo" class="hidden-xs">
                    <!-- <img src="img/shopenmore-logo-small.png" alt="Obaju logo" class="visible-xs">
                    <span class="sr-only">Obaju - go to homepage</span> -->

                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="home"><a href="index.php">Home</a>
                    </li>
                    <li class="category dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Categories</h5>
                                            <ul>

                                                <!--loop category-->
                                                <?php foreach($item_categories as $key=>$category){ ?>
                                                <li>
                                                    <a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                                                </li>
                                                <?php } ?>
                                                <!--end loop category-->
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                   
                   <li class="faq">
                    <a href="faq.php">FAQ</a>
                   </li>

                   <li class="contact">
                    <a href="contact.php">Contact us</a>
                   </li>
                   <?php if(isset($_SESSION['userdata'])) { ?>
                   <li class="profile">
                    <a href="profile.php">My Account</a>
                   </li>
                   <?php } ?>

                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <!--/.nav-collapse -->

                <!-- <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div> -->

                <div class="clearfix" style="text-align: right;">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" style="height: 28px;" placeholder="Search">
                            <span class="input-group-btn">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>

           
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    