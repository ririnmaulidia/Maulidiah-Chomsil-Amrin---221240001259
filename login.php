<?php

include 'koneksi.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if ($username == 'admin' && $password == md5('admin')) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
        } else {
                $_SESSION['login_eror'] = "Username or password is incorrect";
                header("Location: login.php");
                exit();
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
       <form action="login.php" method="post">
        <h2>Login</h2>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>

