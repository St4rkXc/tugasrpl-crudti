<?php include '../../inc/connection.php';
$id = $_GET['id'];
$stmt = $koneksi->prepare("DELETE FROM ekstrakurikuler WHERE id = :id");
$stmt->execute([':id' => $id]);
header("location:index.php");
?>