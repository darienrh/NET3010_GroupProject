<?php
require_once 'database_create.php'; // for DB credentials
include 'header.php'; 
$message = '';
$message_class = '';
//darien ramirez-hennessey
// Alexander 
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
                $_SESSION['user_role'] = $user['user_role']; // Save user role

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

<body>
    <div class="main-content">
        <main class="login-page">
            <section class="container">
                <header>Login</header>

                <?php if (!empty($message)): ?>
                    <p class="<?php echo $message_class; ?>">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>

                <form method="POST" action="LoginPage.php" class="form">
                    <div class="row">
                        <div class="Input">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter Username" required 
                                   value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                        </div>
                    </div>

                    <div class="Input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required>
                    </div>

                    <div class="button-wrapper">
                        <button type="submit" class="button" id="submitButton">Log In</button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        document.getElementById('submitButton')
                            .addEventListener('click', () => {
                                console.log('User Logged In!');
                            });
                    });
                </script>
            </section>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>