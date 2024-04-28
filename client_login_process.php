<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection parameters
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "homeneeds";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user information
    $sql = "SELECT * FROM client_information WHERE email = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo $password;
        $row = $result->fetch_assoc();
        $passwordFromDB = $row["password"];
        echo "Password from DB: " . $passwordFromDB;
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // echo "Hashed password: " . $hashed_password;
        if (password_verify($password, $passwordFromDB)) {
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION["username"] = $username;
            header("Location: landing_page.html");
            exit();
        } else {
            // Password is incorrect, display error message
            echo "Invalid password. Please try again.";
        }
    } else {
        // User not found, display error message
        echo "User not found. Please sign up.";
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}
?>
