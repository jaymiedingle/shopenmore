<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<!--add active state on navigation current page via class-->
<style type="text/css">
.category > a{
    color: #fff !important;
    background-color: #6eb752;
} 
</style>

    <div id="all">

        <div id="content">

            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Page not found</li>
                    </ul>


                    <div class="row" id="error-page">

                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="box">

                                <p class="text-center">
                                    <img src="img/logo.png" alt="Obaju template">
                                </p>

                                <h3>We are sorry - this page is not here anymore</h3>
                                <h4 class="text-muted">Error 404 - Page not found</h4>

                                <p class="text-center">To continue please use the <strong>Search form</strong> or <strong>Menu</strong> above.</p>

                                <p class="buttons"><a href="index.php" class="btn btn-primary"><i class="fa fa-home"></i> Go to Homepage</a>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->

        </div>
        <!-- /#content -->

 <?php include('includes/footer.php'); ?>