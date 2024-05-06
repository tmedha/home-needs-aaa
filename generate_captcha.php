<?php
// Start the session (if not already started)
session_start();

// Generate a random 4-digit numeric CAPTCHA code
$captcha_code = rand(1000, 9999);

// Store the CAPTCHA code in a session variable
$_SESSION['captcha_code'] = $captcha_code;

// Display the CAPTCHA code on the page
echo $captcha_code;
?>
