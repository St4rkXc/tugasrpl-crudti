<?php
include '../../inc/connection.php';

$id = $_GET['id'] ?? '';
$stmt = $koneksi->prepare("SELECT * FROM jurusan WHERE id = :id");
$stmt->execute([':id' => $id]);
$d = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Jurusan</h2>

        <form method="post">
            <table class="w-full text-sm text-left text-gray-600">
                <tr>
                    <td>Kode</td>
                    <td><input type="text" name="kode" value="<?= htmlspecialchars($d['kode']) ?>" required></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="jurusan" value="<?= htmlspecialchars($d['jurusan']) ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="pt-4">
                        <button type="submit" name="update"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
                    </td>
                </tr>
            </table>
        </form>


        <?php
        if (isset($_POST['update'])) {
            $stmt = $koneksi->prepare("UPDATE jurusan SET 
        kode=:kode, 
        jurusan=:jurusan 
        WHERE id=:id");
            $stmt->execute([
                ':kode' => $_POST['kode'],
                ':jurusan' => $_POST['jurusan'],
                ':id' => $id
            ]);
            echo "<script>alert('Data berhasil diperbarui');window.location='index.php';</script>";
        }
        ?>
</body>

</html>
<td><input type="text" name="nis" value="<?= htmlspecialchars($d['nis']) ?>" required></td>
</tr>
<tr>
    <td>Nama</td>
    <td><input type="text" name="nama" value="<?= htmlspecialchars($d['nama']) ?>" required></td>
</tr>
<tr>
    <td>Kelas</td>
    <td><input type="text" name="kelas" value="<?= htmlspecialchars($d['kelas']) ?>" required></td>
</tr>
<tr>
    <td>Jurusan</td>
    <td><input type="text" name="jurusan" value="<?= htmlspecialchars($d['jurusan']) ?>" required></td>
</tr>
<tr>
    <td colspan="2" class="pt-4">
        <button type="submit" name="update"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
    </td>
</tr>
</table>
</form>


<?php
if (isset($_POST['update'])) {
    $stmt = $koneksi->prepare("UPDATE siswa SET 
        nis=:nis, 
        nama=:nama, 
        kelas=:kelas, 
        jurusan=:jurusan 
        WHERE id=:id");
    $stmt->execute([
        ':nis' => $_POST['nis'],
        ':nama' => $_POST['nama'],
        ':kelas' => $_POST['kelas'],
        ':jurusan' => $_POST['jurusan'],
        ':id' => $id
    ]);
    echo "<script>alert('Data berhasil diperbarui');window.location='index.php';</script>";
}
?>
</body>

</html>