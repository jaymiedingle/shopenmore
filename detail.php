<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>
<?php include('includes/nav-bar.php'); ?>

<?php

$get_item_id = isset($_GET['id']) ?  $_GET['id'] : false;

$item = DB::queryFullColumns("SELECT * FROM tb_items 
           LEFT JOIN tb_users 
           ON tb_items.user_id = tb_users.id 
           LEFT JOIN tb_item_category 
           ON tb_items.item_category_id = tb_item_category.id 
           LEFT JOIN tb_item_status
           ON tb_items.item_status_id = tb_item_status.id 
           WHERE 
           tb_items.is_active = 1 
           AND 
           tb_items.id = %i ", $get_item_id );


  $item = $item[0];

  /*other items form poster*/
  $item_by_owner = DB::query("SELECT * FROM tb_items 
           WHERE 
           is_active = 1 
           AND id != %i
           AND user_id = %i ",  $item['tb_items.id'], $item['tb_users.id']);


  if(empty($item) || $get_item_id == false){
    echo '<script>window.location.href = "404.php";</script>';
    exit;
  }


?>
<!-- 

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59682226aec25f00114bf183&product=sticky-share-buttons"></script> -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="category.php?id=<?php echo $item['tb_item_category.id']; ?>"><?php echo $item['tb_item_category.name']; ?></a>
                            
                        </li>
                        <li>
                            <?php echo ucwords($item['tb_items.name']); ?>
                        </li>
                    </ul>
                </div>


                
                <?php include('includes/sidemenu.php'); ?>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-7">
                            <div id="mainImage">
                                <img src="admin/uploads/items/<?php echo $item['tb_items.image_url'];?>" alt=""  class="details-img img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon"><?php echo strtoupper($item['tb_item_status.name']);?></div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="box" id="details">
                                <p>
                                    <h4>Description</h4>
                                    <blockquote>
                                        <p>
                                            <em><?php echo $item['tb_items.description']; ?></em>
                                        </p>
                                    </blockquote>

                                    <hr>
                            </div>


                        </div>
                        <div class="col-sm-5">
                            <div class="box">
                                <h1 class="text-center"><?php echo ucwords($item['tb_items.name']); ?></h1>
                                <p class="price">&#8369;<?php echo $item['tb_items.price']; ?>.00</p>
                                
                                <p class="goToDescription">
                                    <a href="#details" class="scroll-to">
                                        by <?php echo $item['tb_users.fname'];?> <?php echo $item['tb_users.lname'];?> <br >ID# <?php echo $item['tb_users.student_id'];?>
                                        <br /><br />
                                        <img style="height:80px;width:80px;border-radius:50%" src="admin/uploads/users/<?php echo $item['tb_users.image_url'];?>">
                                         
                                    </a>
                                </p>

                                <p class="text-center buttons">
                                    <h3 style="text-align:center"><i class="fa fa-phone"></i> <?php echo $item['tb_users.contact']; ?></h3>

                                    <?php if(isset($_SESSION['userdata'])){ ?>
                                        
                                        <?php if($_SESSION['userdata']['id'] != $item['tb_users.id']){ ?>
                                        <p style="text-align:center;margin:10px 0">
                                            Rate the seller &nbsp;
                                            <div class="rate-container">

                                                <?php

                                                    $positive_rate = DB::query("SELECT * FROM tb_rating WHERE rate = 1 AND user_id = %i", $item['tb_users.id']);
                                                    $positive_rate_count = DB::count();

                                                    $negative_rate = DB::query("SELECT * FROM tb_rating WHERE rate = 0 AND user_id = %i", $item['tb_users.id']);
                                                    $negative_rate_count = DB::count();

                                                    $login_user_rated = DB::query("SELECT * FROM tb_rating WHERE voter_id = %i AND user_id = %i", $_SESSION['userdata']['id'], $item['tb_users.id']);

                                                ?>
           
                                                <form id="rateform" name="rateform" action="rating.php" method="GET">

                                                    <!--hidden fields-->
                                                    <input type="hidden" name="user_id" value="<?php echo $item['tb_users.id']; ?>" />
                                                    <input type="hidden" name="voter_id" value="<?php echo $_SESSION['userdata']['id']; ?>" />
                                                    <!--endhidden fields-->

                                                    <div class="btn-group" data-toggle="buttons">
                                                      <label class="btn btn-sm btn-primary <?php echo (($login_user_rated) && $login_user_rated[0]['rate'] == 1) ? 'active' : ''; ?>">
                                                        <input type="radio" name="rate" autocomplete="off" value="1" ><i class="fa fa-thumbs-up" aria-hidden="true"> <?php echo $positive_rate_count;?></i>
                                                      </label>&nbsp;
                                                      <label class="btn btn-sm btn-danger <?php echo (($login_user_rated) && $login_user_rated[0]['rate'] == 0) ? 'active' : ''; ?>">
                                                        <input type="radio" name="rate" autocomplete="off" value="0"><i class="fa fa-thumbs-down" aria-hidden="true"> <?php echo $negative_rate_count;?></i>
                                                      </label>
                                                    </div>
                                                </form>

                                                <hr/>

                                                <p style="text-align:center;margin:10px 0">
                                                    <a href="#" data-toggle="modal" data-target="#message-modal" class="btn btn-primary" style="width:80%">
                                                        <i class="fa fa-comments" aria-hidden="true"></i>
                                                        Message seller
                                                    </a>
                                                </p>

                                                <!--message modal-->
                                                <div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="Message" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="Login">Message Seller</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <form id="messageform" name="messageform" action="addmessage.php" method="POST" style="text-align:left" >

                                                                    <!--hidden fields-->
                                                                    <input type="hidden" name="receiver_id" value="<?php echo $item['tb_users.id']; ?>" />
                                                                    <input type="hidden" name="sender_id" value="<?php echo $_SESSION['userdata']['id']; ?>" />
                                                                    <input type="hidden" name="item_id" value="<?php echo $item['tb_items.id']; ?>" />
                                                                    <!--endhidden fields-->

                                                                    <div class="form-group">
                                                                      <label for="name">Subject</label>
                                                                      <input type="text" name="subject" class="form-control" value="Inquiry on <?php echo $item['tb_items.name'];?> (#<?php echo $item['tb_items.id'];?>)" required>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="message">Message</label>
                                                                        <textarea class="form-control" id="message" name="message" rows="2" required></textarea>
                                                                    </div>

                                                                    <div class="btn-group" data-toggle="buttons">
                                                                        <input type="submit" name="submit_message" class="btn btn-danger pull-right" value="Send">
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end message modal-->


                                               
                                                

                                            </div>
                                        </p>
                                        <?php } ?>
                                    <?php }else{ ?>

                                        <p style="text-align:center;margin:10px 0">
                                        <a href="register.php" onclick="window.open('register.php', 'newwindow', 'width=1200,height=650'); return false;" class="btn btn-primary" style="width:70%"> 
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i><i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                            Register to rate seller 
                                        </a>
                                        </p>

                                        <p style="text-align:center;margin:10px 0">
                                        <a href="register.php" onclick="window.open('register.php', 'newwindow', 'width=1200,height=650'); return false;" class="btn btn-warning" style="width:70%">
                                            <i class="fa fa-comments" aria-hidden="true"></i>
                                            Register to message seller 
                                        </a>
                                        </p>

                                        
                                    <?php } ?>
                                </p>
                                
                                


                            </div>

                        </div>

                    </div>


                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height" style="text-align:center">
                                 <img style="height:80px;width:80px;border-radius:50%" src="admin/uploads/users/<?php echo $item['tb_users.image_url'];?>">
                                <br>
                                <h3>Other items posted by <?php echo ucwords($item['tb_users.fname']); ?></h3>
                            </div>
                        </div>

                        <?php foreach($item_by_owner as $key=>$item_by){ ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height" >
                                <div class="flip-container">
                                      <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $item_by['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item_by['image_url']; ?>" alt="" style="width:100%;height:200px" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?php echo $item_by['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item_by['image_url']; ?>" style="width:100%;height:220px" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?id=<?php echo $item_by['id']; ?>" class="invisible">
                                    <img src="admin/uploads/items/<?php echo $item_by['image_url']; ?>" alt="" style="width:100%;height:200px" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?id=<?php echo $item_by['id']; ?>"><?php echo ucwords($item_by['name']); ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item_by['price']; ?>.00</p>
                                    <p class="buttons">
                                        <a href="detail.php?id=<?php echo $item_by['id']; ?>" class="btn btn-default">View detail</a>
                                        <!-- <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                    </p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>


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
        var page = 'category';
        $("." + page + " > a").addClass("active");

        var category_id = "<?php echo $item['tb_item_category.id']; ?>";
        $(".category_" + category_id).addClass("active");
      </script>