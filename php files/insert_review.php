<?php 

//connect the database
$server = "localhost";
$myusername = "root";
$mypassword = "";
$databasename = "drcasa";

//make the connection
$conn = new mysqli($server, $myusername, $mypassword, "mysql");


//check the connection
if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

$sql_check_db = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databasename'";

$result = $conn->query($sql_check_db);
if ($result->num_rows == 0) {
    // Database does not exist, create it
    $sql_create_db = "CREATE DATABASE $databasename";
    
    if ($conn->query($sql_create_db) === TRUE) {
        echo "Database $databasename created successfully";
        echo "<br>";
    } else {
        echo "Error creating database: " . $conn->error;
    }
} else {
    echo "Database $databasename already exists";
    echo "<br>";
}

//make the connection
$conn = new mysqli($server, $myusername, $mypassword, "mysql");
$table_name = "NewReviewInfo";
$sql_check_table = "SHOW TABLES LIKE '$table_name'";

$result = $conn->query($sql_check_table);
if ($result->num_rows == 0) {
    // Table does not exist, create it
    $sql_create_table = "CREATE TABLE $table_name (
        rDescription varchar(250), Star int(1))";

    if ($conn->query($sql_create_table) === TRUE) {
        echo "Table $table_name created successfully";
        echo "<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
} else {
    echo "Table $table_name already exists";
    echo "<br>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $starRating = $_POST['rating'];
    $revdescription = $_POST['name'];

    // Write sql query to insert data into the database
    $sql = "INSERT INTO `NewReviewInfo`(`rDescription`, `Star`) 
            VALUES ('$revdescription','$starRating')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
    header("Location: services.html");
 
exit;
}