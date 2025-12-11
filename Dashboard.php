<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management System</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            width: 500px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        /* Navigation bar inside form */
        .nav {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .nav a {
            flex: 1;
            text-align: center;
            padding: 10px;
            margin: 0 5px;
            background: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .nav a:hover {
            background: #2980b9;
        }

        h2 {
            text-align: center;
            color: #34495e;
            margin-top: 20px;
        }

        form {
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Management System</h1>

        <!-- Navigation inside the form -->
        <div class="nav">
            <a href="index.html">Home</a>
            <a href="#create">Create</a>
            <a href="read.php">View</a>
            <a href="#update">Update</a>
            <a href="#delete">Delete</a>
        </div>

        <!-- Create User -->
        <h2 id="create">Create User</h2>
        <form action="create.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Player">Player</option>
                <option value="Agent">Agent</option>
                <option value="Club Manager">Club Manager</option>
            </select>
            <button type="submit">Create User</button>
        </form>

        <!-- Update User -->
        <h2 id="update">Update User</h2>
        <form action="update.php" method="POST">
            <input type="number" name="id" placeholder="User ID" required>
            <input type="text" name="username" placeholder="New Username" required>
            <input type="password" name="password" placeholder="New Password" required>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Player">Player</option>
                <option value="Agent">Agent</option>
                <option value="Club Manager">Club Manager</option>
            </select>
            <button type="submit">Update User</button>
        </form>

        <!-- Delete User -->
        <h2 id="delete">Delete User</h2>
        <form action="delete.php" method="POST">
            <input type="number" name="id" placeholder="User ID" required>
            <button type="submit">Delete User</button>
        </form>
    </div>
</body>
</html>
