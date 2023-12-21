<?php
session_start();
session_destroy();
unset($_SESSION['user_name']);
unset($_SESSION['role']);
header('location:login.php');
