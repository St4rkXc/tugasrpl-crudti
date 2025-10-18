<?php include '../../inc/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tambah Guru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <main class="w-full max-w-lg bg-white shadow border border-zinc-200 rounded-lg p-8">
        <header class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Data Guru</h1>
            <p class="text-sm text-gray-500">Isi form berikut untuk menambahkan guru baru.</p>
        </header>

        <form method="post" class="space-y-6">
            <div class="grid grid-cols-1 gap-4">
                <label class="block">
                    <span class="text-sm font-medium text-gray-700">NIP</span>
                    <input type="text" name="nip" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Nama</span>
                    <input type="text" name="nama" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium text-gray-700">Mata Pelajaran</span>
                    <input type="text" name="mapel" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-4 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none" />
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
            // Use PDO prepared statement to insert data safely
            $stmt = $koneksi->prepare("INSERT INTO guru (nip,nama,mapel) VALUES (:nip, :nama, :mapel)");
            $stmt->execute([
                ':nip' => $_POST['nip'],
                ':nama' => $_POST['nama'],
                ':mapel' => $_POST['mapel'],
            ]);
            echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
        }
        ?>
    </main>
</body>

</html>