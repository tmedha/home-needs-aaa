<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="company_details.css">

    <title>Dr.Casa</title>
    <script src="necessary.js" defer></script>
    <script src="searchqueries.js" defer></script>
    <script src="functions.js" defer></script>
</head>
<body>
<div class="mymenubar">
    <img src="logo.png">
    <h1>Dr.Casa</h1>
    <div class="searchbar">
        <input type="text" id="servicecompanyname" name="servicecompanyname" placeholder="Service/Company Name">
        <input type="text" id="cityname" name="cityname" placeholder="City" required>
        <input type="text" id="stateabbrev" name="stateabbrev" minlength="2" maxlength="2" placeholder="State" required>
        <input type="text" id="zipcode" name="zipcode" minlength="5" maxlength="5" placeholder="Zip Code" required><br>
        <div>
            <button id="submitButton" onclick="goToSearchResults()">Enter</button>
        </div>
    </div>
    <div class="buttonrow">
        <button onclick="goToVendorSignUp()">Service Provider</button>
        <button onclick="goToCustomerSignUp()">Customer</button>
        <button onclick="goGetHelp()">Help</button>
    </div>
</div>

<div>
    <div class="row">
        <span class="badge text-bg-customNEW">New</span>
        <h2 class="companyname">Company Name</h2>
    </div>

    <div class="row">
        <div class="col">
            <h3 class="servicesprovided">Services Provided</h3>
            <ul class="list-group list-group-flush">
                <?php
                // Fetch services from the database and display them
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

                // SQL query to fetch services
                $sql = "SELECT service_description, service_id FROM service LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="list-group-item">' . $row["service_description"] . '<div class="servicebuttons"><a href="services.php?id=' . $row["service_id"] . '" class="btn btn-custom">Book Now</a><a href="cart.php?id=' . $row["service_id"] . '" class="btn btn-custom2">Add to Cart</a></div></li>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </ul>
        </div>
        <div class="col">
            <h3>About Us</h3>
            <h4 class="aboutusinfo">Dr.Casa is your one-stop shop for a healthy home! We connect homeowners with reliable and pre-vetted vendors for all their household needs. Whether you're facing a leaky faucet or a looming landscape overhaul, browse our extensive service directory and find the perfect specialist for the job. Our user-friendly platform makes it easy to find qualified vendors, schedule appointments, and manage projects – all from the comfort of your couch.
            </h4>
        </div>

    </div>

    <div class="row">

    </div>
</div>

<footer>
    <div>
        <div class="row">
            <div class="col">
                <a href="https://facebook.com">Facebook</a> |
                <a href="https://twitter.com">Twitter</a> |
                <a href="https://instagram.com">Instagram</a> |
            </div>
            <div class="col">
                <a href="about_us.html">About Us</a>
                <a href="contact.html">Contact</a>
                <a href="terms.html">Terms and Policies</a>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
