<?php include 'header.php'; ?>

<?php
// Sample deals data
//darien ramirez-hennessey
$deals = [
    ['id' => 1, 'name' => '10% OFF', 'image' => '../images/bunny.png', 'price' => 10],
    ['id' => 2, 'name' => '100% OFF', 'image' => '../images/Micro_processor.jpg', 'price' => 20],
    ['id' => 3, 'name' => '20% OFF', 'image' => '../images/PSU_yellow_background.jpg', 'price' => 30],
];

// Add to cart functionality
if (isset($_GET['add_to_cart'])) {
    $deal_id = $_GET['add_to_cart'];
    foreach ($deals as $deal) {
        if ($deal['id'] == $deal_id) {
            $_SESSION['cart'][] = $deal;
            header('Location: cart.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deals Page</title>
</head>
<body>
    <h1>Deals</h1>
    <ul>
        <?php foreach ($deals as $deal): ?>
            <li>
                <img src="<?php echo $deal['image']; ?>" alt="<?php echo $deal['name']; ?>" width="100">
                <h2><?php echo $deal['name']; ?></h2>
                <p>Price: $<?php echo $deal['price']; ?></p>
                <a href="?add_to_cart=<?php echo $deal['id']; ?>">Add to Cart</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>


<?php include 'footer.php'; ?>
