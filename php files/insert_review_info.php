<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs (not shown here for brevity)

    // Retrieve form data
    $rating = $_POST['rating'];
    $description = $_POST['description'];

    // Connect to SQLite database
    $db = new SQLite3('DrCasa.db');

    // Prepare SQL statement
    $stmt = $db->prepare("INSERT INTO ReviewInfo (rating, description) VALUES (:rating, :description)");

    // Bind parameters
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':description', $description);

    // Execute the statement
    $result = $stmt->execute();

    // Check if insertion was successful
    if ($result) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: Failed to submit review.";
    }

    // Close database connection
    $db->close();
} else {
    // If the form was not submitted via POST method, redirect back to the form page
    header("Location: review_form.html");
    exit;
}
?>