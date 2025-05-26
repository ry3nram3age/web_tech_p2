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
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        main {
            max-width: 800px;
            margin: 50px auto;
            background-color: #222;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px #000;
        }
        h1 {
            color: #ff6600;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            padding: 8px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-save {
            background-color: #1e90ff;
            color: white;
        }
        .btn-save:hover {
            background-color: #187bcd;
        }
        .btn-delete {
            background-color: #ff4d4d;
            color: white;
        }
        .btn-delete:hover {
            background-color: #e03e3e;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #ff6600;
            font-weight: bold;
        }
        .back-link:hover {
            color: #ffa94d;
        }
    </style>
</head>
<body>

<?php include 'nav.inc'; ?>

<main>
    <h1>EOI Details: <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></h1>
    <form action="update_eoi.php" method="POST">
    <input type="hidden" name="eoi_id" value="<?= $eoi_id ?>">

    <?php foreach ($row as $key => $value): ?>
        <?php if ($key === 'EOInumber'): ?>
            <!-- Skip EOInumber (already handled as hidden) -->
            <?php continue; ?>
        <?php elseif ($key === 'status'): ?>
            <label for="<?= $key ?>"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $key))) ?>:</label>
            <select id="<?= $key ?>" name="<?= $key ?>">
                <option value="New" <?= $value === 'New' ? 'selected' : '' ?>>New</option>
                <option value="Approved" <?= $value === 'Approved' ? 'selected' : '' ?>>Approved</option>
                <option value="Rejected" <?= $value === 'Rejected' ? 'selected' : '' ?>>Rejected</option>
            </select>
        <?php else: ?>
            <label for="<?= $key ?>"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $key))) ?>:</label>
            <input type="text" id="<?= $key ?>" name="<?= $key ?>" value="<?= htmlspecialchars($value) ?>">
        <?php endif; ?>
    <?php endforeach; ?>

        <button type="submit" class="btn-save">💾 Save Changes</button>
    </form>

    <form action="delete_eoi.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
        <input type="hidden" name="eoi_id" value="<?= $eoi_id ?>">
        <button type="submit" class="btn-delete">🗑 Delete Record</button>
    </form>

    <a class="back-link" href="manage.php">← Back to Manage Page</a>
</main>

<?php include 'footer.inc'; ?>

</body>
</html>