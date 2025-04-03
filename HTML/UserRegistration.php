<?php include 'header.php'; ?>

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
                        addEventListener('click', function () { //cant use function(). teacher said not to use it
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