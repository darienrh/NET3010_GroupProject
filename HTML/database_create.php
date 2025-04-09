<?php
// Initial connection
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'groupprojectwebsite');

$message = '';
$message_class = '';

try {
    $conn = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    $message .= "Database '" . DB_NAME . "' created or already exists.<br>";

    
    $conn->exec("USE " . DB_NAME);//Select the database

    //Create the 'user' table
    $tableSQL = "CREATE TABLE IF NOT EXISTS users (
        users_id INT AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(100) NOT NULL,
        user_password VARCHAR(50) NOT NULL,
        user_email VARCHAR(100) UNIQUE,
        user_permissions INT DEFAULT 2,
        user_role ENUM('admin', 'customer') DEFAULT 'customer',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB";

    $conn->exec($tableSQL);
    $message .= "Table 'products' created or already exists.<br>";
    $message_class = 'message';

} catch (PDOException $e) {
    $message = "Error: " . $e->getMessage();
    $message_class = 'error';
}
?>