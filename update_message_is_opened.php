<?php 
include('includes/header.php'); 

$message_id = $_GET['id'];
$user_id = $_SESSION['userdata']['id'];

/*update is_opened for message and replies*/
DB::query('UPDATE tb_messages SET is_opened = 1 WHERE id = %i AND receiver_id = %i', $message_id, $user_id);
DB::query('UPDATE tb_messages SET is_opened = 1 WHERE parent_id = %i AND receiver_id = %i', $message_id, $user_id);


echo '<script>window.location.href = "messagedetail.php?id='.$message_id.'";</script>';



?>