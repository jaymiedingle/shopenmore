<?php

include('../libs/meekrodb.2.3.class.php');
include('../libs/common.php');

$table = $_POST['table'];
$id = $_POST['id'];
$update_field = $_POST['update_field'];
$update_value = $_POST['update_value'];

 //insert data in database
$updated = DB::update($table,array($update_field => $update_value), "id=%s", $id);

if($updated){
	unset($_SESSION['error']);
	$_SESSION['error'] = "Updated successfully";
	echo json_encode($updated);
}

