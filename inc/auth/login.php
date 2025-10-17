<?php
include '../connection.php';
session_start();

if (isset($_POST['login'])) {
    $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $_POST['username']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === md5($_POST['password'])) {
        $_SESSION['user'] = $user;
        header('Location: ../../public/index.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login — SMK TI Bali Global Denpasar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-zinc-50 flex items-center justify-center px-4">
    <div class="w-full max-w-sm bg-white border border-zinc-200 rounded-2xl shadow-sm p-8">
        <div class="flex flex-col items-center text-center mb-6">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-zinc-100 text-zinc-600 font-bold text-lg mb-2">
                TI
            </div>
            <h1 class="text-xl font-semibold text-zinc-800">SMK TI Bali Global Denpasar</h1>
            <p class="text-sm text-zinc-500 mt-1">Masuk untuk melanjutkan</p>
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
                    class="w-full px-3 py-2 text-sm rounded-lg border border-zinc-300 bg-white text-zinc-800 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinx-500 focus:border-transparent" />
            </div>

            <div class="space-y-1">
                <label for="password" class="text-sm font-medium text-zinc-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-3 py-2 text-sm rounded-lg border border-zinc-300 bg-white text-zinc-800 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-500 focus:border-transparent" />
            </div>

            <button name="login" type="submit"
                class="w-full mt-4 py-2.5 rounded-lg bg-zinc-600 text-white text-sm font-medium hover:bg-zinc-700 focus:ring-2 focus:ring-zinc-500 transition">
                Masuk
            </button>

            <p class="text-center text-sm text-zinc-500 mt-3">
                Belum punya akun?
                <a href="#" class="text-zinc-600 hover:underline">Daftar</a>
            </p>
        </form>

        <footer class="mt-8 text-center text-xs text-zinc-400">
            © 2025 SMK TI Bali Global Denpasar
        </footer>
    </div>
</body>

</html>