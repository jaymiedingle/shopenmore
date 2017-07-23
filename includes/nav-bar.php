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
                    <a href="faq.php">FAQ 
                    </a>
                   </li>

                   <li class="contact">
                    <a href="contact.php">Contact us</a>
                   </li>
                   <?php if(isset($_SESSION['userdata'])) { ?>
                   <li class="myaccount">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">My Account <b class="caret"></b></a>
                     <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content" style="padding: 20px 10px">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
                                            <ul>
                                                <li>
                                                    <a href="profile.php">Profile</a>
                                                </li>
                                                <li>
                                                    <a href="myitems.php">My Items</a>
                                                </li>
                                                <li>
                                                    <a href="messages.php">Message</a>
                                                </li>
                                                <li>
                                                    <a href="logout.php">Logout</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                   </li>
                   <?php } ?>

                   <!-- <li class="visible-xs visible-sm mobile-fb-like" >
                    <h4>
                        <a href="https://www.facebook.com/SenMofficial/" target="_blank">Like our FB page <img src="https://scontent.fmnl10-1.fna.fbcdn.net/v/t1.0-9/20031662_1999895480231933_4702362662918044706_n.png?oh=80feee058bfbd51d44e9d86cbec0c28e&oe=59C313D3" >
                        </a>
                    </h4>
                   <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FSenMofficial%2F%3Fref%3Dbr_rs&width=200&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=328400533904097" width="200" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                   </li>
                    -->
                   
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
                    <form class="navbar-form" action="search.php" method="GET" role="search">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" style="height: 33px;" placeholder="Search">
                            <span class="input-group-btn">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>

           
            <!--/.nav-collapse -->

            <!--alert display-->
            <?php if(isset($_SESSION['error_type']) && isset($_SESSION['error_message'])) { ?>
                <div class="col-md-12" style="position:absolute;z-index:999;margin-top:10px;text-align:center">
                    <!-- <div class="alert alert-<?php echo $_SESSION['error_type']; ?> alert-dismissible" style="display:none" role="alert"> -->

                    <div class="alert alert-danger alert-dismissible" style="display:none" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <?php echo $_SESSION['error_message']; ?>
                    </div>
                </div>
            <?php } ?>
            <!--end alert display-->

        </div>
        <!-- /.container -->

        

    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    


   

    