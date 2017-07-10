<?php

include('includes/header.php');

//login
//get user credentials
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['login'])){

      $email = $_POST['email'];
      $password = md5($_POST['password']);

      $userdata = DB::queryFirstRow("SELECT * FROM tb_users WHERE user_role_id <= 2 AND email=%s AND password=%s", $email, $password);

      if($userdata){
        unset($_SESSION['admindata']);
        //session_destroy();
        $_SESSION['admindata'] = $userdata;
        echo '<script>window.location.href = "items.php";</script>';
      }else{
        $_SESSION['error'] = "Invalid username and password combination";
      }

    }

}


?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.home > a{
    color: #fff;
    background-color: #6eb752;
} 
</style>

    <div id="all">

        <div id="content">
            <div class="container">


                <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
                    <div class="box" style="margin:5% auto;text-align:center">
                        <div class="">
                            <!--green # 08782b-->
                            <img class="logo" src="../images/shopenmore-logo.png" alt="<?php echo $site_data['title']; ?> logo" class="hidden-xs">
                            <h3>Admin Control</h3>
                        </div>

                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" name="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" name="password" placeholder="password">
                            </div>

                            <p class="text-center">
                               <!--  <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button> -->
                                <input class="btn btn-primary" type="submit" style="width:100%" name="login" value="Login">
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                    </div>
                </div>

                

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>