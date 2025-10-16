<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SMK TI Bali Global Denpasar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-50 text-gray-800 font-sans">
    <header class="bg-white shadow">
        <div class="max-w-5xl mx-auto px-6 py-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-indigo-700">SMK TI Bali Global Denpasar</h1>
                <p class="text-sm text-gray-500 mt-1">Website Manajemen Data Sekolah</p>
            </div>
            <div class="text-sm text-gray-500">Selamat datang — akses data sekolah melalui menu di bawah</div>
        </div>
    </header>

    <nav class="bg-indigo-600">
        <div class="max-w-5xl mx-auto px-6 py-4 flex flex-wrap justify-center gap-3">
            <a href="siswa/index.php" class="inline-block px-4 py-2 rounded-md bg-white text-indigo-600 font-medium shadow-sm hover:shadow-md transition">Data Siswa</a>
            <a href="guru/index.php" class="inline-block px-4 py-2 rounded-md bg-indigo-500 text-white font-medium hover:bg-indigo-600 transition">Data Guru</a>
            <a href="jurusan/index.php" class="inline-block px-4 py-2 rounded-md bg-indigo-500 text-white font-medium hover:bg-indigo-600 transition">Data Jurusan</a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-6 py-20">
        <section class="bg-white rounded-lg shadow p-8 text-center">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">Selamat Datang di Sistem Informasi Sekolah</h2>
            <p class="mt-4 text-gray-600">Kelola data siswa, guru, dan jurusan dengan mudah. Pilih menu untuk memulai.</p>
            <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="siswa/index.php" class="px-5 py-2 rounded-md bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition">Lihat Data Siswa</a>
                <a href="guru/index.php" class="px-5 py-2 rounded-md border border-indigo-200 text-indigo-600 hover:bg-indigo-50 transition">Lihat Data Guru</a>
            </div>
        </section>
    </main>

    <footer class="mt-12 pb-8 text-center text-sm text-gray-500">
        © SMK TI Bali Global Denpasar
    </footer>
</body>

</html>