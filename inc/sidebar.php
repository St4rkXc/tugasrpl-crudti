<div class="flex flex-col justify-between bg-white border-r border-zinc-200 h-screen w-96 p-4 rounded-r-xl shadow-sm sticky top-0">
    <div>
        <div class="border-b-2 border-b-zinc-200 pb-3">
            <h2 class="text-lg font-semibold text-zinc-800">
                SMK TI Bali Global Denpasar
            </h2>
        </div>

        <?php
        $currentFile = basename($_SERVER['PHP_SELF']);
        $currentDir = basename(dirname($_SERVER['PHP_SELF']));
        ?>

        <nav class="space-y-1 mt-4 flex flex-col justify-between h-full">
            <!-- Dashboard -->
            <div class="space-y-1">
                <a href="../index.php"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition
                <?php echo ($currentFile == 'index.php' && $currentDir == '') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-100'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10h16V10" />
                    </svg>
                    Dashboard
                </a>

                <!-- Data Siswa -->
                <a href="../siswa/index.php"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition
                <?php echo ($currentDir == 'siswa') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-100'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Data Siswa
                </a>

                <!-- Jurusan -->
                <a href="../jurusan/index.php"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition
                <?php echo ($currentDir == 'jurusan') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-100'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                    </svg>
                    Jurusan
                </a>

                <!-- Mata Pelajaran -->
                <a href="../mata_pelajaran/index.php"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition
                <?php echo ($currentDir == 'mata_pelajaran') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-100'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Mata Pelajaran
                </a>

                <!-- Ekstrakurikuler -->
                <a href="../ekstra/index.php"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition
                <?php echo ($currentDir == 'ekstra') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-100'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v10l11-5L8 7z" />
                    </svg>
                    Ekstrakurikuler
                </a>

                <!-- Guru -->
                <a href="../guru/index.php"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition
                <?php echo ($currentDir == 'guru') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-100'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0118 16.5c0 2.485-2.686 4.5-6 4.5s-6-2.015-6-4.5c0-1.86.88-3.58 2.84-4.922L12 14z" />
                    </svg>
                    Guru
                </a>
            </div>

        </nav>
    </div>
    <div class="border-t border-zinc-200 pt-4">
        <a href="../../inc/auth/logout.php" class="flex items-center px-3 py-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            Logout
        </a>
    </div>
</div>