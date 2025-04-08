//Darien Ramirez-Hennessey
// Date: 04/08/2025
<?php
require_once 'database_create.php'; // for DB credentials
include 'header.php'; 
$message = '';
$message_class = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        // Connect to DB
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if user exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            $message = "This username isn't registered. <a href='UserRegistration.php'>Sign up now</a>.";
            $message_class = 'error';
        } else {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password
            if ($password === $user['user_password']) {
                $_SESSION['user'] = $user['user_name']; // Save login
                $message = "Logged in!";
                $message_class = 'message';

                // Redirect after a short delay
                header("refresh:1; url=LandingPage.php");
            } else {
                $message = "Incorrect password.";
                $message_class = 'error';
            }
        }
    } catch (PDOException $e) {
        $message = "Database error: " . $e->getMessage();
        $message_class = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Gizmo Galaxy</title>
    <link rel="stylesheet" href="StyleSheet.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if (!empty($message)): ?>
            <p class="<?php echo $message_class; ?>">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="LoginPage.php">
            <input type="text" name="username" placeholder="Username" required 
                   value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>
