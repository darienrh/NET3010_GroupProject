<?php $pageTitle = "admin - PixelForge Studios"; 
//darien ramirez-hennessey

?>
<?php include 'header.php'; ?>
<link rel="stylesheet" href="StylesSheet.css">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $newRole = $_POST['role'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'groupprojectwebsite');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update user role
    $stmt = $conn->prepare("UPDATE users SET user_role = ? WHERE user_name = ?");
    $stmt->bind_param("ss", $newRole, $username);

    if ($stmt->execute()) {
        echo "<p>User role updated successfully!</p>";
    } else {
        echo "<p>Error updating user role: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="role">New Role:</label>
    <input type="text" id="role" name="role" required>
    <button type="submit">Update Role</button>
</form>
</head>
<body>
    <div class="container">
        <h1>Hi there! 👋</h1>
        <p>Welcome to my awesome page with a cool GIF!</p>
        
        <div class="gif-container">
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcDZ6d3V6Z2Z5d3F5Z2RlY3R4dW9rZ3V5dGZ1bHZqZzV1bmN6biZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/xT5LMHxhOfscxPfIfm/giphy.gif" alt="Funny GIF" width="500">
        </div>
        
        <div class="footer">
            <p>Hope this brightens your day!</p>
        </div>
    </div>
</body>
</html>