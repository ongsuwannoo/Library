<?php
session_start();
$_SESSION['login_status'] = 0;
session_destroy();
header('Location: dashboard.php');
 ?>