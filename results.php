<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="results.css">

    <title>Dr.Casa</title>
    <script src="searchqueries.js" defer></script>
    <script src="necessary.js" defer></script>
    <script src="functions.js" defer></script>
</head>
<body>
<div class="mymenubar">
    <a href="landing_page.php"><img src="logo.png"></a>
    <h1>Dr.Casa</h1>
    <div class="searchbar">
        <input type="text" id="servicecompanyname" minlength="5" maxlength="15" name="name" placeholder="Service/Company Name">
        <input type="text" id="cityname" minlength="4" maxlength="15" name="cityname" placeholder="City" required>
        <input type="text" id="stateabbrev" minlength="2" maxlength="2" name="stateabbrev" minlength="2" maxlength="2" placeholder="State" required>
        <input type="text" id="zipcode" minlength="5" maxlength="5" name="zipcode" minlength="5" maxlength="5" placeholder="Zip Code" required>
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

<div class="resultsrow">
    <div class="row">
        <h2>Results</h2>
        <div class="eitheror">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Service</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Company</label>
            </div>
        </div>
        <div class="filters">
            <!-- <h2>Categories</h2> -->
        </div>
    </div>
</div>

<div class="row">
    <div class="results">
        <?php
        // Establish connection to the if0_36488871_drcasa database
        $servername = "sql212.infinityfree.com";
        $username = "if0_36488871";
        $password = "zENhXnCqaF";
        $dbname = "if0_36488871_drcasa";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve search query parameters from searchquery table
        $sql_search_query = "SELECT * FROM searchquery";
        $result_search_query = $conn->query($sql_search_query);

        if ($result_search_query->num_rows > 0) {
            // Fetch search query parameters
            $row = $result_search_query->fetch_assoc();
            $serviceCompany = $row["servicecompanyname"];
            $city = $row["cityname"];
            $state = $row["stateabbrev"];
            $zipcode = $row["zipcode"];

            // Query ServiceProvider table to find matches
            $sql_search_results = "SELECT * FROM ServiceProvider";
            $result_search_results = $conn->query($sql_search_results);
            // echo $sql_search_results;
            // echo $result_search_results;

            if ($result_search_results->num_rows > 0) {
                // Display search results
                while ($row = $result_search_results->fetch_assoc()) {
                    echo "<div class='card' style='width: 18rem;'>";
                    echo "<img src='logo.png' class='card-img-top' alt='Company Logo'>";
                    echo "<div class='card-header'>";
                    if ($row['vendor_type'] == "Startup") {
                        echo "<span class='badge text-bg-customNEW'>{$row['vendor_type']}</span>";
                    } elseif ($row['vendor_type'] == "Exclusive") {
                        echo "<span class='badge text-bg-customEX'>{$row['vendor_type']}</span>";
                    } elseif ($row['vendor_type'] == "Mature") {
                        echo "<span class='badge text-bg-customM'>{$row['vendor_type']}</span>";
                    } elseif ($row['vendor_type'] == "Limited Availability") {
                        echo "<span class='badge text-bg-customLA'>{$row['vendor_type']}</span>";
                    }
                    echo "<span class='badge text-bg-customC'>Company</span>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$row['admin_first_name']} {$row['admin_last_name']}</h5>";
                    echo "<p class='card-text'>Serving from {$row['zipcode1']} to {$row['zipcode2']}</p>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<a href='company_detailst.php' class='btn btn-custom'>More Info</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No results found.</p>";
            }
        } else {
            echo "<p>No search query found.</p>";
        }

        // Close database connection
        $conn->close();
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
                <a href="">Terms and Policies</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
