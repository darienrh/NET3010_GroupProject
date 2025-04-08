<?php
session_start(); // session must start!!!!!!
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

                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']); ?>)</a></li>
                    <?php else: ?>
                        <li><a href="UserRegistration.php">Sign Up</a></li>
                        <li><a href="LoginPage.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
