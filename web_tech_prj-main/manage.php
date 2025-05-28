<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: prohibited.php');
    exit();
}

require_once("settings.php");

// Get job reference options for dropdown
$jobRefQuery = "SELECT DISTINCT job_reference_number FROM eoi";
$jobRefResult = $conn->query($jobRefQuery);

// Handle form inputs
$job_ref = $_POST['job_ref'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$action = $_POST['action'] ?? '';
$sort_field = $_POST['sort_field'] ?? 'EOInumber';

// Only allow safe sort fields
$allowed_sort_fields = ['EOInumber', 'job_reference_number', 'first_name', 'last_name', 'status'];
if (!in_array($sort_field, $allowed_sort_fields)) {
    $sort_field = 'EOInumber';
}

// Build query
$query = "SELECT EOInumber, job_reference_number, first_name, last_name, status FROM eoi";
$where_clauses = [];
$params = [];
$param_types = '';

if ($action === 'search') {
    if (!empty($job_ref)) {
        $where_clauses[] = 'job_reference_number = ?';
        $params[] = $job_ref;
        $param_types .= 's';
    }
    if (!empty($first_name)) {
        $where_clauses[] = 'first_name LIKE ?';
        $params[] = '%' . $first_name . '%';
        $param_types .= 's';
    }
    if (!empty($last_name)) {
        $where_clauses[] = 'last_name LIKE ?';
        $params[] = '%' . $last_name . '%';
        $param_types .= 's';
    }
}
// For "Display All EOIs", no WHERE filters

if (!empty($where_clauses)) {
    $query .= ' WHERE ' . implode(' AND ', $where_clauses);
}
$query .= " ORDER BY $sort_field";

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($param_types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nexus - HR Management</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body id="manage-home">

<?php include 'nav.inc'; ?>

<main id="manage-main">
    <section class="filter-form">
        <h2 class="manage-h">Search / Filter EOIs</h2>
        <form method="POST" action="manage.php">
            <label for="job_ref">Job Reference Number</label>
            <select id="job_ref" name="job_ref">
                <option value="">-- Select Job Reference --</option>
                <?php while ($jobRow = $jobRefResult->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($jobRow['job_reference_number']) ?>" <?= ($job_ref == $jobRow['job_reference_number']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($jobRow['job_reference_number']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($first_name) ?>" placeholder="Enter First Name">

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($last_name) ?>" placeholder="Enter Last Name">

            <label for="sort_field">Sort By</label>
            <select id="sort_field" name="sort_field">
                <option value="EOInumber" <?= $sort_field === 'EOInumber' ? 'selected' : '' ?>>EOI Number</option>
                <option value="job_reference_number" <?= $sort_field === 'job_reference_number' ? 'selected' : '' ?>>Job Reference Number</option>
                <option value="first_name" <?= $sort_field === 'first_name' ? 'selected' : '' ?>>First Name</option>
                <option value="last_name" <?= $sort_field === 'last_name' ? 'selected' : '' ?>>Last Name</option>
                <option value="status" <?= $sort_field === 'status' ? 'selected' : '' ?>>Status</option>
            </select>

            <button type="submit" name="action" value="search">Search EOIs</button>
            <button type="submit" name="action" value="show_all">Display All EOIs</button>
        </form>

        <a href="logout.php" class="btn-logout">Logout</a>
    </section>

    <section class="results-table">
        <h2 class="manage-h">Results Table</h2>
        <table class="styled-table">
            <?php if ($result->num_rows > 0): ?>
                <thead>
                    <tr>
                        <th>EOI Number</th>
                        <th>Job Ref</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['EOInumber']) ?></td>
                            <td><?= htmlspecialchars($row['job_reference_number']) ?></td>
                            <td><?= htmlspecialchars($row['first_name']) ?></td>
                            <td><?= htmlspecialchars($row['last_name']) ?></td>
                            <td><?= htmlspecialchars($row['status']) ?></td>
                            <td><a class="btn-view" href="view_details.php?eoi_id=<?= urlencode($row['EOInumber']) ?>">View/Edit</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            <?php else: ?>
                <tr><td colspan="6">🚫 No records found.</td></tr>
            <?php endif; ?>
        </table>
    </section>
</main>

<?php include 'footer.inc'; ?>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>