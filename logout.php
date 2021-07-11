<?php
include('path.php');
session_start();

/* unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['admin']);
unset($_SESSION['message']);
unset($_SESSION['type']); */
foreach ($s as $key) {
    unset($s[$key]);
}

session_destroy();

header('location:' . BASE_URL . '/index');

?>