<?php
//darien ramirez-hennessey
$host = 'localhost';
$db   = 'groupprojectwebsite'; // Use the same name as in database_create.php
$user = 'root';
$pass = ''; // Use a strong password
$charset = 'utf8mb4_general_ci';

// Create connection using MySQLi
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Alternatively using PDO (more secure)
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>