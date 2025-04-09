<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>    
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