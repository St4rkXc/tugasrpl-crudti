<!DOCTYPE html>
<html lang="id">

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../inc/auth/login.php');
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SMK TI Bali Global Denpasar</title>
    <link rel="stylesheet" href="../src/css/output.css">
</head>

<body class="min-h-screen bg-zinc-50 text-zinc-800 font-sans flex flex-col">
    <!-- Header -->
    <header class="bg-white border-b-zinc-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="../src/img/logosekolahti.png" class="h-10 w-8" alt="">
                <div>
                    <h1 class="text-lg md:text-xl font-semibold text-zinc-800">SMK TI Bali Global Denpasar</h1>
                    <p class="text-xs text-zinc-500">Sistem Informasi Manajemen Sekolah</p>
                </div>
            </div>

            <a href="../inc/auth/logout.php"
                class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700 transition">
                Logout
            </a>
        </div>
    </header>


    <!-- Main -->
    <main class="flex-grow">
        <div class="max-w-6xl w-fit mx-auto px-6 py-16">
            <div class="bg-white border border-zinc-200  rounded-xl shadow-sm p-8 text-center">
                <h2 class="text-2xl md:text-xl font-semibold text-zinc-800">
                    Selamat Datang di Sistem Informasi Sekolah
                </h2>
                <p class="mt-1 text-zinc-400 text-sm">
                    Kelola data siswa, guru, dan jurusan sekolah.
                </p>

                <div class="mt-8 max-w-md mx-auto flex flex-col gap-2">
                    <a href="siswa/index.php"
                        class="flex items-center justify-between rounded-lg border border-zinc-200 bg-white px-4 py-3 text-zinc-700 font-medium hover:bg-zinc-50 transition">
                        <span>Data Siswa</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-zinc-400 group-hover:text-zinc-600 transition"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L12.586 8H9a1 1 0 110-2h6a1 1 0 011 1v6a1 1 0 11-2 0V8.414l-5.293 5.293a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="guru/index.php"
                        class="flex items-center justify-between rounded-lg border border-zinc-200 bg-white px-4 py-3 text-zinc-700 font-medium hover:bg-zinc-50 transition">
                        <span>Data Guru</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-zinc-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L12.586 8H9a1 1 0 110-2h6a1 1 0 011 1v6a1 1 0 11-2 0V8.414l-5.293 5.293a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="jurusan/index.php"
                        class="flex items-center justify-between rounded-lg border border-zinc-200 bg-white px-4 py-3 text-zinc-700 font-medium hover:bg-zinc-50 transition">
                        <span>Data Jurusan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-zinc-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L12.586 8H9a1 1 0 110-2h6a1 1 0 011 1v6a1 1 0 11-2 0V8.414l-5.293 5.293a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="ekstra/index.php"
                        class="flex items-center justify-between rounded-lg border border-zinc-200 bg-white px-4 py-3 text-zinc-700 font-medium hover:bg-zinc-50 transition">
                        <span>Data Ekstrakurikuler</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-zinc-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L12.586 8H9a1 1 0 110-2h6a1 1 0 011 1v6a1 1 0 11-2 0V8.414l-5.293 5.293a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="mata_pelajaran/index.php"
                        class="flex items-center justify-between rounded-lg border border-zinc-200 bg-white px-4 py-3 text-zinc-700 font-medium hover:bg-zinc-50 transition">
                        <span>Data Mata Pelajaran</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-zinc-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L12.586 8H9a1 1 0 110-2h6a1 1 0 011 1v6a1 1 0 11-2 0V8.414l-5.293 5.293a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t bg-white py-6 text-center text-sm text-zinc-500">
        © 2025 SMK TI Bali Global Denpasar — All rights reserved.
    </footer>
</body>

</html>