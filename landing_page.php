<?php
session_start(); 
// echo $_SESSION['username'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="landing_page.css">

    <title>Dr.Casa</title>
    <script src="searchqueries.js" defer></script>
    <script src="necessary.js" defer></script>
    <style>
        /* Custom CSS for positioning the button */
        .customize-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999; /* Ensure the button is on top of other elements */
        }
    </style>
</head>
<body>
    <div class="mymenubar">
        <a href="landing_page.php">
            <img src="logo.png" alt="Dr.Casa Logo">
        </a>
        <h1>Dr.Casa</h1>
        <div class="buttonrow">
            <button onclick="goToVendorSignUp()" >Sign Up as a Service Provider</button>
            <button onclick="goToCustomerSignUp()">Customer Sign Up / Log In</button>
            <button onclick="goGetHelp()">Help</button>
            <p><a href="logout.php">Logout</a></p>
            <div>Hi, <?php if(isset($_SESSION['username']))  echo $_SESSION['username']; else echo 'user'; ?></div>
        </div>
    </div>
    
    <div class="mainpart">
        <form action="insert_search_query.php" method="POST">
            <input type="text" id="servicecompanyname" name="servicecompanyname" placeholder="Service/Company Name">
            <input type="text" id="cityname" name="cityname" placeholder="City" required>
            <input type="text" id="stateabbrev" name="stateabbrev" placeholder="State" required>
            <input type="text" id="zipcode" name="zipcode" placeholder="Zip Code" required><br>
            <button type="submit" id="submitButton">Enter</button> 
        </form>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="functions.js" defer></script> -->
    <footer>
        <div>
            <div class="row">
                <div class="col">
                    <a href="https://facebook.com">Facebook</a> |
                    <a href="https://twitter.com">Twitter</a> |
                    <a href="https://instagram.com">Instagram</a>
                </div>
                <div class="col">
                    <a href="about_us.html">About Us</a>
                    <a href="contact.html">Contact</a> |
                    <a href="terms.html">Terms and Policies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Customize Account Button -->
    <div class="customize-button">
        <a href="customer_acct_settings.html" class="btn btn-primary">Customize Account</a>
    </div>
</body>
</html>
