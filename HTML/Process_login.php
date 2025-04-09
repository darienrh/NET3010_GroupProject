
<?php
//Darien Ramirez-Hennessey
// Alex Barnard
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['user_name']; // store name in session
        header("Location: LandingPage.php");
        exit();
    } else {
        echo "Invalid credentials.";
    }
}
?>
