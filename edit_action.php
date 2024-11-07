<?php
require_once 'config/config.php';
require_once 'Model/user.php';

require_once 'config/config.php';
require_once 'Model/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->id = $_POST['id'];
$user->nama = $_POST['nama'];
$user->alamat = $_POST['alamat'];
$hasil = $user->edit();

if ($hasil) {
    echo "<h1>Data berhasil di edit.</h1>";
} else {
    echo "<h1>Data tidak bisa di edit.</h1>";
}
echo "- <a href=\"./\">Back Home</a>";

