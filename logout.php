<?php
session_start();

// Finally, destroy the session.
unset($_SESSION['userdata']);

// after sesion destroy redirect to home page

header('Location:index.php');
exit();
