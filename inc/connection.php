<?php
// inc/db.php
$DB_HOST = 'localhost';
$DB_NAME = 'sekolah_db';
$DB_USER = 'root';
$DB_PASS = '';

$koneksi = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
if (!$koneksi) {
    die("Koneksi gagal: " . $koneksi->errorInfo()[2]);
}
