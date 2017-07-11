   <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo DB::queryOneField('name', "SELECT * FROM tb_user_role WHERE id=%s", $profile['user_role_id']); ?> Panel</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="items">
                                    <a href="items.php"><i class="fa fa-list"></i> Items</a>
                                </li>
                                <li class="additem">
                                    <a href="additem.php"><i class="fa fa-plus"></i> Add item</a>
                                </li>
                                <li  class="users">
                                    <a href="users.php"><i class="fa fa-user"></i> Users</a>
                                </li>
                                <li class="adduser">
                                    <a href="adduser.php"><i class="fa fa-plus"></i> Add User</a>
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