
<?php
// Darien Ramirez-Hennessey
// Date: 04/08/2025
ob_start(); //helps prevent header issues

// Run the database creation script silently
include_once 'database_create.php'; // Will only run once per page load

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

            $stmt = $conn->prepare("SELECT users_id FROM users WHERE user_name = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $errors[] = "Username already exists";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Gizmo Galaxy</title>
    <link rel="stylesheet" href="StyleSheet.css">
</head>
<body>
<<<<<<< HEAD
<div class="navbar">
            <div class="logo">
                <img src="Logo.png" width="200px">
            </div>
            <nav>
                <ul>
                    <li><a href="LandingPage.php">Home</a></li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="UserRegistration.php">Sign up</a></li>
                    <li><a href="LoginPage.php">Login</a></li>
                </ul>
            </nav>
    
        </div>
    <main class=register-page>
        <section class="container">
        <header>User Registration</header>
        <form action="#" class="form">
            <div class="row">
                <div class="Input">
                    <label>First Name</label>
                    <input type="text" placeholder="Enter First Name">
                </div>
                <div class="Input">
                    <label>Last Name</label>
                    <input type="text" placeholder="Enter Last Name">
                </div>
            </div>
            <div class="Input">
                <label>Email</label>
                <input type="text" placeholder="Enter Email">
            </div>
            <div class="Input">
                <label>Username</label>
                <input type="text" placeholder="Enter Username">
            </div>
            <div class="Input">
                <label>Password</label>
                <input type="text" placeholder="Enter Password">
            </div>
            <div class="button-wrapper">
                <button type="button" id="submitButton" class="button">
                    Register Account
                </button>
            </div>
        </form>
        <script>
            document.addEventListener(
                'DOMContentLoaded', () => {
                    document.getElementById('submitButton').
                        addEventListener('click', function () {
                            alert('Account Registered!');
                        });
                }
            )
        </script>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Gizmo Galaxy. All rights reserved.</p>
    </footer>
</body>
=======
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
>>>>>>> 14f8abddf2f1934e85bb73cdb4c70a8a9b5bd9df
