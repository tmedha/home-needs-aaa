<?php 

//connect the database
$server = "localhost";
$myusername = "root@localhost";
$mypassword = "";
$databasename = "drcasa";

//make the connection
$conn = new mysqli($server, $myusername, $mypassword, $databasename);


//check the connection
if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

$serviceorcompany = $_POST['servicecompanyname'];
$cityname = $_POST['cityname'];
$stateabbreviation = $_POST['stateabbrev'];
$zipcode = $_POST['zipcode'];

$sql = "INSERT INTO `searchquery`(`ServiceorCompany`, `CityName`, `StateAbbreviation`, `Zipcode`) VALUES ('$serviceorcompany','$cityname','$stateabbreviation',$zipcode)";

if($conn->query($sql) === TRUE){
    echo "New record created succesfully";
} else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}

//close the connection
$conn->close();

?>