<?php
$host = "localhost";
$user = "staff";
$password = "12345";
$database = "sekolah";

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>