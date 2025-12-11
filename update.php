<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id       = intval($_POST['id']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role     = trim($_POST['role']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sqlUpdate = "UPDATE Users SET username=?, password=?, role=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sqlUpdate);
    mysqli_stmt_bind_param($stmt, "sssi", $username, $hashedPassword, $role, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "User updated successfully!";
        header("Location: index.html");
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
