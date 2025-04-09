<?php
// Darien Ramirez-Hennessey
// Date: 04/08/2025
require_once 'database_create.php'; // for DB credentials
$message = '';
$message_class = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            $message = "This username isn't registered. <a href='UserRegistration.php'>Sign up now</a>.";
            $message_class = 'error';
        } else {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password === $user['user_password']) {
                $_SESSION['user'] = $user['user_name'];
                $message = "Logged in!";
                $message_class = 'message';
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
    <main class=login-page>
        <section class="container">
        <header>Account Login</header>
        <form action="#" class="form">
            <div class="row">
                <div class="Input">
                    <label>Username</label>
                    <input type="text" placeholder="Enter Username">
                </div>
                <div class="Input">
                    <label>Password</label>
                    <input type="text" placeholder="Enter Password">
                </div>
            </div>
            <div class="button-wrapper">
                <button type="button" id="submitButton" class="button">
                    Login
                </button>
            </div>
        </form>
        <script>
            document.addEventListener(
                'DOMContentLoaded', () => {
                    document.getElementById('submitButton').
                        addEventListener('click', function () {
                            alert('Logged in!');
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
        <main class="login-page">
            <section class="container">
                <header>Account Login</header>

                <?php if (!empty($message)): ?>
                    <p class="<?php echo $message_class; ?>">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>

                <form method="POST" action="LoginPage.php" class="form">
                    <div class="row">
                        <div class="Input">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Enter Username" required 
                                   value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                        </div>
                        <div class="Input">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button type="submit" class="button" id="submitButton">Login</button>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('submitButton');
            if (btn) {
                btn.addEventListener('click', () => {
                    // Optional alert (for consistency with second page)
                    console.log('Login submitted');
                });
            }
        });
    </script>
</body>
</html>
>>>>>>> 14f8abddf2f1934e85bb73cdb4c70a8a9b5bd9df
