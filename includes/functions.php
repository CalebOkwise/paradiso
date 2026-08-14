<?php
require_once __DIR__ . '/config.php';

function ensure_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_name(SESSION_NAME);
        session_start();
    }
}

function set_flash($key, $value) {
    ensure_session();
    $_SESSION['flash'][$key] = $value;
}

function get_flash($key, $default = null) {
    ensure_session();
    if (isset($_SESSION['flash'][$key])) {
        $value = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $value;
    }
    return $default;
}

function generate_csrf_token() {
    ensure_session();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(24));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    ensure_session();
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function sanitize_text($text) {
    return trim(filter_var($text, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
}

function sanitize_email($email) {
    return trim(filter_var($email, FILTER_SANITIZE_EMAIL));
}

function sanitize_phone($phone) {
    $digits = preg_replace('/[^0-9+]/', '', $phone);
    return trim($digits);
}

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function get_old($key, $default = '') {
    ensure_session();
    return isset($_SESSION['form_old'][$key]) ? htmlspecialchars($_SESSION['form_old'][$key], ENT_QUOTES) : $default;
}

function set_old($data) {
    ensure_session();
    $_SESSION['form_old'] = $data;
}

function clear_old() {
    ensure_session();
    unset($_SESSION['form_old']);
}

function get_errors() {
    ensure_session();
    return get_flash('form_errors', []);
}

function save_lead(PDO $pdo, array $leadData) {
    $sql = "INSERT INTO leads 
        (full_name, phone_whatsapp, email, investment_range, farmland_interest, primary_goal, timeline, status, assigned_to, next_followup, notes, utm_source, utm_medium, utm_campaign, utm_content, utm_term, fbclid, ip_address, user_agent, page_url, referrer, created_at, updated_at)
        VALUES
        (:full_name, :phone_whatsapp, :email, :investment_range, :farmland_interest, :primary_goal, :timeline, :status, :assigned_to, :next_followup, :notes, :utm_source, :utm_medium, :utm_campaign, :utm_content, :utm_term, :fbclid, :ip_address, :user_agent, :page_url, :referrer, :created_at, :updated_at)";

    $stmt = $pdo->prepare($sql);
    $now = date('Y-m-d H:i:s');
    $stmt->execute([
        ':full_name' => $leadData['full_name'],
        ':phone_whatsapp' => $leadData['phone_whatsapp'],
        ':email' => $leadData['email'],
        ':investment_range' => $leadData['investment_range'],
        ':farmland_interest' => $leadData['farmland_interest'],
        ':primary_goal' => $leadData['primary_goal'],
        ':timeline' => $leadData['timeline'],
        ':status' => 'New',
        ':assigned_to' => null,
        ':next_followup' => null,
        ':notes' => null,
        ':utm_source' => $leadData['utm_source'],
        ':utm_medium' => $leadData['utm_medium'],
        ':utm_campaign' => $leadData['utm_campaign'],
        ':utm_content' => $leadData['utm_content'],
        ':utm_term' => $leadData['utm_term'],
        ':fbclid' => $leadData['fbclid'],
        ':ip_address' => $leadData['ip_address'],
        ':user_agent' => $leadData['user_agent'],
        ':page_url' => $leadData['page_url'],
        ':referrer' => $leadData['referrer'],
        ':created_at' => $now,
        ':updated_at' => $now,
    ]);
    return $pdo->lastInsertId();
}
