<?php
include_once 'config/config.php';
include_once 'Model/user.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $db = new Database();
    $perpustakaan = new User($db->getConnection());
    if ($perpustakaan->create($nama, $alamat)) {
        echo "<h1>Data Berhasil Dikirim</h1> <br>";
    } else {
        echo "<h1>Data Gagal Dikirim<h1> <br>";
    }
    echo "-<a href='index.php/'>Cek List Data</a> <br>";
    echo "-<a href='create.php'>Masukkan Data Lainnya</a>";
} else {
    echo "Tidak ada data yang dikirim.";
}