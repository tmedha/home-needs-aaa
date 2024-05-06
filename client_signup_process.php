<?php
$servername = "sql212.infinityfree.com";
$username = "if0_36488871";
$password = "zENhXnCqaF";

// Create connection
$conn = new mysqli($servername, $username, $password, "if0_36488871_drcasa");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dbname = "if0_36488871_drcasa";
$sql_check_db = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";

$result = $conn->query($sql_check_db);
if ($result->num_rows == 0) {
    // Database does not exist, create it
    $sql_create_db = "CREATE DATABASE $dbname";
    
    if ($conn->query($sql_create_db) === TRUE) {
        // echo "Database $dbname created successfully";
        // echo "<br>";
    } else {
        echo "Error creating database: " . $conn->error;
    }
} else {
    echo "Database $dbname already exists";
    echo "<br>";
}
$conn = new mysqli($servername, $username, $password, $dbname);
$table_name = "Account";
$sql_check_table = "SHOW TABLES LIKE '$table_name'";

$result = $conn->query($sql_check_table);

if ($result->num_rows == 0) {
    // Table does not exist, create it
    $sql_create_table = "CREATE TABLE $table_name (
        account_id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(20), 
        last_name VARCHAR(20), 
        email VARCHAR(20), 
        country_code VARCHAR(4), 
        phone VARCHAR(20), 
        city VARCHAR(50), 
        state VARCHAR(50), 
        zipcode VARCHAR(10), 
        street_address VARCHAR(100), 
        street_address2 VARCHAR(100), 
        street_address3 VARCHAR(100), 
        payment_method VARCHAR(20), 
        password VARCHAR(300))";

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
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $country_code = $_POST["country_code"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    $street_address = $_POST["street_address"];
    $street_address2 = $_POST["street_address2"];
    $street_address3 = $_POST["street_address3"];
    $payment_method = $_POST["payment_method"];
    $password = $_POST["password"];
    
    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $sql_check_email = "SELECT * FROM $table_name WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);
    
    if ($result_check_email->num_rows > 0) {
        // echo "Account already exists";
        header("Location: client_login_existing.html");
        exit;
    }

    // Write sql query to insert data into the database
    $sql = "INSERT INTO $table_name (first_name, last_name, email, country_code, phone, city, state, zipcode, street_address, street_address2, street_address3, payment_method, password)
            VALUES ('$first_name', '$last_name', '$email', '$country_code', '$phone', '$city', '$state', '$zipcode', '$street_address', '$street_address2', '$street_address3', '$payment_method', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
    header("Location: client_login.html");
    exit;
}
?>
