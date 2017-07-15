<?php 
include('includes/header.php'); 

$item_to_delete = $_GET['id'];

//change to update is_active for soft delete
//$deleted = DB::update('tb_items',array('is_active'=>0), "id=%s", $item_to_delete);
$deleted = DB::delete('tb_items', "id=%s", $item_to_delete);


if($deleted){
	$type = 'success';
    $message = "Item deleted successfully";
    Common::display_message_alert($type, $message);
    echo '<script>window.location.href = "myitems.php";</script>';
}



?>