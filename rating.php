<?php
include('libs/meekrodb.2.3.class.php');
include('libs/common.php');


$voter_id = $_GET['voter_id'];
$user_id = $_GET['user_id'];
$rate = $_GET['rate'];

$table = 'tb_rating';

$checker = DB::query("SELECT * FROM ". $table ." WHERE voter_id = %i AND user_id = %i", $voter_id, $user_id);

if($checker){
	 //update data in database
	if($rate != $checker[0]['rate']){
		$updated = DB::update($table,array('rate' => $rate), "id=%s", $checker[0]['id']);
	}
	
}else{
	 //insert data in database

	$data = array(
		'user_id' => $user_id,
		'voter_id' => $voter_id,
		'rate' => $rate
	);
	
	$insert = DB::insert($table,$data);
}



echo '<script>window.history.back();</script>';
