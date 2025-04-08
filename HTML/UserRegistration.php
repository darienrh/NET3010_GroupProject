<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'labwebsite');

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
            // Create database connection
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Check if username already exists
            $stmt = $conn->prepare("SELECT userID FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $errors[] = "Username already exists";
            } else {
                // Hash password
                // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user with default permissions (2) and role (customer)
                $stmt = $conn->prepare("INSERT INTO users 
                                      (username, password, permissions, role, created_at) 
                                      VALUES (:username, :password, 2, 'customer', NOW())");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                
                $message = "Registration successful! You can now login.";
                $message_class = 'message';
            }
        } catch(PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
    
    // If there are errors, show them
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

    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required 
               value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
        <input type="email" name="email" placeholder="Email (optional)" 
               value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
    </form> 
</body>
</html>