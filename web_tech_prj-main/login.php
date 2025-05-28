
<?php
session_start();
require_once("settings.php");

$error_message = "";

// CONFIGURATION
$max_attempts = 4;
$lockout_time = 300;

// Ensure login_attempts table exists
$conn->query("
    CREATE TABLE IF NOT EXISTS login_attempts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE,
        attempts INT NOT NULL DEFAULT 0,
        locked_until TIMESTAMP NULL
    )
");

// If form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username) || empty($password)) {
        $error_message = "❌ Username and password are required.";
    } else {
        $username_safe = mysqli_real_escape_string($conn, $username);

        // Check lockout status
        $stmt = $conn->prepare("SELECT attempts, locked_until FROM login_attempts WHERE username = ?");
        $stmt->bind_param("s", $username_safe);
        $stmt->execute();
        $result = $stmt->get_result();
        $attempt_data = $result->fetch_assoc();
        $stmt->close();

        $now = new DateTime();
        if ($attempt_data && $attempt_data['locked_until'] && $now < new DateTime($attempt_data['locked_until'])) {
            $remaining = (new DateTime($attempt_data['locked_until']))->getTimestamp() - $now->getTimestamp();
            $error_message = "❌ Account is locked. Please try again in $remaining seconds.";
        }

        if (empty($error_message)) {
            // Check credentials in managers table (updated from users table)
            $stmt = $conn->prepare("SELECT password FROM managers WHERE username = ?");
            $stmt->bind_param("s", $username_safe);
            $stmt->execute();
            $stmt->bind_result($db_password_hash);

            if ($stmt->fetch()) {
                if (password_verify($password, $db_password_hash)) {
                    $stmt->close();

                    // Success: clear failed attempts
                    $clear_stmt = $conn->prepare("DELETE FROM login_attempts WHERE username = ?");
                    $clear_stmt->bind_param("s", $username_safe);
                    $clear_stmt->execute();
                    $clear_stmt->close();

                    $_SESSION['username'] = $username;
                    header("Location: manage.php");
                    exit();
                } else {
                    $error_message = "❌ Incorrect password.";
                    $stmt->close();
                }
            } else {
                $error_message = "❌ Username not found.";
                $stmt->close();
            }

            // Handle failed attempts (lockout tracking)
            if ($error_message) {
                if (!$attempt_data) {
                    $insert_stmt = $conn->prepare("INSERT INTO login_attempts (username, attempts) VALUES (?, 1)");
                    $insert_stmt->bind_param("s", $username_safe);
                    $insert_stmt->execute();
                    $insert_stmt->close();
                } else {
                    $attempts = $attempt_data['attempts'] + 1;
                    if ($attempts >= $max_attempts) {
                        $locked_until = (new DateTime())->modify("+$lockout_time seconds")->format('Y-m-d H:i:s');
                        $update_stmt = $conn->prepare("UPDATE login_attempts SET attempts = ?, locked_until = ? WHERE username = ?");
                        $update_stmt->bind_param("iss", $attempts, $locked_until, $username_safe);
                        $update_stmt->execute();
                        $update_stmt->close();
                        $error_message = "❌ Too many failed attempts. Account locked for " . ($lockout_time / 60) . " minutes.";
                    } else {
                        $update_stmt = $conn->prepare("UPDATE login_attempts SET attempts = ? WHERE username = ?");
                        $update_stmt->bind_param("is", $attempts, $username_safe);
                        $update_stmt->execute();
                        $update_stmt->close();
                        $error_message = "❌ Incorrect username or password.";
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- login.php made and developed by Ryan Neill -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body id="login-body">
<?php include 'nav.inc'; ?>

<main>
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="login.php" novalidate>
      <label for="username" class="login-label">Username</label>
      <input type="text" id="username" name="username" placeholder="Please enter your username" required>

      <label for="password" class="login-label">Password</label>
      <input type="password" id="password" name="password" placeholder="Please enter your password" required>

      <button type="submit" id="login-btn">Login</button>

      <?php if (!empty($error_message)): ?>
          <div class="error" style="color: #ff4d4d; margin-top: 10px; text-align: center;">
              <?= htmlspecialchars($error_message) ?>
          </div>
      <?php endif; ?>
    </form>
  </div>
</main>

<?php include 'footer.inc'; ?>
</body>
</html>