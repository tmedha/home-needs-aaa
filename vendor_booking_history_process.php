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

// Fetching data from the database
$sql = "SELECT clients.first_name, clients.last_name, clients.email, clients.phone, 
               booking_details.booking_id, booking_details.date_and_time, 
               booking_details.provider, booking_details.location, booking_details.total_cost
        FROM clients
        INNER JOIN bookings ON clients.client_id = bookings.client_id
        INNER JOIN booking_details ON bookings.booking_id = booking_details.booking_id
        WHERE booking_details.vendor = ?";

// Prepare and bind SQL statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $vendor); // Assuming $vendor contains the name of the vendor
$vendor = "Vendor Name"; // Replace with the actual vendor name

// Execute the query
$stmt->execute();

// Bind result variables
$stmt->bind_result($first_name, $last_name, $email, $phone, $booking_id, $date_and_time, $provider, $location, $total_cost);

// Fetch data into an array
$booking_history = array();
while ($stmt->fetch()) {
    $booking_history[] = array(
        "first_name" => $first_name,
        "last_name" => $last_name,
        "email" => $email,
        "phone" => $phone,
        "booking_id" => $booking_id,
        "date_and_time" => $date_and_time,
        "provider" => $provider,
        "location" => $location,
        "total_cost" => $total_cost
    );
}

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
    <title>Vendor Booking History</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor_booking_history_styles.css">
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
                        <h4>Vendor Booking History</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Search by Date:</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <!-- Table to display booking history -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Booking ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Display fetched data -->
                                <?php foreach ($booking_history as $booking): ?>
                                    <tr>
                                        <td><?php echo $booking['booking_id']; ?></td>
                                        <td><?php echo $booking['date_and_time']; ?></td>
                                        <td><?php echo $booking['provider']; ?></td>
                                        <td><?php echo $booking['total_cost']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- End of data display -->
                            </tbody>
                        </table>
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

    <script src="vendor_booking_history_script.js"></script>
</body>
</html>
