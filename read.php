<?php
include 'dbconnect.php';

$sql = "SELECT id, username, role, created_at FROM Users";
$result = mysqli_query($conn, $sql);

echo "<h1>User List</h1>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Username</th><th>Role</th><th>Created At</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['created_at'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>
