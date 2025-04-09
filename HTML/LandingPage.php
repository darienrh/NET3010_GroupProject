<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gizmo Galaxy - Electronics and Computers</title>
    <link rel="stylesheet" href="StyleSheet.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="api.java"></script>

</head>

<body>
<header>
        <img class="logo" src="" alt="">
        <h1>
            <i>Welcome to Gizmo Galaxy - The home of out of this world deals</i>
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
    
        </div>
    </header>

    <!-- Image Slider on the home page -->
    <section class="container">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="RAM_wood_background.jpg" alt="GPU Image">
                <img id="slide-2" src="Mobo_concrete_background.jpg" alt="Micro_Processor">
                <img id="slide-3" src="Mouse_concrete_background.jpg" alt="PC">
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>
