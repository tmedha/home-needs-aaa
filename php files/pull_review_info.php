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

$sql = "SELECT * FROM NewReviewInfo ORDER BY Review_ID DESC LIMIT 1";

if($conn->query($sql) === TRUE){
    echo "New record created succesfully";
} else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}

//close the connection
$conn->close();

?>