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
                <li class="category_<?php echo $cat['id']; ?>">
                    <a href="category.php?id=<?php echo $cat['id']; ?>"> <span class="badge pull-right"><?php echo $counter; ?></span> <?php echo $cat['name']; ?> </a>
                </li>
                <?php } ?>
                <!--end loop category-->
            </ul>

        </div>
    </div>

    <!-- *** MENUS AND FILTERS END *** -->

</div>