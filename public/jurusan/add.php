<?php include '../../inc/connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h2>Tambah Data Siswa</h2>
    <form method="post">
        <table>

            <tr>
                <td>Kode</td>
                <td><input type="text" name="kode" required></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        // Use PDO prepared statement to insert data safely
        $stmt = $koneksi->prepare("INSERT INTO jurusan (kode,nama_jurusan) VALUES (:kode, :nama_jurusan)");
        $stmt->execute([
            ':kode' => $_POST['kode'],
            ':nama_jurusan' => $_POST['jurusan']
        ]);
        echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
    }
    ?>
</body>

</html>