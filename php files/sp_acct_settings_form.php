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
    $cardnumber = $_POST['Card-Number'];
    $cardholdername = $_POST['CardHolder-Name'];
    $expdate = $_POST['Expiration-Date'];
    $cvv = $_POST['CVV'];
    $firstname = $_POST['First-Name'];
    $lastname = $_POST['Last-name'];
    $email = $_POST['Email'];
    $streetaddress1 = $_POST['StreetAddress1'];
    $streetaddress2 = $_POST['StreetAddress2'];
    $cityname = $_POST['City-Name'];
    $state = $_POST['State'];
    $zipcode = $_POST['Zipcode'];
    $phonenumber= $_POST['Phone-Number'];

    $service1 = $_POST['Service-1'];
    $service2 = $_POST['Service-2'];
    $service3 = $_POST['Service-3'];
    $service4 = $_POST['Service-4'];
    $service5 = $_POST['Service-5'];
    $service6 = $_POST['Service-6'];
    $service7 = $_POST['Service-7'];
    $service8 = $_POST['Service-8'];

    $zipcode1 = $_POST['Zipcode-1'];
    $zipcode2 = $_POST['Zipcode-2'];

    // Write sql query to insert data into the database
    $sql1 = "UPDATE Account SET Email_address='$email', First_name='$firstname', Last_name='$lastname', 
    City='$cityname', Zipcode=$zipcode, Phone_number=$phonenumber, Street_Address='$streetaddress1', 
    Street_Address2='$streetaddress2' WHERE First_name='$firstname'";

    $sql2 = "UPDATE Servicecompanydescription SET Service1='$service1', Service2='$service2', Service3='$service3', 
    Service4='$service4', Service5='$service5', Service6='$service6', Service7='$service7', 
    Service8='$service8'";

    $sql3 = "UPDATE ServiceProvider SET zipcode1='$zipcode1', zipcode2='$zipcode2' ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
    header("Location: sp_acct_settings.html");
 
exit;
}