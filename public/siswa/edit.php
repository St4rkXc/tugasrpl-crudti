<?php
include '../../inc/connection.php';

$id = $_GET['id'] ?? '';
$stmt = $koneksi->prepare("SELECT * FROM siswa WHERE id = :id");
$stmt->execute([':id' => $id]);
$d = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../inc/auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="../../src/css/output.css">
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow border border-zinc-200 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Data Siswa</h1>
            <p class="mt-1 text-sm text-gray-500">Perbarui informasi siswa di bawah ini.</p>
            <span class="text-sm text-gray-500">Terakhir diedit untuk ID: <span class="font-medium text-gray-700"><?= htmlspecialchars($id) ?></span></span>
        </div>

        <form method="post" class="px-6 py-6">
            <div class="grid grid-cols-1 gap-4 ">
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
                    <input id="nis" name="nis" type="text" required
                        value="<?= htmlspecialchars($d['nis'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 focus:outline-none " />
                </div>

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input id="nama" name="nama" type="text" required
                        value="<?= htmlspecialchars($d['nama'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 focus:outline-none " />
                </div>

                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                    <input id="kelas" name="kelas" type="text" required
                        value="<?= htmlspecialchars($d['kelas'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 focus:outline-none " />
                </div>

                <div>
                    <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                    <input id="jurusan" name="jurusan" type="text" required
                        value="<?= htmlspecialchars($d['jurusan'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 focus:outline-none " />
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between space-x-3">
                <div class="flex items-center space-x-2">
                    <button type="submit" name="update"
                        class="inline-flex items-center gap-2 rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 focus:outline-none focus:ring-2 transition ">
                        Simpan Perubahan
                    </button>
                    <a href="index.php"
                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                        Batal
                    </a>
                </div>

            </div>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $stmt = $koneksi->prepare("UPDATE siswa SET 
                nis = :nis,
                nama = :nama,
                kelas = :kelas,
                jurusan = :jurusan
                WHERE id = :id
            ");
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
    </div>
</body>

</html>