<?php
include '../connection.php';
session_start();

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if (empty($username) || empty($password) || empty($confirm)) {
        $error = "Semua field harus diisi!";
    } elseif ($password !== $confirm) {
        $error = "Password tidak sama!";
    } else {

        $check = $koneksi->prepare("SELECT * FROM users WHERE username = :username");
        $check->execute([':username' => $username]);
        if ($check->fetch()) {
            $error = "Username sudah digunakan!";
        } else {

            $hashed = md5($password);
            $stmt = $koneksi->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashed
            ]);

            header('Location: login.php?success=1');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar — SMK TI Bali Global Denpasar</title>
    <link rel="stylesheet" href="../../src/css/output.css">

</head>

<body class="min-h-screen bg-zinc-50 flex items-center justify-center px-4">
    <div class="w-full max-w-sm bg-white border border-zinc-200 rounded-2xl shadow-sm p-8">
        <div class="flex flex-col items-center text-center mb-6">
            <img src="../../src/img/logosekolahti.png" class="h-17 w-16" alt="">
            <h1 class="text-xl font-semibold text-zinc-800 mt-4">Buat Akun Baru</h1>
            <p class="text-sm text-zinc-500 mt-1 ">Isi data anda dan pastikan data anda tidak digunakan oleh orang lain</p>
        </div>

        <?php if (!empty($error)) : ?>
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm p-3">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post" class="space-y-4">
            <div class="space-y-1">
                <label for="username" class="text-sm font-medium text-zinc-700">Username</label>
                <input id="username" name="username" type="text" required
                    class="w-full px-3 py-2 text-sm rounded-lg border border-zinc-300 bg-white text-zinc-800 placeholder-zinc-400 focus:outline-none">
            </div>

            <div class="space-y-1">
                <label for="password" class="text-sm font-medium text-zinc-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-3 py-2 text-sm rounded-lg border border-zinc-300 bg-white text-zinc-800 placeholder-zinc-400 focus:outline-none">
            </div>

            <div class="space-y-1">
                <label for="confirm" class="text-sm font-medium text-zinc-700">Konfirmasi Password</label>
                <input id="confirm" name="confirm" type="password" required
                    class="w-full px-3 py-2 text-sm rounded-lg border border-zinc-300 bg-white text-zinc-800 placeholder-zinc-400 focus:outline-none">
            </div>

            <button name="register" type="submit"
                class="w-full mt-4 py-2.5 rounded-lg bg-zinc-900 text-white text-sm font-medium hover:bg-zinc-700 transition">
                Daftar
            </button>

            <p class="text-center text-sm text-zinc-500 mt-3">
                Sudah punya akun?
                <a href="login.php" class="text-zinc-600 hover:underline font-semibold">Masuk</a>
            </p>
        </form>

        <footer class="mt-8 text-center text-xs text-zinc-400">
            © 2025 SMK TI Bali Global Denpasar
        </footer>
    </div>
</body>

</html>