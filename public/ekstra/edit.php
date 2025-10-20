<?php
include '../../inc/connection.php';

$id = $_GET['id'] ?? '';
$stmt = $koneksi->prepare("SELECT * FROM ekstrakurikuler WHERE id = :id");
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
    <div class="w-full max-w-md bg-white rounded-lg shadow border border-r-zinc-200 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Data Ekstra</h1>
            <p class="mt-1 text-sm text-gray-500">Perbarui informasi ekstrakurikuler di bawah ini.</p>
            <span class="text-sm text-gray-500">Terakhir diedit untuk ID: <span class="font-medium text-gray-700"><?= htmlspecialchars($id) ?></span></span>
        </div>

        <form method="post" class="px-6 py-6">
            <div class="grid grid-cols-1 gap-6 ">
                <div>
                    <label for="nama_ekstra" class="block text-sm font-medium text-gray-700 mb-1">Nama Ekstra</label>
                    <input id="nama_ekstra" name="nama_ekstra" type="text" required
                        value="<?= htmlspecialchars($d['nama_ekstra'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 " />
                </div>

                <div>
                    <label for="jadwal" class="block text-sm font-medium text-gray-700 mb-1">Jadwal</label>
                    <input id="jadwal" name="jadwal" type="text" required
                        value="<?= htmlspecialchars($d['jadwal'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 " />
                </div>

                <div>
                    <label for="guru_ekstra" class="block text-sm font-medium text-gray-700 mb-1">Guru Pengajar</label>
                    <input id="guru_ekstra" name="guru_ekstra" type="text" required
                        value="<?= htmlspecialchars($d['guru_ekstra'] ?? '') ?>"
                        class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 placeholder-gray-400 " />
                </div>

            </div>

            <div class="mt-6 flex items-center justify-between space-x-3">
                <div class="flex items-center space-x-2">
                    <button type="submit" name="update"
                        class="inline-flex items-center gap-2 rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
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
            $stmt = $koneksi->prepare("UPDATE ekstrakurikuler SET 
                nama_ekstra = :nama_ekstra,
                jadwal = :jadwal,
                guru_ekstra = :guru_ekstra
                WHERE id = :id
            ");
            $stmt->execute([
                ':nama_ekstra' => $_POST['nama_ekstra'],
                ':jadwal' => $_POST['jadwal'],
                ':guru_ekstra' => $_POST['guru_ekstra'],
                ':id' => $id
            ]);
            echo "<script>alert('Data berhasil diperbarui');window.location='index.php';</script>";
        }
        ?>
    </div>
</body>

</html>