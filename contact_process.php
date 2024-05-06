<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $category = $_POST["category"];
    $description = $_POST["description"];

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

    // Prepare SQL statement to insert query information into the database
    $sql = "INSERT INTO queries (email, problem_category, problem_description) VALUES ('$email', '$category', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Query inserted successfully, redirect to thank you page or display success message
        header("Location: thank_you.php");
        // header("Location: cart.php");
        exit();
    } else {
        // Error occurred while inserting query, display error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
