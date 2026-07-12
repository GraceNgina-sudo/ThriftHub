<?php

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $role = $_POST["role"];

    // Check if email already exists
    $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute(array($email));

    if ($check->rowCount() > 0) {

        die("Email already exists.");

    }

    // Hash password (PHP 5.3 compatible)
    $hashedPassword = md5($password);

    // Insert user
    $stmt = $pdo->prepare("
        INSERT INTO users
        (full_name, email, password, role)
        VALUES
        (?, ?, ?, ?)
    ");

    $stmt->execute(array(

        $full_name,
        $email,
        $hashedPassword,
        $role

    ));

    header("Location: login.php?registered=1");
    exit();

}

?>