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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <main class="w-full max-w-lg bg-white border border-zinc-200 shadow rounded-lg p-8">
        <header class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Data Siswa</h1>
            <p class="text-sm text-gray-500">Isi form berikut untuk menambahkan siswa baru ke dalam database.</p>
        </header>

        <form method="post" class="space-y-6">
            <div class="grid grid-cols-1 gap-4">
                <label class="block">
                    <span class="text-sm font-medium text-gray-700">NIS</span>
                    <input type="text" name="nis" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Nama</span>
                    <input type="text" name="nama" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Kelas</span>
                    <input type="text" name="kelas" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Jurusan</span>
                    <input type="text" name="jurusan" required
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
            $stmt = $koneksi->prepare("INSERT INTO siswa (nis, nama, kelas, jurusan) VALUES (:nis, :nama, :kelas, :jurusan)");
            $stmt->execute([
                ':nis' => $_POST['nis'],
                ':nama' => $_POST['nama'],
                ':kelas' => $_POST['kelas'],
                ':jurusan' => $_POST['jurusan']
            ]);
            echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
        }
        ?>
    </main>
</body>

</html>