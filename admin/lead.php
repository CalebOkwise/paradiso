<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

require_admin_login();
$pdo = db_connect();

$leadId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$lead = null;
if ($leadId > 0) {
    $stmt = $pdo->prepare('SELECT * FROM leads WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $leadId]);
    $lead = $stmt->fetch();
}

if (!$lead) {
    redirect('/admin/dashboard.php');
}

$message = '';
$statuses = ['New','Contacted','Interested','Qualified','Farm Option Selected','Ownership/Payment Process','Customer','Lost','Nurture'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? $lead['status'];
    $assignedTo = sanitize_text($_POST['assigned_to'] ?? '');
    $nextFollowup = $_POST['next_followup'] ?? null;
    $notes = trim($_POST['notes'] ?? '');

    $update = 'UPDATE leads SET status = :status, assigned_to = :assigned_to, next_followup = :next_followup, notes = :notes, updated_at = :updated_at WHERE id = :id';
    $stmt = $pdo->prepare($update);
    $stmt->execute([
        ':status' => $status,
        ':assigned_to' => $assignedTo,
        ':next_followup' => $nextFollowup ?: null,
        ':notes' => $notes ?: null,
        ':updated_at' => date('Y-m-d H:i:s'),
        ':id' => $leadId,
    ]);
    $message = 'Lead updated successfully.';
    $stmt = $pdo->prepare('SELECT * FROM leads WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $leadId]);
    $lead = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead details | Paradiso Farms</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="admin-header">
        <div class="wrapper admin-header-inner">
            <h1>Lead details</h1>
            <div class="admin-actions">
                <a href="dashboard.php" class="button button-secondary">Back to leads</a>
                <a href="logout.php" class="button button-secondary">Sign out</a>
            </div>
        </div>
    </header>
    <main class="wrapper admin-lead-detail">
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES); ?></div>
        <?php endif; ?>
        <section class="admin-section grid-2">
            <div class="lead-summary">
                <h2><?php echo htmlspecialchars($lead['full_name'], ENT_QUOTES); ?></h2>
                <p><strong>Contact:</strong> <?php echo htmlspecialchars($lead['phone_whatsapp'], ENT_QUOTES); ?> / <?php echo htmlspecialchars($lead['email'], ENT_QUOTES); ?></p>
                <p><strong>Investment range:</strong> <?php echo htmlspecialchars($lead['investment_range'], ENT_QUOTES); ?></p>
                <p><strong>Farmland interest:</strong> <?php echo htmlspecialchars($lead['farmland_interest'], ENT_QUOTES); ?></p>
                <p><strong>Primary goal:</strong> <?php echo htmlspecialchars($lead['primary_goal'], ENT_QUOTES); ?></p>
                <p><strong>Timeline:</strong> <?php echo htmlspecialchars($lead['timeline'], ENT_QUOTES); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($lead['status'], ENT_QUOTES); ?></p>
                <p><strong>Created:</strong> <?php echo htmlspecialchars($lead['created_at'], ENT_QUOTES); ?></p>
                <p><strong>Assigned to:</strong> <?php echo htmlspecialchars($lead['assigned_to'] ?? '—', ENT_QUOTES); ?></p>
                <p><strong>Next follow-up:</strong> <?php echo htmlspecialchars($lead['next_followup'] ?? '—', ENT_QUOTES); ?></p>
                <h3>Attribution</h3>
                <p><strong>Source:</strong> <?php echo htmlspecialchars($lead['utm_source'], ENT_QUOTES); ?></p>
                <p><strong>Medium:</strong> <?php echo htmlspecialchars($lead['utm_medium'], ENT_QUOTES); ?></p>
                <p><strong>Campaign:</strong> <?php echo htmlspecialchars($lead['utm_campaign'], ENT_QUOTES); ?></p>
                <p><strong>Content:</strong> <?php echo htmlspecialchars($lead['utm_content'], ENT_QUOTES); ?></p>
                <p><strong>Term:</strong> <?php echo htmlspecialchars($lead['utm_term'], ENT_QUOTES); ?></p>
                <p><strong>Fbclid:</strong> <?php echo htmlspecialchars($lead['fbclid'], ENT_QUOTES); ?></p>
            </div>
            <div class="lead-update-panel">
                <form method="post" action="">
                    <label>
                        Status
                        <select name="status">
                            <?php foreach ($statuses as $status): ?>
                                <option value="<?php echo htmlspecialchars($status, ENT_QUOTES); ?>" <?php echo $lead['status'] === $status ? 'selected' : ''; ?>><?php echo htmlspecialchars($status, ENT_QUOTES); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>
                        Assigned to
                        <input type="text" name="assigned_to" value="<?php echo htmlspecialchars($lead['assigned_to'] ?? '', ENT_QUOTES); ?>">
                    </label>
                    <label>
                        Next follow-up
                        <input type="date" name="next_followup" value="<?php echo htmlspecialchars($lead['next_followup'] ?? '', ENT_QUOTES); ?>">
                    </label>
                    <label>
                        Notes
                        <textarea name="notes" rows="6"><?php echo htmlspecialchars($lead['notes'] ?? '', ENT_QUOTES); ?></textarea>
                    </label>
                    <button type="submit" class="button">Save updates</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
