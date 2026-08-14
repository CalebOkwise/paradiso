<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';
ensure_session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/');
}

$errors = [];

$honeypot = $_POST['company_name'] ?? '';
if (!empty($honeypot)) {
    redirect('/');
}

if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
    $errors[] = 'Invalid form submission. Please reload the page and try again.';
}

$fullName = sanitize_text($_POST['full_name'] ?? '');
$phoneWhatsApp = sanitize_phone($_POST['phone_whatsapp'] ?? '');
$email = sanitize_email($_POST['email'] ?? '');
$investmentRange = $_POST['investment_range'] ?? '';
$farmlandInterest = $_POST['farmland_interest'] ?? '';
$primaryGoal = $_POST['primary_goal'] ?? '';
$timeline = $_POST['timeline'] ?? '';

$allowedRanges = ['700K-1M','1M-3M','3M-5M','5M-10M','10M+','Still exploring'];
$allowedInterests = ['Food crops','Cocoa','Oil palm','All','Not sure'];
$allowedGoals = ['Build another potential source of income','Build productive assets','Diversify investments','Build long-term wealth','Own tangible assets','Still exploring'];
$allowedTimelines = ['Ready','Within 30 days','1-3 months','3-6 months','Just researching'];

if ($fullName === '') {
    $errors[] = 'Please enter your full name.';
}
if ($phoneWhatsApp === '' || strlen($phoneWhatsApp) < 8) {
    $errors[] = 'Please enter a valid phone or WhatsApp number.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if (!in_array($investmentRange, $allowedRanges, true)) {
    $errors[] = 'Please select your investment range.';
}
if (!in_array($farmlandInterest, $allowedInterests, true)) {
    $errors[] = 'Please select your farmland interest.';
}
if (!in_array($primaryGoal, $allowedGoals, true)) {
    $errors[] = 'Please select your primary goal.';
}
if (!in_array($timeline, $allowedTimelines, true)) {
    $errors[] = 'Please select your timeline.';
}

$leadData = [
    'full_name' => $fullName,
    'phone_whatsapp' => $phoneWhatsApp,
    'email' => $email,
    'investment_range' => $investmentRange,
    'farmland_interest' => $farmlandInterest,
    'primary_goal' => $primaryGoal,
    'timeline' => $timeline,
    'utm_source' => sanitize_text($_POST['utm_source'] ?? ''),
    'utm_medium' => sanitize_text($_POST['utm_medium'] ?? ''),
    'utm_campaign' => sanitize_text($_POST['utm_campaign'] ?? ''),
    'utm_content' => sanitize_text($_POST['utm_content'] ?? ''),
    'utm_term' => sanitize_text($_POST['utm_term'] ?? ''),
    'fbclid' => sanitize_text($_POST['fbclid'] ?? ''),
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
    'page_url' => sanitize_text($_POST['page_url'] ?? ''),
    'referrer' => sanitize_text($_POST['referrer'] ?? ''),
];

if (!empty($errors)) {
    set_flash('form_errors', $errors);
    set_old($_POST);
    redirect('/#lead-form');
}

try {
    $pdo = db_connect();
    save_lead($pdo, $leadData);
    clear_old();
    redirect('/thank-you.php');
} catch (Exception $ex) {
    error_log('Lead submission error: ' . $ex->getMessage());
    set_flash('form_errors', ['We could not process the form. Please try again later.']);
    set_old($_POST);
    redirect('/#lead-form');
}
