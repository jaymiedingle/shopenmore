<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>
<?php include('includes/nav-bar.php'); ?>

<?php
    $latest_item = DB::query("SELECT * FROM tb_items WHERE is_active = 1 ORDER BY date_posted DESC LIMIT 10");
?>


    <div id="all">

     <!--<div id="fb-div" class="hidden-xs hidden-sm">
            <h3>
                <a href="https://www.facebook.com/SenMofficial/" >Like our FB page <img src="https://scontent.fmnl10-1.fna.fbcdn.net/v/t1.0-9/20031662_1999895480231933_4702362662918044706_n.png?oh=80feee058bfbd51d44e9d86cbec0c28e&oe=59C313D3" style="width:50px;border-radius: 50%">
                </a>
            </h3>
           <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FSenMofficial%2F%3Fref%3Dbr_rs&width=200&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=328400533904097" width="200" height="70" style="border:none;overflow:hidden;color:#fff" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div> -->


        <div id="content">


            <!--banner slider-->
            <?php include('includes/banner-slider.php'); ?>
            <!--end banner slider-->

            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <!--loop category-->
                        <?php foreach($item_categories as $key=>$category){ ?>
                        <div class="col-sm-4">
                            <div class="box home-categories same-height clickable">
                                <!-- <div class="icon">
                                    <i class="fa fa-desktop"></i>
                                </div> -->

                                <h3><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></h3>
                                <img src="admin/uploads/category/<?php echo $category['image_url']; ?>">
                                <div class="overlay"></div>
                            </div>
                        </div>
                        <?php } ?>
                        <!--end loop category-->

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** CATEGORIES END *** -->

            <!-- *** LATEST ITEMS SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Latest items</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">

                        <!--latest items loop-->
                        <?php foreach($latest_item as $key=>$item){ ?>
                        <div class="item">
                            <div class="product same-height" >
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img style="width:100%;height:200px" src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img style="width:100%;height:220px" src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?id=<?php echo $item['id']; ?>" class="invisible">
                                    <img style="width:100%;height:200px" src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item['price']; ?>.00</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>
                        <!--end latest items loop-->


                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** LATEST ITEMS END *** -->

  


        </div>
        <!-- /#content -->

  <?php include('includes/footer.php'); ?>

  <!--give active state to navigation-->
  <script type="text/javascript">
    var page = 'home';
    $("." + page + " > a").addClass("active");
  </script>