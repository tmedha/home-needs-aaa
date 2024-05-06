<?php
// Connect to the database
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

// SQL query to fetch booking details
$sql = "SELECT service_name, booking_number, date_and_time, provider, location FROM booking_details WHERE booking_id = ?";

// Prepare and bind SQL statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $booking_id); // Assuming $booking_id contains the ID of the booking you want to retrieve
$booking_id = 1; // Replace with the actual booking ID

// Execute the query
$stmt->execute();

// Bind result variables
$stmt->bind_result($service_name, $booking_number, $date_and_time, $provider, $location);

// Fetch data
$stmt->fetch();

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking Confirmation</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="confirmation_page_styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="demo_home.html"><img src="logo.png" alt="Logo" style="max-height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto"> <!-- Align to the right -->
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="client_signup.html">Sign Up as a Client</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Service Booking Confirmation</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Thank You for Booking!</h5>
                        <p class="card-text">You have successfully booked the following service:</p>
                        <ul class="list-group">
                            <li class="list-group-item">Service: <?php echo $service_name; ?></li>
                            <li class="list-group-item">Booking Number: #<?php echo $booking_number; ?></li>
                            <li class="list-group-item">Date & Time: <?php echo $date_and_time; ?></li>
                            <li class="list-group-item">Provider: <?php echo $provider; ?></li>
                            <li class="list-group-item">Location: <?php echo $location; ?></li>
                            <!-- Add more booking details here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="https://facebook.com">Facebook</a> |
                    <a href="https://twitter.com">Twitter</a> |
                    <a href="https://instagram.com">Instagram</a>
                </div>
                <div class="col">
                    <a href="contact.html">Contact</a> |
                    <a href="terms.html">Terms and Policies</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="service_booking_confirmation_script.js"></script>
</body>
</html>
