<?php 
    // Memulai sesi
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Definisikan konstanta
    define('SITEURL', 'http://localhost/onlinefood-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'onlinefoodorder');
    
    // Membuat koneksi ke database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Memilih database
    $db_select = mysqli_select_db($conn, DB_NAME);

    // Memeriksa pemilihan database
    if (!$db_select) {
        die("Gagal memilih database: " . mysqli_error($conn));
    }
?>
