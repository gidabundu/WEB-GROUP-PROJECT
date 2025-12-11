<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    $sqlDelete = "DELETE FROM Users WHERE id=?";
    $stmt = mysqli_prepare($conn, $sqlDelete);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "User deleted successfully!";
        header("Location: index.html");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
