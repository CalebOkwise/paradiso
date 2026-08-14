<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

require_admin_login();
$pdo = db_connect();

$statusFilter = $_GET['status'] ?? '';
$query = 'SELECT * FROM leads';
$params = [];
if ($statusFilter) {
    $query .= ' WHERE status = :status';
    $params[':status'] = $statusFilter;
}
$query .= ' ORDER BY created_at DESC LIMIT 100';
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$leads = $stmt->fetchAll();
$statuses = ['New','Contacted','Interested','Qualified','Farm Option Selected','Ownership/Payment Process','Customer','Lost','Nurture'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard | Paradiso Farms</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="admin-header">
        <div class="wrapper admin-header-inner">
            <h1>Paradiso Farms leads</h1>
            <div class="admin-actions">
                <a href="logout.php" class="button button-secondary">Sign out</a>
            </div>
        </div>
    </header>
    <main class="wrapper admin-dashboard">
        <section class="admin-section">
            <form method="get" class="admin-filter-form">
                <label>
                    Filter by status
                    <select name="status" onchange="this.form.submit()">
                        <option value="">All statuses</option>
                        <?php foreach ($statuses as $status): ?>
                            <option value="<?php echo htmlspecialchars($status, ENT_QUOTES); ?>" <?php echo $statusFilter === $status ? 'selected' : ''; ?>><?php echo htmlspecialchars($status, ENT_QUOTES); ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </form>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Investment</th>
                            <th>Farmland</th>
                            <th>Goal</th>
                            <th>Timeline</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leads as $lead): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($lead['created_at'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($lead['full_name'], ENT_QUOTES); ?></td>
                                <td>
                                    <?php echo htmlspecialchars($lead['phone_whatsapp'], ENT_QUOTES); ?><br>
                                    <?php echo htmlspecialchars($lead['email'], ENT_QUOTES); ?>
                                </td>
                                <td><?php echo htmlspecialchars($lead['investment_range'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($lead['farmland_interest'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($lead['primary_goal'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($lead['timeline'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($lead['status'], ENT_QUOTES); ?></td>
                                <td><a href="lead.php?id=<?php echo (int)$lead['id']; ?>">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
