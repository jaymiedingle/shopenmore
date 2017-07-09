<?php
session_start();

// Finally, destroy the session.
unset($_SESSION['admindata']);

// after sesion destroy redirect to home page

header('Location:index.php');
exit();
