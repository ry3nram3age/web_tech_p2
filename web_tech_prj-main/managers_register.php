<?php
require_once("settings.php");

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: prohibited.php');
    exit();
}


$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "❌ Username and password are required.";
    } elseif (strlen($password) < 6) {
        $error = "❌ Password must be at least 6 characters.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM managers WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "❌ Username already exists.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO managers (username, password) VALUES (?, ?)");
            $insert->bind_param("ss", $username, $hashed_password);

            if ($insert->execute()) {
                $success = "✅ Manager registered successfully.";
            } else {
                $error = "❌ Error registering manager.";
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Manager</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body id="register_manager_body">
<?php include "nav.inc"?>
<main id="register_manager_main">
    <div class="register-container">
        <h2>Register New Manager</h2>
        <form method="POST" action="managers_register.php">
        <a class="back-link" href="manage.php">← Back to Manage Page</a>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter username" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="At least 6 characters" required>

            <button type="submit">Register</button>
        </form>

        <?php if (!empty($error)): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="message success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
    </div>
</main>
<?php include "footer.inc"?>
</body>
</html>