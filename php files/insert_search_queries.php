
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $serviceCompanyName = $_POST["servicecompanyname"];
    $cityName = $_POST["cityname"];
    $stateAbbrev = $_POST["stateabbrev"];
    $zipCode = $_POST["zipcode"];

    // SQLite connection
    $db = new SQLite3('DrCasa.db');

    // Insert data into table
    $stmt = $db->prepare('INSERT INTO SearchQueries (servicecompanyname, cityname, stateabbrev, zipcode) VALUES (:servicecompanyname, :cityname, :stateabbrev, :zipcode)');
    $stmt->bindParam(':servicecompanyname', $serviceCompanyName);
    $stmt->bindParam(':cityname', $cityName);
    $stmt->bindParam(':stateabbrev', $stateAbbrev);
    $stmt->bindParam(':zipcode', $zipCode);
    $stmt->execute();

    // Close connection
    $db->close();
}
?>