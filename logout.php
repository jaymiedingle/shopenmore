<?php
session_start();

// Finally, destroy the session.
session_destroy();

// after sesion destroy redirect to home page

header('Location:index.php');
exit();
