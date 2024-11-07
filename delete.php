<?php

include_once 'config/config.php';
include_once 'Model/user.php';
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->id = $_GET["id"];
$hasil = $user->delete();
if ($hasil) header("Location: ./");
else echo "<h1>Data Gagal Dihapus<h1><br>- <a href=\"./\">Back Home</a>";
