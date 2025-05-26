<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: prohibited.php');
    exit();
}

require_once("settings.php");

if (!isset($_GET['eoi_id'])) {
    die("❌ Invalid request: No EOI ID provided.");
}

$eoi_id = intval($_GET['eoi_id']);
$sql = "SELECT * FROM eoi WHERE EOInumber = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $eoi_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("❌ No record found for EOI ID: $eoi_id");
}

$row = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EOI Details - <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
       
    </style>
</head>
<body id="view-details-body">

<?php include 'nav.inc'; ?>

<main id="view-details-main">
<a class="back-link" href="manage.php">← Back to Manage Page</a>
    <h1 id="view-details-h1">Edit EOI: <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></h1>

    <form action="update_eoi.php" method="POST" id="view-details-form">
        <input class="view-details-input" type="hidden" name="eoi_id" value="<?= $eoi_id ?>">

        <?php foreach ($row as $key => $value): ?>
            <?php if ($key === 'EOInumber') continue; ?>

            <label id="view-details-label" for="<?= $key ?>"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $key))) ?>:</label>

            <?php if ($key === 'status'): ?>
                <select id="<?= $key ?>" name="<?= $key ?>">
                    <option value="New" <?= $value === 'New' ? 'selected' : '' ?>>New</option>
                    <option value="Approved" <?= $value === 'Approved' ? 'selected' : '' ?>>Approved</option>
                    <option value="Rejected" <?= $value === 'Rejected' ? 'selected' : '' ?>>Rejected</option>
                </select>
            <?php elseif ($key === 'state'): ?>
                <select id="<?= $key ?>" name="<?= $key ?>">
                    <option value="VIC" <?= $value === 'VIC' ? 'selected' : '' ?>>VIC</option>
                    <option value="NSW" <?= $value === 'NSW' ? 'selected' : '' ?>>NSW</option>
                    <option value="QLD" <?= $value === 'QLD' ? 'selected' : '' ?>>QLD</option>
                    <option value="WA" <?= $value === 'WA' ? 'selected' : '' ?>>WA</option>
                    <option value="SA" <?= $value === 'SA' ? 'selected' : '' ?>>SA</option>
                    <option value="TAS" <?= $value === 'TAS' ? 'selected' : '' ?>>TAS</option>
                    <option value="NT" <?= $value === 'NT' ? 'selected' : '' ?>>NT</option>
                    <option value="ACT" <?= $value === 'ACT' ? 'selected' : '' ?>>ACT</option>
                </select>
            <?php elseif ($key === 'skills' || $key === 'other_skills'): ?>
                <textarea id="<?= $key ?>" name="<?= $key ?>" rows="4"><?= htmlspecialchars($value) ?></textarea>
            <?php else: ?>
                <input type="text" id="<?= $key ?>" name="<?= $key ?>" value="<?= htmlspecialchars($value) ?>">
            <?php endif; ?>

        <?php endforeach; ?>

        <button type="submit" class="btn-save">💾 Save Changes</button>
    </form>

    <form action="delete_eoi.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
        <input class="view-details-input" type="hidden" name="eoi_id" value="<?= $eoi_id ?>">
        <button type="submit" class="btn-delete">🗑 Delete Record</button>
    </form>
</main>

<?php include 'footer.inc'; ?>

</body>
</html>