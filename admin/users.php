<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>


<?php


$profile = $_SESSION['admindata'];

/*pagination data*/
$limit = 10;
$current_page = isset($_GET['page']) ? $_GET['page'] : 0;
DB::query("SELECT * FROM tb_users");
$total_count = DB::count();
$pages_count = ceil($total_count / $limit);
$offset = ($current_page == 0) ? 0 : ($current_page - 1) * $limit;

//get users of user
$users = DB::queryFullColumns("SELECT * FROM tb_users
           LEFT JOIN tb_user_role 
           ON tb_users.user_role_id = tb_user_role.id 
           WHERE tb_users.id != %i ORDER BY date_reg DESC LIMIT $offset,$limit", $profile['id']);


?>


    <div id="all">

        <div id="content">
            <div class="container">

                <br>

                
                 <?php include('includes/admin-sidemenu.php'); ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">

                        <h1>Users List</h1>
                        <?php if($profile['user_role_id']== 1){ ?>
                        <a href="adduser.php" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>
                        <?php } ?>

                        <p class="lead">Listing of all users in system</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Activate</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($users as $key=>$user) { ?>
                                    <tr>
                                        <th><?php echo ($key + 1); ?></th>
                                        <td>
                                            <span class="label label-<?php echo $user['tb_user_role.theme']; ?>">
                                                <?php echo ucwords($user['tb_user_role.name']); ?>
                                            </span>
                                        </td>
                                       <!-- <td>
                                            <?php echo ucwords($user['tb_users.student_id']); ?>
                                        </td>-->
                                        <td>
                                            <a href="userdetails.php?id=<?php echo $user['tb_users.id']; ?>">
                                                <?php echo $user['tb_users.email']; ?>
                                            </a>
                                        </td>
                                        <td><?php echo ucwords($user['tb_users.fname']); ?> <?php echo ucwords($user['tb_users.lname']); ?></td>
                                       
                                        <td>
                                            <?php if($user['tb_users.user_role_id'] > 2 OR $profile['user_role_id'] == 1){ ?>

                                            <!-- Rounded switch -->
                                            <label class="switch">
                                              <input class="tb_users" alt="<?php echo $user['tb_users.id']; ?>" type="checkbox" <?php echo ($user['tb_users.is_active'] ) ? 'checked' : ''; ?>>
                                              <div class="slider round"></div>
                                            </label>

                                            <?php } ?>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <!--pagination-->
                        <div class="pages">
                            <?php echo Common::pagination($current_page, $pages_count); ?>
                        </div>
                        <!--end pagination-->

                    </div>

                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

<?php include('includes/footer.php'); ?>
<!--give active state to navigation-->
<script type="text/javascript">
var sub_page = "users";
$("." + sub_page).addClass("active");
</script>