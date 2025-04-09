
<?php
ob_start(); // Optional: helps prevent header issues

// Run the database creation script silently
include_once 'database_create.php'; // Will only run once per page load

// Now continue with your registration logic below
$pageTitle = "Register Page";

$message = '';
$message_class = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

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
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if email is already taken
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $stmt = $conn->prepare("SELECT users_id FROM users WHERE user_name = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $errors[] = "Username already exists";
            } else {
                //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO users 
                    (user_name, user_password, user_permissions, user_role, created_at) 
                    VALUES (:username, :password, 2, 'customer', NOW())");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();

                $message = "Registration successful! You can now log in.";
                $message_class = 'message';
            }
            header("Location: LoginPage.php");
            exit();
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Gizmo Galaxy</title>
    <link rel="stylesheet" href="StyleSheet.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-content">
        <main class="register-page">
            <section class="container">
                <header>User Registration</header>

                <?php if (!empty($message)): ?>
                    <p class="<?php echo $message_class; ?>">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>

                <form action="UserRegistration.php" method="POST" class="form">
                    <div class="row">
                        <div class="Input">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Enter Username" required 
                                value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                        </div>
                        <div class="Input">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter Email (optional)" 
                                value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                        </div>
                    </div>

                    <div class="Input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="button-wrapper">
                        <button type="submit" class="button" id="submitButton">Register Account</button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        document.getElementById('submitButton')
                            .addEventListener('click', () => {
                                console.log('Account Registered!');
                            });
                    });
                </script>
            </section>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
