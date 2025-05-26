<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: prohibited.php');
    exit();
}

require_once("settings.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eoi_id'])) {
    $eoi_id = intval($_POST['eoi_id']);

    $stmt = $conn->prepare("DELETE FROM expressions_of_interest WHERE EOInumber = ?");
    $stmt->bind_param("i", $eoi_id);

    if ($stmt->execute()) {
        header("Location: manage.php?deleted=1");
        exit();
    } else {
        die("❌ Error deleting record: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: manage.php');
    exit();
}