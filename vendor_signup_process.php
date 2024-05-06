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
        echo "Database $dbname created successfully";
        echo "<br>";
    } else {
        echo "Error creating database: " . $conn->error;
    }
} else {
    echo "Database $dbname already exists";
    echo "<br>";
}
$conn = new mysqli($servername, $username, $password, $dbname);
$table_name = "ServiceProvider";
$sql_check_table = "SHOW TABLES LIKE '$table_name'";

$result = $conn->query($sql_check_table);

if ($result->num_rows == 0) {
    // Table does not exist, create it
    $sql_create_table = "CREATE TABLE $table_name (
        serviceprovider_id INT AUTO_INCREMENT PRIMARY KEY,
        admin_first_name VARCHAR(20),
        admin_last_name VARCHAR(20),
        email VARCHAR(50),
        country_code VARCHAR(4),
        phone VARCHAR(20),
        vendor_type VARCHAR(20),
        vendor_details VARCHAR(50),
        password VARCHAR(300),
        zipcode1 VARCHAR(10),
        zipcode2 VARCHAR(10),
        cityname VARCHAR(20),
        stateabbrev VARCHAR(30)
    )";

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
    $admin_first_name = $_POST["admin_first_name"];
    $admin_last_name = $_POST["admin_last_name"];
    $email = $_POST["email"];
    $country_code = $_POST["country_code"];
    $phone = $_POST["phone"];
    $vendor_type = $_POST["vendor_type"];
    $vendor_details = $_POST["vendor_details"];
    $services = $_POST["preferred_services_text"];
    $password = $_POST["password"];
    $zipcode1 = $_POST["zipcode1"];
    $zipcode2 = $_POST["zipcode2"];
    $cityname = $_POST["cityname"];
    $stateabbrev = $_POST["stateabbrev"];
  
    
    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $sql_check_email = "SELECT * FROM $table_name WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);
    
    if ($result_check_email->num_rows > 0) {
        // Redirect to vendor_login_existing.html if email already exists
        header("Location: vendor_login_existing.html");
        exit;
    } else {
        // Write sql query to insert data into the database
        $sql = "INSERT INTO $table_name (admin_first_name, admin_last_name, email, country_code, phone, vendor_type, vendor_details, password, zipcode1, zipcode2, cityname, stateabbrev)
                VALUES ('$admin_first_name', '$admin_last_name', '$email', '$country_code', '$phone', '$vendor_type', '$vendor_details', '$hashed_password', '$zipcode1', '$zipcode2', '$cityname', '$stateabbrev')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $serviceprovider_id = $conn->insert_id;
    $servicelist = array_slice(explode("\r\n", $services), 0, 8);
    while (count($servicelist) < 8) {
        array_push($servicelist, "");
    }
    $query1 = "INSERT INTO servicecompanydescription (serviceprovider_id, service1, service2, service3, service4, service5, service6, service7, service8) VALUES ('$serviceprovider_id', '$servicelist[0]', '$servicelist[1]', '$servicelist[2]', '$servicelist[3]', '$servicelist[4]', '$servicelist[5]', '$servicelist[6]', '$servicelist[7]')";
    if ($conn->query($query1) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query1 . "<br>" . $conn->error;
    }
    // foreach ($servicelist as $service) {
        // $sql = "INSERT INTO services (serviceprovider_id, service_name) VALUES ('$serviceprovider_id', '$service')";
        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
        // echo $service. "<br>"; 
    // }
    // Close connection
    $conn->close();
    header("Location: vendor_login.html");
    // echo json_encode($services);
    exit;
}
?>
