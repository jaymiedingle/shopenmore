<div class="container">
    <div class="col-md-12">
        <div id="main-slider" >


            <?php 
            $banners = DB::query("SELECT * FROM tb_banners WHERE is_active = 1");

            foreach($banners as $key=>$banner) { 

             ?>
            <div class="item">
                <a href="<?php echo $banner['link']; ?>" target="__blank">
                    <img src="admin/uploads/banners/<?php echo $banner['image_url']; ?>" title="<?php echo $banner['name']; ?>" alt="<?php echo $banner['name']; ?>" class="img-responsive" style="height: 350px;">
                </a>
            </div>
            <?php } ?>
        </div>
        <!-- /#main-slider -->
    </div>
</div>