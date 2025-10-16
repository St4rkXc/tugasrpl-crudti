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
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-semibold mb-6 text-center text-gray-800">Masuk</h1>

        <form method="post" class="space-y-5" novalidate>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input id="username" name="username" type="text" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900
                              placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900
                              placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" />
            </div>

            <button name="login" type="submit"
                class="w-full py-2.5 bg-indigo-600 text-white font-medium rounded-md shadow-sm
                           hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                Masuk
            </button>

            <p class="text-center text-sm text-gray-500 mt-2">
                Belum punya akun?
                <a href="#" class="text-indigo-600 hover:underline">Daftar</a>
            </p>
        </form>
    </div>
</body>

</html>