<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection parameters
    $servername = "sql212.infinityfree.com";
    $db_username = "if0_36488871";
    $db_password = "zENhXnCqaF";
    $database = "if0_36488871_drcasa"; // Changed database name to "if0_36488871_drcasa"

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user information
    $sql = "SELECT * FROM Account WHERE email = ?"; // Changed table name to "Account"
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordFromDB = $row["password"];
        if (password_verify($password, $passwordFromDB)) {
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION["username"] = $username;
            header("Location: landing_page.php");
            exit();
        } else {
            // Password is incorrect, redirect to invalid password page
            header("Location: invalid_userorpassword.php");
        }
    } else {
        // User not found, redirect to no account found page
        header("Location: no_account_found.php");
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

}
?>
