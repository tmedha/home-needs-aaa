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

$conn = new mysqli($servername, $username, $password, $dbname);
$table_name = "client_information";
$sql_check_table = "SHOW TABLES LIKE '$table_name'";

$result = $conn->query($sql_check_table);

if ($result->num_rows == 0) {
    // Table does not exist, create it
    $sql_create_table = "CREATE TABLE $table_name (
        first_name varchar(20), last_name varchar(20), email varchar(20), country_code varchar(4), phone varchar(20), password varchar(300))";

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


$sql = "SELECT * FROM ";


$result = $conn->query($sql);
if($result!== FALSE){
    echo "New record created succesfully";
} else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}

//close the connection
$conn->close();

?>