<?php 
include('includes/header.php');

$item_to_delete = $_GET['id'];

//change to update is_active for soft delete
//$deleted = DB::update('tb_items',array('is_active'=>0), "id=%s", $item_to_delete);
$deleted = DB::delete('tb_banners', "id=%s", $item_to_delete);


if($deleted){
    echo '<script>window.location.href = "banners.php";</script>';
}



?>