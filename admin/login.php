<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';
ensure_session();

if (is_admin_logged_in()) {
    redirect('/admin/dashboard.php');
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_text($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($username === '' || $password === '') {
        $message = 'Please enter your username and password.';
    } elseif (admin_login($username, $password)) {
        redirect('/admin/dashboard.php');
    } else {
        $message = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login | Paradiso Farms</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="admin-login-page">
    <main class="wrapper admin-login-panel">
        <h1>Admin sign in</h1>
        <?php if ($message): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($message, ENT_QUOTES); ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label>
                Username
                <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>" required>
            </label>
            <label>
                Password
                <input type="password" name="password" required>
            </label>
            <button type="submit" class="button">Sign in</button>
        </form>
    </main>
</body>
</html>
