<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: prohibited.php');
    exit();
}

require_once("settings.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eoi_id = intval($_POST['eoi_id']);

    // Define allowed fields you want to update (exclude EOInumber)
    $allowed_fields = [
        'job_reference_number', 'first_name', 'last_name', 'gender', 'address',
        'suburb', 'state', 'postcode', 'email_address', 'phone_number',
        'skills', 'other_skills', 'status'
    ];

    $set_clause = [];
    $params = [];
    $types = '';

    foreach ($allowed_fields as $field) {
        if (isset($_POST[$field])) {
            $set_clause[] = "$field = ?";
            $params[] = $_POST[$field];
            $types .= 's';
        }
    }

    if (count($set_clause) > 0) {
        $sql = "UPDATE eoi SET " . implode(', ', $set_clause) . " WHERE EOInumber = ?";
        $params[] = $eoi_id;
        $types .= 'i';

        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            header("Location: view_details.php?eoi_id=$eoi_id&updated=1");
            exit();
        } else {
            die("❌ Error updating record: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("❌ No fields provided for update.");
    }

    $conn->close();
} else {
    header('Location: manage.php');
    exit();
}