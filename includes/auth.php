<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

function is_admin_logged_in() {
    ensure_session();
    return !empty($_SESSION['admin_user']);
}

function require_admin_login() {
    if (!is_admin_logged_in()) {
        redirect('/admin/login.php');
    }
}

function admin_login($username, $password) {
    $pdo = db_connect();
    $stmt = $pdo->prepare('SELECT id, username, password_hash, display_name FROM users WHERE username = :username LIMIT 1');
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        ensure_session();
        session_regenerate_id(true);
        $_SESSION['admin_user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'display_name' => $user['display_name'],
        ];
        return true;
    }
    return false;
}

function admin_logout() {
    ensure_session();
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
    session_destroy();
}

function admin_user() {
    ensure_session();
    return $_SESSION['admin_user'] ?? null;
}
