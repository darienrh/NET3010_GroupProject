<!DOCTYPE html>
<html lang="en">


<head>
    <title>Login</title>
   <link rel="stylesheet" href="StyleSheet.css">

</head>

<body>
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