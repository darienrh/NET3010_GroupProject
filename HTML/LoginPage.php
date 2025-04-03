<?php include 'header.php'; ?>

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
    <?php include 'footer.php'; ?>
</body>