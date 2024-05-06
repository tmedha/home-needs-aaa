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

$dbname = "class_demo_database";

// SQL query to check if the database exists
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

// $sql = "CREATE DATABASE new_demo_database7";

// // Execute query
// if ($conn->query($sql) === TRUE) 
// {
//     echo "Database created successfully";
//     echo "<br>";
// } 
// else {
//     echo "Error creating database: " . $conn->error;
// }


$table_name = "students";

// SQL query to check if the table exists
$sql_check_table = "SHOW TABLES LIKE '$table_name'";

$result = $conn->query($sql_check_table);

if ($result->num_rows == 0) {
    // Table does not exist, create it
    $sql_create_table = "CREATE TABLE $table_name (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        program VARCHAR(50) NOT NULL,
        date_of_admission DATE
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

// $name = "Medha Tripathi";
// $program = "Computer Science";
// $date_of_admission = "2024-01-16"; 

// $sql_insert = "INSERT INTO students (name, program, date_of_admission) VALUES ('$name', '$program', '$date_of_admission')";

// if ($conn->query($sql_insert) === TRUE) {
//     echo "New record inserted successfully";
//     echo "<br>";
// } else {
//     echo "Error: " . $sql_insert . "<br>" . $conn->error;
// }


// $name = "ABC XYZ";
// $program = "Physics";
// $date_of_admission = "2023-08-01"; 

// $sql_insert = "INSERT INTO students (name, program, date_of_admission) VALUES ('$name', '$program', '$date_of_admission')";

// if ($conn->query($sql_insert) === TRUE) {
//     echo "New record inserted successfully";
//     echo "<br>";
// } else {
//     echo "Error: " . $sql_insert . "<br>" . $conn->error;
// }

// $sql_select = "SELECT * FROM students";

// $result = $conn->query($sql_select);

// if ($result->num_rows > 0) {
//     // Output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Program: " . $row["program"]. " - Date of Admission: " . $row["date_of_admission"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }


$id_to_delete = 2; 

$sql_delete = "DELETE FROM students WHERE id = $id_to_delete";

if ($conn->query($sql_delete) === TRUE) {
    echo "Record deleted successfully";
    echo "<br>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// $name_to_delete = 4; 

// $sql_delete = "DELETE FROM students WHERE id = $id_to_delete1";

// if ($conn->query($sql_delete) === TRUE) {
//     echo "Record deleted successfully";
//     echo "<br>";
// } else {
//     echo "Error deleting record: " . $conn->error;
// }

$sql_select = "SELECT * FROM students";

$sql_count_rows = "SELECT COUNT(*) as total_rows FROM $table_name";

$result = $conn->query($sql_count_rows);

if ($result->num_rows > 0) {
    // Output total number of rows
    $row = $result->fetch_assoc();
    echo "Total number of rows in table $table_name: " . $row["total_rows"];
    echo "<br>";
} else {
    echo "No rows found in table $table_name";
    echo "<br>";
}

$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Program: " . $row["program"]. " - Date of Admission: " . $row["date_of_admission"]. "<br>";
    }
} else {
    echo "0 results";
}


// $sql = "SELECT * FROM demo WHERE student_name = 'Gloria';";
// $result = $conn->query($sql);

// $sql = "SELECT student_name FROM demo WHERE date_of_admission = '2024-01-16';";
// $result1 = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
// //   while($row = $result->fetch_assoc()) {
// //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
// //   }
//     $row = $result->fetch_assoc();
//     echo $row["program_name"]; 
//     echo "<br>";
// } else {
//   echo "0 results";
// }
// if ($result1->num_rows > 0) {
//   // output data of each row
// //   while($row = $result->fetch_assoc()) {
// //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
// //   }
//     $row1 = $result1->fetch_assoc();
//     echo $row1["student_name"];
// } else {
//   echo "0 results";
// }


$conn->close();
?>