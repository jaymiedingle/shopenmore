<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>


<?php


$profile = $_SESSION['admindata'];

//get users of user
$users = DB::queryFullColumns("SELECT * FROM tb_users
           LEFT JOIN tb_user_role 
           ON tb_users.user_role_id = tb_user_role.id 
           -- LEFT JOIN tb_item_category 
           -- ON tb_users.item_category_id = tb_item_category.id 
           -- LEFT JOIN tb_item_status
           -- ON tb_users.item_status_id = tb_item_status.id 
           WHERE tb_users.id != %i ", $profile['id']);


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.users {
    background-color: #6eb752;
} 
.users a{
    color: #fff !important;
} 
</style>

    <div id="all">

        <div id="content">
            <div class="container">

                <!-- <div class="col-md-12">
                    <ul class="breadcrumb" style="margin-top:10px">
                        </li>
                        <li>Item List</li>
                    </ul>
                </div> -->
                <br>

                
                 <?php include('includes/admin-sidemenu.php'); ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">

                        <div class="alert alert-warning alert-dismissible" style="display:none" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Item updated</strong> successfully!
                        </div>

                        <h1>Users List</h1>
                        <a href="adduser.php" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>

                        <p class="lead">Listing of all users in system</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Stud#</th>
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
                                        <td>
                                            <?php echo ucwords($user['tb_users.student_id']); ?>
                                        </td>
                                        <td>
                                            <a href="userdetails.php?id=<?php echo $user['tb_users.id']; ?>">
                                                <?php echo $user['tb_users.email']; ?>
                                            </a>
                                        </td>
                                        <td><?php echo ucwords($user['tb_users.fname']); ?> <?php echo ucwords($user['tb_users.lname']); ?></td>
                                       
                                        <td>
                                            <!-- <div class="btn-group" id="status" data-toggle="buttons">
                                                <label class="btn btn-default btn-on btn-xs active">
                                                <input type="radio" value="1" name="is_active" checked="checked">Yes</label>
                                                <label class="btn btn-default btn-off btn-xs ">
                                                <input type="radio" value="0" name="is_active">No</label>
                                            </div> -->

                                            <!-- Rounded switch -->
                                            <label class="switch">
                                              <input class="tb_users" alt="<?php echo $user['tb_users.id']; ?>" type="checkbox" <?php echo ($user['tb_users.is_active'] ) ? 'checked' : ''; ?>>
                                              <div class="slider round"></div>
                                            </label>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

<?php include('includes/footer.php'); ?>