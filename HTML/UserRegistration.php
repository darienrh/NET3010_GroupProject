<?php
ob_start(); // Optional: helps prevent header issues

// Run the database creation script silently
include_once 'database_create.php'; // Will only run once per page load

$pageTitle = "Register page ";
include 'header.php';

// Initialize variables
$message = '';
$message_class = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']); // Collected but not used
    $password = $_POST['password'];
    
    // Input validation
    if (empty($username)) {
        $errors[] = "Username is required";
    } elseif (strlen($username) < 4) {
        $errors[] = "Username must be at least 4 characters";
    }
    
    if (empty($password) || strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }
    
    if (empty($errors)) {
        try {
            // Connect using DB constants
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if username already exists
            $stmt = $conn->prepare("SELECT users_id FROM users WHERE user_name = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $errors[] = "Username already exists";
            } else {
                // Hash the password for security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user
                $stmt = $conn->prepare("INSERT INTO users 
                    (user_name, user_password, user_permissions, user_role, created_at) 
                    VALUES (:username, :password, 2, 'customer', NOW())");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();

                $message = "Registration successful! You can now log in.";
                $message_class = 'message';
            }
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }

    if (!empty($errors)) {
        $message = implode("<br>", $errors);
        $message_class = 'error';
    }
}
?>

<body>
    <?php if (!empty($message)): ?>
        <p class="<?php echo $message_class; ?>">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>

    <form action="UserRegistration.php" method="POST">
        <input type="text" name="username" placeholder="Username" required 
               value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
        <input type="email" name="email" placeholder="Email (optional)" 
               value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
    </form> 
</body>
</html>
