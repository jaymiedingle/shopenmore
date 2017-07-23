<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php




?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>Contact</li>
                    </ul>

                </div>

                <?php include('includes/sidemenu.php'); ?>

                <div class="col-md-9">


                    <div class="box" id="contact">
                        <h1>Contact</h1>

                        <p class="lead">Are you curious about something?</p>
                        <p  style="font-style: italic;">Please feel free to contact us, just visit our </p>

                        <hr>

                        <div class="row">
                           
                            <div class="col-sm-6">
                               
                                    <strong><a href="https://www.facebook.com/SEMbinangonan/" target="__blank"> <i class="fa fa-facebook-square" style="font-size: 23px;"></i>acebook Official Page</a></strong>
                                    

                                    <strong><a href="https://twitter.com/" target="__blank"> <i class="fa fa-twitter-square" style="font-size: 23px;"></i>Twitter Page</a></strong>
                                    
                               
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->

                        <hr>

                        <div id="map" style="margin-bottom:10%">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.088207155018!2d121.18595831515347!3d14.479624183911117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c3ec7f94191b%3A0xda877d85b72fc1ad!2sICCT+College!5e0!3m2!1sen!2sph!4v1499241355302" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                       


                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


      <?php include('includes/footer.php'); ?>
      <!--give active state to navigation-->
      <script type="text/javascript">
        var page = 'contact';
        $("." + page + " > a").addClass("active");
      </script>