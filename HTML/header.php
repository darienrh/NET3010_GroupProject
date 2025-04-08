<?php
// Start the session (needed for login functionality)
// session_start();

// Database connection (using PDO for better security)
// require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleSheet.css">
    <title>Welcome to Gizmo Galaxy!</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="Images/Logo.png" width="200px" alt="Gizmo Galaxy Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="LandingPage.php">Home</a></li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="LoginPage.php">Login</a></li>
                    <li><a href="UserRegistration.php">Sign Up</a></li>
                    
                    <!-- <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="User_deals.php">Exclusive Deals</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li class="welcome-msg">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</li>
                    <?php else: ?>
                        <li><a href="LoginPage.php">Login</a></li>
                        <li><a href="UserRegistration.php">Sign Up</a></li>
                    <?php endif; ?> -->
                </ul>
            </nav>
        </div>
    </header>