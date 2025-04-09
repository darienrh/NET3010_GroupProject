<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>    

    <title>Your Cart</title>
</head>
<body>
    <header>
        <img class="logo" src="" alt="">
        <h1>
            <i>Here are your Cart Contents!</i>
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

    <main>
        <h1>Your Cart</h1>
        <p>Your cart is currently empty.</p>
    </main>
=======
    <div class="main-content">
        <main>
            <h1>Your Cart</h1>
            <p>Your cart is currently empty.</p>
        </main>
    </div>
    <?php
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart Page</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        <?php foreach ($cart as $item): ?>
            <li>
                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" width="100">
                <h2><?php echo $item['name']; ?></h2>
                <p>Price: $<?php echo $item['price']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

    
    <?php include 'footer.php'; ?>
</body>