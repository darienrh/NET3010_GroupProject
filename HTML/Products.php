<?php include 'header.php'; ?>

<?php
// Sample products data
// darien ramirez-hennessey
$products = [
    ['id' => 1, 'name' => 'Micro Processor', 'image' => '../images/Micro_Processor.jpg', 'price' => 199.99],
    ['id' => 2, 'name' => 'Motherboard', 'image' => '../images/Mobo_concrete_background.jpg', 'price' => 149.99],
    ['id' => 3, 'name' => 'Peripheral Set', 'image' => '../images/jay-zhang-dF0nne1hnzQ-unsplash.jpg', 'price' => 89.99],
    ['id' => 4, 'name' => '360mm AIO', 'image' => '../images/AIO_concrete_background.jpg', 'price' => 199.99],
    ['id' => 5, 'name' => 'Ryzen 5 3600', 'image' => '../images/christian-wiediger-c3ZWXOv1Ndc-unsplash.jpg', 'price' => 149.99],
    ['id' => 6, 'name' => 'Custom TKL Keyboard', 'image' => '../images/jay-zhang-dF0nne1hnzQ-unsplash.jpg', 'price' => 59.99],
    ['id' => 7, 'name' => 'TUF Gaming Z590 Motherboard', 'image' => '../images/Mobo_concrete_background.jpg', 'price' => 159.99],
    ['id' => 8, 'name' => 'Lamzu Wireless Mouse', 'image' => '../images/Mouse_concrete_background.jpg', 'price' => 49.99],
    ['id' => 9, 'name' => 'Custom Lavender Switches', 'image' => '../images/pexels-jethro-c-703137695-18337017.jpg', 'price' => 29.99],
    ['id' => 10, 'name' => 'Cooler Master Air CPU Cooler', 'image' => '../images/pexels-zeleboba-5327981.jpg', 'price' => 69.99],
    ['id' => 11, 'name' => 'Gigabyte Aero Z790 Motherboard', 'image' => '../images/pexels-zeleboba-18286300.jpg', 'price' => 169.99],
    ['id' => 12, 'name' => '32GB XPG DDR5 RAM', 'image' => '../images/RAM_wood_background.jpg', 'price' => 69.99],
    ['id' => 13, 'name' => '1TB Hard Drive', 'image' => '../images/william-warby-NIpQvMn5RTk-unsplash.jpg', 'price' => 59.99],
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

            // Instead of redirecting, just set a success message or a flag
            $_SESSION['cart_message'] = "Item added to cart!";
            break; // Exit the loop once the product is added
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
