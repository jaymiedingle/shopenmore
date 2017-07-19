   <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu" >

                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo DB::queryOneField('name', "SELECT * FROM tb_user_role WHERE id=%s", $profile['user_role_id']); ?> Panel</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="items">
                                    <a href="items.php"><i class="fa fa-shopping-cart"></i> Items</a>
                                </li>
                                
                                <li  class="users">
                                    <a href="users.php"><i class="fa fa-user"></i> Users</a>
                                </li>

                                
                                <li  class="categories">
                                    <a href="categories.php"><i class="fa fa-tags"></i>Categories</a>
                                </li>
                                <li  class="banners">
                                    <a href="banners.php"><i class="fa fa-flag"></i>Banner Ads</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>