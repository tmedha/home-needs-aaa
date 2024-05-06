<?php
// Database connection parameters
$servername = "sql212.infinityfree.com";
$username = "if0_36488871";
$password = "zENhXnCqaF";
$dbname = "if0_36488871_drcasa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $rating = $_POST["rating"];
    $description = $_POST["description"];

    // Insert review data into the database
    $sql = "INSERT INTO reviews (starnum, review_description) VALUES ('$rating', '$description')";
    if ($conn->query($sql) === TRUE) {
        // echo "Review submitted successfully";
        header("Location: thank_you_review.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
