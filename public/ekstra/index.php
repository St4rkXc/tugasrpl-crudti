<?php
include '../../inc/connection.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Data Siswa - SMK TI Bali Global Denpasar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex gap-x-6 h-full">
        <?php include '../../inc/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="w-full p-4">
            <header class="mb-6">
                <h1 class="text-2xl sm:text-3xl font-semibold text-gray-800">Data Ekstrakurikuler</h1>
            </header>

            <nav class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                <div>
                    <a href="add.php" class="inline-flex gap-2 items-center bg-zinc-900 text-white px-3 py-2 rounded-md text-sm hover:bg-zinc-800">
                        Tambah
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </a>
                </div>
            </nav>

            <div class="bg-white border border-gray-200 shadow-sm rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wide text-xs">No</th>
                                <th class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wide text-xs">Nama Ekstra</th>
                                <th class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wide text-xs">Jadwal</th>
                                <th class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wide text-xs">Guru Ekstra</th>
                                <th class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wide text-xs text-right">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            <?php
                            $no = 1;
                            $data = $koneksi->query("SELECT * FROM ekstrakurikuler");
                            while ($d = $data->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-gray-800"><?= $no++; ?></td>
                                    <td class="px-6 py-4 text-gray-800 font-medium"><?= htmlspecialchars($d['nama_ekstra'] ?? ''); ?></td>
                                    <td class="px-6 py-4 text-gray-800"><?= htmlspecialchars($d['jadwal'] ?? ''); ?></td>
                                    <td class="px-6 py-4 text-gray-700"><?= htmlspecialchars($d['guru_ekstra'] ?? ''); ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="edit.php?id=<?= urlencode($d['id'] ?? ''); ?>"
                                                class="inline-flex items-center gap-1 px-2 py-2 rounded-md bg-yellow-500 text-white hover:bg-yellow-600 transition text-xs font-medium shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M4 13v7h7l9.293-9.293" />
                                                </svg>
                                            </a>
                                            <a href="delete.php?id=<?= urlencode($d['id'] ?? ''); ?>"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="inline-flex items-center gap-1 px-2 py-2 rounded-md bg-red-600 text-white hover:bg-red-700 transition text-xs font-medium shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>