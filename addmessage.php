<?php include('includes/header.php'); ?>


<?php

// Check if registration form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  /*step 2 gather form data to be saved in database*/
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $is_active = 1; //flag for active users

    $data = array(
        'parent_id' => $parent_id,
        'sender_id' => $sender_id,
        'receiver_id' => $receiver_id,
        'subject' => $subject,
        'message' => $message,
        'is_active' => $is_active,
      );

    //insert data in database
   $inserted = DB::insert('tb_messages',$data);


   if($inserted){
      $type = 'success';
      $message = "Message posted!";
      Common::display_message_alert($type, $message);
      header('Location:'.$_POST['return_url']);
      exit;
   }
}



?>

