<?php
include '../include/config.php';
unset($_SESSION['student']); 
if(isset($_SESSION['logout_redirect'])){
    $redirect = $_SESSION['logout_redirect'];
    echo "<script>open('$redirect','_self')</script>";
    unset($_SESSION['logout_redirect']);
}
redirect('../index');
?>
