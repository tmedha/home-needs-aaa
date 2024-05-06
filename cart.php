<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
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
        <h2>Bookings</h2>
        <!-- <div class="eitheror">
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
        // Dummy data for demonstration
        $demo_data = array(
            array('name' => 'Service Provider 1', 'zipcode1' => '12345', 'zipcode2' => '67890'),
            array('name' => 'Service Provider 2', 'zipcode1' => '23456', 'zipcode2' => '78901'),
            array('name' => 'Service Provider 3', 'zipcode1' => '34567', 'zipcode2' => '89012')
        );

        // Displaying demo data
        foreach ($demo_data as $data) {
            echo "<div class='card' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$data['name']}</h5>";
            echo "<p class='card-text'>Serving from {$data['zipcode1']} to {$data['zipcode2']}</p>";
            echo "</div>";
            echo "<div class='card-body'>";
            echo "<a href='#' class='btn btn-custom'>More Info</a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<div class="row mt-3">
    <div class="col text-right">
        <button class="btn btn-primary" onclick="confirmCart()">Confirm</button>
    </div>
</div>

<script>
    function confirmCart() {
        // Redirect to confirmation_page.html
        window.location.href = 'confirmation_page.html';
    }
</script>

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
