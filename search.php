Skip to content
This repository
Search
Pull requests
Issues
Marketplace
Gist
 @roeldingle
 Sign out
 Unwatch 1
  Star 0
  Fork 0 roeldingle/mybazaar
 Code  Issues 0  Pull requests 0  Projects 0  Wiki  Settings Insights 
Branch: master Find file Copy pathmybazaar/search.php
f6142ac  16 hours ago
@roeldingle roeldingle search compleed
1 contributor
RawBlameHistory     
173 lines (133 sloc)  6.58 KB
<?php include('includes/header.php'); ?>

<?php include('includes/top-bar.php'); ?>

<?php include('includes/nav-bar.php'); ?>

<?php
$get_search = isset($_GET['search']) ?  $_GET['search'] : 'No search set';
//get site info from database
$search_items = DB::query("SELECT * FROM tb_items WHERE is_active = 1 AND name LIKE '%".$get_search."%'");
?>
<!--add active state on navigation current page via class-->
<style type="text/css">
.category > a{
    color: #fff !important;
    background-color: #6eb752;
} 
.category > a:hover, .category > li:hover{
    color: #000 !important;
    /*background-color: #6eb752;*/
} 
</style>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Search : <?php echo $get_search; ?></li>
                    </ul>
                </div>

                
                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <!--loop category-->
                                 <?php foreach($item_categories as $key=>$cat){ ?>
                                 <?php
                                    /*count items per category*/
                                    DB::query("SELECT * FROM tb_items WHERE is_active = 1 AND item_category_id=%s", $cat['id']);
                                    $counter = DB::count();
                                 ?>
                                <li>
                                    <a href="category.php?id=<?php echo $cat['id']; ?>"> <span class="badge pull-right"><?php echo $counter; ?></span> <?php echo $cat['name']; ?> </a>
                                </li>
                                <?php } ?>
                                <!--end loop category-->
                            </ul>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                </div>

                <div class="col-md-9">

                    <div class="box">
                        <h1>Search : <span class="highlight"><?php echo $get_search; ?></span> </h1>
                    </div>


                    <div class="row products">
                        
                        <!--loop item-->
                        <?php foreach($search_items as $key=>$item){ ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item['image_url']; ?>" alt="" style="width:100%;height:280px" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id=<?php echo $item['id']; ?>">
                                                <img src="admin/uploads/items/<?php echo $item['image_url']; ?>" style="width:100%;height:300px" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?id=<?php echo $item['id']; ?>" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h3>
                                    <p class="price">&#8369;<?php echo $item['price']; ?>.00</p>
                                    <p class="buttons">
                                        <a href="detail.php?id=<?php echo $item['id']; ?>" class="btn btn-default">View detail</a>
                                        <!-- <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>

                       

                    </div>
                    <!-- /.products -->


                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        

 <?php include('includes/footer.php'); ?>


<script src="js/jquery.mark.min.js"></script>
<script type="text/javascript">
var searchTerm = "<?php echo $get_search; ?>"
// Search for the search term in your context
$(".text h3 a").mark(searchTerm, {
    "element": "span",
    "className": "highlight"
});
</script>
Contact GitHub API Training Shop Blog About
© 2017 GitHub, Inc. Terms Privacy Security Status Help