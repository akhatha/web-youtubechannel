<?php
session_start();
unset($_SESSION['username']);
session_destroy(); 
header('location:sign_up_page.php');
 ?>