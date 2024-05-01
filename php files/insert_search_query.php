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
$conn = new mysqli($server, $myusername, $mypassword, $databasename);
$table_name = "searchquery";
$sql_check_table = "SHOW TABLES LIKE '$table_name'";

$result = $conn->query($sql_check_table);
if ($result->num_rows == 0) {
    // Table does not exist, create it
    $sql_create_table = "CREATE TABLE $table_name (
        ServiceorCompany varchar(15), CityName varchar(15), StateAbbreviation varchar(2), Zipcode int(4))";

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
    $serviceorcompany = $_POST['servicecompanyname'];
    $cityname = $_POST['cityname'];
    $stateabbreviation = $_POST['stateabbrev'];
    $zipcode = $_POST['zipcode'];

    // Write sql query to insert data into the database
    $sql = "INSERT INTO `searchquery`(`ServiceorCompany`, `CityName`, `StateAbbreviation`, `Zipcode`) 
            VALUES ('$serviceorcompany','$cityname','$stateabbreviation',$zipcode)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
    header("Location: results.html");
 
exit;
}