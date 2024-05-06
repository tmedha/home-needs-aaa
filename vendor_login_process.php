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
    $database = "if0_36488871_drcasa";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user information
    $sql = "SELECT * FROM ServiceProvider WHERE email = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // echo $password;
        $row = $result->fetch_assoc();
        $passwordFromDB = $row["password"];
        // echo "Password from DB: " . $passwordFromDB;
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // echo "Hashed password: " . $hashed_password;
        if (password_verify($password, $passwordFromDB)) {
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION["username"] = $username;
            header("Location: landing_page.php");
            exit();
        } else {
            // Password is incorrect, display error message
            // echo "Invalid password. Please try again.";
            header("Location: invalid_userorpassword.php");
        }
    } else {
        // User not found, display error message
        // echo "User not found. Please sign up.";
        header("Location: no_account_found_vendor.php");
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

}
?>
