<?php
session_start();

// Finally, destroy the session.
unset($_SESSION['error_type']);
unset($_SESSION['error_message']);

// after sesion destroy redirect to home page

//header('Location:index.php');
//exit();

return true;


