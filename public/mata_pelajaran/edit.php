<?php
include '../../inc/connection.php';

$id = $_GET['id'] ?? '';
$stmt = $koneksi->prepare("SELECT * FROM mata_pelajaran WHERE id = :id");
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
    <title>Edit Data Mata Pelajaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow border border-b-zinc-200 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Data Mapel</h1>
            <p class="mt-1 text-sm text-gray-500">Perbarui informasi Mapel di bawah ini.</p>
            <span class="text-sm text-gray-500">Terakhir diedit untuk ID: <span class="font-medium text-gray-700"><?= htmlspecialchars($id) ?></span></span>
        </div>

        <form method="post" class="px-6 py-6">
            <div class="grid grid-cols-1 gap-4 ">
                <div>
                    <label for="nama_mapel" class="block text-sm font-medium text-gray-700 mb-1">Nama Mapel</label>
                    <input id="nama_mapel" name="nama_mapel" type="text" required
                        value="<?= htmlspecialchars($d['nama_mapel'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 focus:outline-none " />
                </div>

                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                    <input id="kelas" name="kelas" type="text" required
                        value="<?= htmlspecialchars($d['kelas'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 focus:outline-none " />
                </div>

                <div>
                    <label for="guru_pengajar" class="block text-sm font-medium text-gray-700 mb-1">Guru Pengajar</label>
                    <input id="guru_pengajar" name="guru_pengajar" type="text" required
                        value="<?= htmlspecialchars($d['guru_pengajar'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 focus:outline-none " />
                </div>

            </div>

            <div class="mt-6 flex items-center justify-between space-x-3">
                <div class="flex items-center space-x-2">
                    <button type="submit" name="update"
                        class="inline-flex items-center gap-2 rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 focus:outline-none ">
                        Simpan Perubahan
                    </button>
                    <a href="index.php"
                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $stmt = $koneksi->prepare("UPDATE mata_pelajaran SET 
                nama_mapel = :nama_mapel,
                kelas = :kelas,
                guru_pengajar = :guru_pengajar
                WHERE id = :id
            ");
            $stmt->execute([
                ':nama_mapel' => $_POST['nama_mapel'],
                ':kelas' => $_POST['kelas'],
                ':guru_pengajar' => $_POST['guru_pengajar'],
                ':id' => $id
            ]);
            echo "<script>alert('Data berhasil diperbarui');window.location='index.php';</script>";
        }
        ?>
    </div>
</body>

</html>