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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Data Jurusan - SMK TI Bali Global Denpasar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-6">
            <h1 class="text-2xl sm:text-3xl font-semibold text-gray-800">Data Jurusan</h1>
        </header>

        <nav class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
            <div class="flex gap-2">
                <a href="../index.php" class="inline-block bg-white border border-gray-200 text-gray-700 px-3 py-2 rounded shadow-sm hover:bg-gray-50">Home</a>
            </div>
            <div>
                <a href="add.php" class="inline-block bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Tambah Jurusan</a>
            </div>
        </nav>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM jurusan");
                        while ($d = $data->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700"><?= $no++; ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700"><?= htmlspecialchars($d['kode'] ?? ''); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700"><?= htmlspecialchars($d['nama_jurusan'] ?? ''); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm">
                                    <div class="flex gap-2">
                                        <a href="edit.php?id=<?= urlencode($d['id'] ?? ''); ?>" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                        <a href="delete.php?id=<?= urlencode($d['id'] ?? ''); ?>" class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>