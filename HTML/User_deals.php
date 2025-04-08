<?php include 'header.php'; ?>

<h1>Welcome to your account, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
<p>This page is only visible to logged-in users.</p>

<?php include 'footer.php'; ?>
