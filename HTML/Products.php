<!DOCTYPE html>
<html lang="en">

<!-- Add meta information -->
<<<<<<< HEAD
<head>
    <link rel="stylesheet" href="StyleSheet.css">


    <title>Welcome to Gizmo Galaxy!</title>
</head>
<body>
    <header>
        <img class="logo" src="" alt="">
        <h1>
            <i>Look at our Products!</i>
        </h1>
        <div class="navbar">
            <div class="logo">
                <img src="Logo.png" width="200px">
            </div>
            <nav>
                <ul>
                    <li><a href="LandingPage.php">Home</a></li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="UserRegistration.php">Sign up</a></li>
                    <li><a href="LoginPage.php">Login</a></li>
                </ul>
            </nav>
    
        </div>
=======
<?php include 'header.php'; ?>
<h1><i>Look at our Products!</i></h1>
>>>>>>> 14f8abddf2f1934e85bb73cdb4c70a8a9b5bd9df


    <div class="main-content">
        <main class="products">
            <section>
                <h2 class="section-heading">All Products</h2>
                <img src="images/Micro_Processor.jpg" alt="Micro_Processor">
                <p>Amazing high quality products.</p>
                <a href="Cart.html">Purchase</a>
            </section>
            <section>
            <h2 class="section-heading">Computer Components</h2>
                <img src="images/Mobo_concrete_background.jpg" alt="All Products">
                <p>Amazing high quality products.</p>
                <a href="Cart.html">Purchase</a>
            </section>  
            <section>
                <h2 class="section-heading">Computer Peripherals</h2>
                <img src="images/jay-zhang-dF0nne1hnzQ-unsplash.jpg" alt="Electric Guitar">
                <p>Amazing high quality products.</p>
                <a href="Cart.html">Purchase</a>
            </section>
    </div>
        

    </header>

    <?php include 'footer.php'; ?>
</body>