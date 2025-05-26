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
$sql = "SELECT * FROM expressions_of_interest WHERE EOInumber = ?";
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
        .details-list {
            list-style: none;
            padding: 0;
        }
        .details-list li {
            margin: 10px 0;
            padding: 10px;
            background-color: #2a2a2a;
            border-radius: 5px;
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
    <ul class="details-list">
        <?php foreach ($row as $key => $value): ?>
            <li><strong><?= htmlspecialchars(ucwords(str_replace('_', ' ', $key))) ?>:</strong> <?= nl2br(htmlspecialchars($value)) ?></li>
        <?php endforeach; ?>
    </ul>
    <a class="back-link" href="manage.php">← Back to Manage Page</a>
</main>

<?php include 'footer.inc'; ?>

</body>
</html>