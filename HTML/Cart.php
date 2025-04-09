<?php
session_start();
// Darien Ramirez-Hennessey, Alex Barnard

// Handle cart clearing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header('Location: Cart.php');
    exit;
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - Gizmo Galaxy</title>
    <link rel="stylesheet" href="StyleSheet.css">
</head>
<body>

<div class="main-content">
    <main>
        <h1>Your Cart</h1>

        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th> <!-- Add Image column -->
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item):
                        $total += $item['price'];
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="100"></td> <!-- Display product image -->
                        <td>$<?= number_format($item['price'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>$<?= number_format($total, 2) ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <form method="POST">
                <input type="hidden" name="clear_cart" value="1">
                <button type="submit" class="button">Clear Cart</button>
            </form>
        <?php else: ?>
            <p>Your cart is currently empty.</p>
        <?php endif; ?>
    </main>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
