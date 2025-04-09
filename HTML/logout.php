<?php
// rayyan mojaddedi
// Rafay Khan
session_start();        // Start the session
session_unset();        // Unset all session variables
session_destroy();      // Destroy the session

header("Location: LandingPage.php"); // Redirect to login or homepage
exit();
