
<?php
//Darien Ramirez-Hennessey

session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['first_name']; // store name in session
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid credentials.";
    }
}
?>
