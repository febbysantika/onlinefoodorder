<?php 

    if(!isset($_SESSION['user'])) 
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Silakan Masuk untuk mengakses Panel Admin.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }

?>