<?php 
$telp = "081231";

try {
    $con = new PDO('mysql:host=localhost;dbname=perpustakaan', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi Gagal : " . $e->getMessage();
}



