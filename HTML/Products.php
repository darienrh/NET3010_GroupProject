<?php include 'header.php'; ?>

<?php
// Sample products data
$products = [
    ['id' => 1, 'name' => 'Micro Processor', 'image' => 'images/Micro_Processor.jpg', 'price' => 199.99],
    ['id' => 2, 'name' => 'Motherboard', 'image' => 'images/Mobo_concrete_background.jpg', 'price' => 149.99],
    ['id' => 3, 'name' => 'Peripheral Set', 'image' => 'images/jay-zhang-dF0nne1hnzQ-unsplash.jpg', 'price' => 89.99],
];

// Add to cart functionality
if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['add_to_cart'];
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            // Initialize cart if not already
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $found = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] === $product['id']) {
                    $item['quantity'] += 1;
                    $found = true;
                    break;
                }
            }
            unset($item);

            if (!$found) {
                $product['quantity'] = 1;
                $_SESSION['cart'][] = $product;
            }

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
    <title>Products Page</title>
</head>
<body>

<h1><i>Look at our Products!</i></h1>

<div class="main-content">
    <main class="products">
        <?php foreach ($products as $product): ?>
            <section>
                <h2 class="section-heading"><?php echo $product['name']; ?></h2>
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="200">
                <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                <a href="?add_to_cart=<?php echo $product['id']; ?>">Purchase</a>
            </section>
        <?php endforeach; ?>
    </main>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
