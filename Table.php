<?php 
// Include connection file
include 'dbconnect.php';

// Create Users table if not exists
$sqlTable = "CREATE TABLE IF NOT EXISTS Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Player', 'Agent', 'Club Manager') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sqlTable)) {
    echo "Users Table Created Successfully<br>";
} else {
    echo "Error in Creating Users Table: " . mysqli_error($conn) . "<br>";
}

// Seed initial users (only run once ideally)
$sqlSeed = "INSERT INTO Users (username, password, role) VALUES 
('admin1', '100', 'Admin'),
('player1', '200', 'Player'),
('agent1', '300', 'Agent'),
('clubmanager1', '400', 'Club Manager')";

if (mysqli_query($conn, $sqlSeed)) {
    echo "Initial users inserted successfully.<br>";
} else {
    echo "Error inserting initial users: " . mysqli_error($conn) . "<br>";
}

// Example insert from form (make sure your form posts username, password, role)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    // Hash password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sqlInsert = "INSERT INTO Users (username, password, role) 
                  VALUES ('$username', '$hashedPassword', '$role')";

    if (mysqli_query($conn, $sqlInsert)) {
        echo "User added successfully!";
        header("Location: ../Assign2/index.html");
        exit();
    } else {
        echo "Error in Adding the Users Record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
