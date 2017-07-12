<?php
session_start();

include('../libs/meekrodb.2.3.class.php');
include('../libs/common.php');


//get site info from database
$site_data = DB::queryFirstRow("SELECT * FROM tb_site_info");

//get item categories
$item_categories = DB::query("SELECT * FROM tb_item_category");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        <?php echo $site_data['title']; ?>
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="../css/style.green.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="../css/custom.css" rel="stylesheet">

    <script src="../js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

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