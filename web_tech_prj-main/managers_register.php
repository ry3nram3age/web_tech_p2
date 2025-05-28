<?php
require_once("settings.php");

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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
            padding: 20px;
        }
        .register-container {
            background-color: #222;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.6);
            width: 100%;
            max-width: 420px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .register-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0,0,0,0.8);
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #ff6600;
            font-size: 1.8rem;
        }
        label {
            display: block;
            margin: 15px 0 8px;
            font-size: 0.95rem;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #444;
            border-radius: 6px;
            background: #333;
            color: white;
            font-size: 1rem;
            transition: border 0.3s ease;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border: 1px solid #ff6600;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
            background-color: #ff6600;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        button:hover {
            background-color: #e05200;
            transform: scale(1.02);
        }
        .message {
            text-align: center;
            margin-top: 18px;
            font-weight: bold;
            font-size: 0.95rem;
        }
        .error {
            color: #ff4d4d;
        }
        .success {
            color: #28a745;
        }
    </style>
</head>
<body>
<?php include "nav.inc"?>
<main>
    <div class="register-container">
        <h2>Register New Manager</h2>
        <form method="POST" action="managers_register.php">
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