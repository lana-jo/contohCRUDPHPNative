<?php
require_once 'config/config.php';
require_once 'Model/user.php';
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->id = $_GET['id'];
$hasil = $user->delete();
if($hasil) {
    header('location: ./');
} else {
    echo "<h1>";
    echo "data tidak bisa di hapus.";
    echo "</h1>";
    echo "- <a href=\"./\">Back Home</a>";
}
?>