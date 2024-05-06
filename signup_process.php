<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $captcha = $_POST['captcha'];

    // Check if any field is empty
    if (empty($username) || empty($password) || empty($email) || empty($captcha)) {
        // Redirect back to the signup page with an error message
        header("Location: signup.php?error=emptyfields");
        exit();
    } else {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Redirect back to the signup page with an error message
            header("Location: signup.php?error=invalidemail");
            exit();
        } else {
            // Validate CAPTCHA
            if ($_SESSION['captcha'] != $captcha) {
                // Redirect back to the signup page with an error message
                header("Location: signup.php?error=invalidcaptcha");
                exit();
            } else {
                // Perform additional validation or save user data to the database
                // For demonstration purposes, we'll just print the submitted data
                echo "Username: " . $username . "<br>";
                echo "Password: " . $password . "<br>";
                echo "Email: " . $email . "<br>";
                echo "CAPTCHA: " . $captcha . "<br>";

                // Redirect the user to another page after successful signup
                header("Location: welcome.php");
                exit();
            }
        }
    }
} else {
    // Redirect back to the signup page if accessed without submitting the form
    header("Location: signup.php");
    exit();
}
?>
