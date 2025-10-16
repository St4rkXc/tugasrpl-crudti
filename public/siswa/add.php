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
                <td>NIS</td>
                <td><input type="text" name="nis" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas" required></td>
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
        $stmt = $koneksi->prepare("INSERT INTO siswa (nis,nama,kelas,jurusan) VALUES (:nis, :nama, :kelas, :jurusan)");
        $stmt->execute([
            ':nis' => $_POST['nis'],
            ':nama' => $_POST['nama'],
            ':kelas' => $_POST['kelas'],
            ':jurusan' => $_POST['jurusan']
        ]);
        echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
    }
    ?>
</body>

</html>