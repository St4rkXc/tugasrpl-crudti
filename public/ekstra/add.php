<?php include '../../inc/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../inc/auth/login.php');
    exit;
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="../../src/css/output.css">
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <main class="w-full max-w-lg bg-white shadow border border-zinc-200 rounded-lg p-8">
        <header class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Data Ekstra</h1>
            <p class="text-sm text-gray-500">Isi form berikut untuk menambahkan siswa baru ke dalam database.</p>
        </header>

        <form method="post" class="space-y-6">
            <div class="grid grid-cols-1 gap-4">
                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Nama Ekstra</span>
                    <input type="text" name="nama_ekstra" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Jadwal</span>
                    <input type="text" name="jadwal" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Guru Pengajar</span>
                    <input type="text" name="guru_ekstra" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2" />
                </label>
            </div>

            <div class="flex items-center justify-between">
                <a href="index.php"
                    class="text-sm text-gray-600 hover:underline">Kembali</a>
                <button type="submit" name="simpan"
                    class="inline-flex items-center rounded-md bg-zinc-800 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-zinc-200">
                    Simpan
                </button>
            </div>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $stmt = $koneksi->prepare("INSERT INTO ekstrakurikuler (nama_ekstra, jadwal, guru_ekstra) VALUES (:nama_ekstra, :jadwal, :guru_ekstra)");
            $stmt->execute([
                ':nama_ekstra' => $_POST['nama_ekstra'],
                ':jadwal' => $_POST['jadwal'],
                ':guru_ekstra' => $_POST['guru_ekstra']
            ]);
            echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
        }
        ?>
    </main>
</body>

</html>