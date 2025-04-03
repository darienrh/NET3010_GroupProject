<!DOCTYPE html>
<html lang="en">

<!-- Add meta information -->
<head>
    <link rel="stylesheet" href="StyleSheet.css">

    <title>Our Website!</title>
</head>
<body>
    <header>
        <img class="logo" src="" alt="">
        <h1>
            <i>Welcome to your Account!</i>
        </h1>
        <nav>
            <li><a href="LandingPage.html">Home</a></li>
            <li><a href="Products.html">Products</a></li>
            <li><a href="Cart.html">Cart</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="UserRegistration.html">Sign up</a></li>
            <li><a href="LoginPage.html">Login</a></li>

        </nav>
    </header>

    <script>
        // Form submission event listener
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevents page reload on submit
            let valid = true;

            // Name validation
            let name = document.getElementById("name").value.trim();
            if (!name) {
                document.getElementById("nameError").textContent = "Name is required.";
                valid = false;
            } else {
                document.getElementById("nameError").textContent = "";
            }

            // Email validation using regex pattern
            let email = document.getElementById("email").value.trim();
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email validation pattern
            if (!email.match(emailPattern)) {
                document.getElementById("emailError").textContent = "Enter a valid email.";
                valid = false;
            } else {
                document.getElementById("emailError").textContent = "";
            }

            // Address validation (if required)
            let address = document.getElementById("address").value.trim();
            if (address && address.length < 5) {
                document.getElementById("addressError").textContent = "Address is too short.";
                valid = false;
            } else {
                document.getElementById("addressError").textContent = "";
            }

            // Referral validation
            let selectedReferral = document.querySelector('input[name="referral"]:checked');
            let otherText = document.getElementById("otherText");
            if (!selectedReferral) {
                document.getElementById("referralError").textContent = "Please select a referral source.";
                valid = false;
            } else {
                document.getElementById("referralError").textContent = "";
            }

            // Additional validation if 'Other' is selected
            if (selectedReferral && selectedReferral.value === "other") {
                if (!otherText.value.trim()) {
                    document.getElementById("referralError").textContent = "Please specify your referral source.";
                    valid = false;
                }
            }

            // If all validations pass, show success message
            if (valid) {
                alert("Registration successful!");
            }
        });

        // Show or hide the 'Other' text input based on user selection
        document.querySelectorAll("input[name='referral']").forEach(radio => {
            radio.addEventListener("change", function() {
                let otherText = document.getElementById("otherText");
                if (document.getElementById("otherReferral").checked) {
                    otherText.classList.remove("hidden"); // Show text input
                } else {
                    otherText.classList.add("hidden"); // Hide text input
                    otherText.value = ""; // Clear input when hidden
                }
            });
        });
    </script>

    <footer>
        <p>&copy; 2025 Gizmo Galaxy. All rights reserved.</p>
    </footer>
</body>