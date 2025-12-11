<?php
require_once 'config.php';
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT id, password, full_name, role FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            // Login success
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'] ?: $username;
            $_SESSION['user_role'] = $user['role'];
            header('Location: index.php');
            exit;
        } else {
            $err = 'Invalid username or password.';
        }
    } else {
        $err = 'Please enter username and password.';
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login - Annak Dashboard</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;background:#f4f6fb;padding:40px}
    .card{max-width:420px;margin:40px auto;background:#fff;padding:24px;border-radius:8px;box-shadow:0 6px 20px rgba(0,0,0,0.08)}
    input{width:100%;padding:12px;margin:8px 0;border:1px solid #ddd;border-radius:6px}
    button{padding:12px 18px;border:none;background:#FF6B35;color:#fff;border-radius:6px;cursor:pointer}
    .err{color:#c0392b;margin-bottom:10px}
  </style>
</head>
<body>
  <div class="card">
    <h2>Sign In</h2>
    <?php if($err): ?><div class="err"><?=htmlspecialchars($err)?></div><?php endif; ?>
    <form method="post" action="">
      <label>Username</label>
      <input name="username" required>
      <label>Password</label>
      <input name="password" type="password" required>
      <div style="display:flex;justify-content:space-between;align-items:center;margin-top:12px">
        <button type="submit">Login</button>
        <a href="index.html" style="color:#0A2463;text-decoration:none">Back to site</a>
      </div>
    </form>
  </div>
</body>
</html>
