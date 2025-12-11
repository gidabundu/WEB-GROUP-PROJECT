<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role     = trim($_POST['role']);

    // Hash password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $check = "SELECT * FROM Users WHERE username = ?";
    $stmt  = mysqli_prepare($conn, $check);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "Error: Username already exists!";
    } else {
        $sqlInsert = "INSERT INTO Users (username, password, role) VALUES (?, ?, ?)";
        $stmtInsert = mysqli_prepare($conn, $sqlInsert);
        mysqli_stmt_bind_param($stmtInsert, "sss", $username, $hashedPassword, $role);

        if (mysqli_stmt_execute($stmtInsert)) {
            echo "User created successfully!";
            header("Location: index.html");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>
