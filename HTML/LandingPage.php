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
    <div class="navbar">
        <div class="logo">
            <img src="Logo.png" width="200px">
        </div>
        <nav>
            <ul>
                <li><a href="LandingPage.html">Home</a></li>
                <li><a href="Products.html">Products</a></li>
                <li><a href="Cart.html">Cart</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="UserRegistration.html">Sign up</a></li>
                <li><a href="LoginPage.html">Login</a></li>
            </ul>
        </nav>

    </div>

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



    <header>
        <h1>Welcome to Gizmo Galaxy - The home of out of this world deals</h1>
    </header>


    <?php include 'footer.php'; ?>

</body>
</html>
