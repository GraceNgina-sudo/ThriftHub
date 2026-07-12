<?php

session_start();

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Find user by email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(array($email));

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password (PHP 5.3 compatible)
    if ($user && md5($password) == $user['password']) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == "customer") {

            header("Location: ../customer/dashboard.php");

        } elseif ($user['role'] == "seller") {

            header("Location: ../seller/dashboard.php");

        } elseif ($user['role'] == "admin") {

            header("Location: ../admin/dashboard.php");

        }

        exit();

    } else {

        header("Location: login.php?error=1");
        exit();

    }

}

?>