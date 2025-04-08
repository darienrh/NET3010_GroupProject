<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, phone, email, postal_code, password)
                           VALUES (?, ?, ?, ?, ?, ?)");

    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['postal_code'],
        $hashedPassword
    ]);

    header("Location: login.php?registered=true");
    exit();
}
?>
