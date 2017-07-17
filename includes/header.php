<?php
session_start();

// unset($_SESSION['error_type']);
// unset($_SESSION['error_message']);

include('libs/meekrodb.2.3.class.php');
include('libs/common.php');

//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");

//get item categories
$item_categories = DB::query("SELECT * FROM tb_item_category");



//login
//get user credentials
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['login'])){

      $email = $_POST['email'];
      $password = md5($_POST['password']);

      $userdata = DB::queryFirstRow("SELECT * FROM tb_users WHERE is_active = 1 AND email=%s AND password=%s", $email, $password);

      if($userdata){
        unset($_SESSION['userdata']);
        $_SESSION['userdata'] = $userdata;
        echo '<script>window.location.href = "index.php";</script>';
      }else{
        $type = 'danger';
        $message = "Account inactive / Invalid username and password combination";
        Common::display_message_alert($type, $message);
      }

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">

    <title>
        <?php echo $site_data['title']; ?>
    </title>

    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.green.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    



</head>

<body>

<?php include('includes/modal.php'); ?>



 