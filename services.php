<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="services.css">

    <title>Dr.Casa</title>
    <script src="necessary.js" defer></script>
    <script src="review.js" defer></script>
    <script src="functions.js" defer></script>
</head>
<body>
<div class="mymenubar">
    <img src="logo.png">
    <h1>Dr.Casa</h1>
    <div class="searchbar">
        <input type="text"  id="name" name="name" placeholder="Service/Company Name">
        <input type="text" id="cityname" name="cityname" placeholder="City" required>
        <input type="text" id="stateabbrev" name="stateabbrev" minlength="2" maxlength="2" placeholder="State" required>
        <input type="text" id="zipcode" name="zipcode" minlength="5" maxlength="5" placeholder="Zip Code" required>
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

<div class="row srvI">
    <div class="col">
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4" class="highlighted"><label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3" class="highlighted"><label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2" class="highlighted"><label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1" class="highlighted"><label for="star1"></label>
        </div>

        <h2 id="w">Service Details</h2>
        <div class="companyname withBadge">
            <h3 id="w">Company Name</h3>
            <span class="badge text-bg-customNEW">New</span>
        </div>
        <div class="row companyname">
            <h4 id="w">Rate: Yet to be decided</h4>
        </div>
        <h3>AVAILABILITY</h3>
        <div class="togglebuttongroup">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck1">Day 1</label>

                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2">Day 2</label>

                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck3">Day 3</label>
            </div>
        </div>

        <div>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck4">Time 1</label>

                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck5">Time 2</label>

                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck6">Time 3</label>
            </div>
        </div>

        <br>
        <a href="cart.php">
            <button class="btn btn-primary">Add to Cart</button>
        </a>
    </div>
</div>
<div class="col randr">
    <h5>RATINGS & REVIEWS</h5>
    <button onclick="goToWriteAReview()">WRITE A REVIEW</button>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
                <a href="">Contact</a>
                <a href="">Terms and Policies</a>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
