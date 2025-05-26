<?php
session_start();
require_once("settings.php");

$error_message = "";

// CONFIGURATION
$max_attempts = 4;          
$lockout_time = 300;        

$conn->query("
    CREATE TABLE IF NOT EXISTS login_attempts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE,
        attempts INT NOT NULL DEFAULT 0,
        locked_until TIMESTAMP NULL
    )
");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "❌ Username and password are required.";
    } else {
        $username_safe = mysqli_real_escape_string($conn, $username);

        $stmt = $conn->prepare("SELECT attempts, locked_until FROM login_attempts WHERE username = ?");
        $stmt->bind_param("s", $username_safe);
        $stmt->execute();
        $result = $stmt->get_result();
        $attempt_data = $result->fetch_assoc();

        $now = new DateTime();
        if ($attempt_data) {
            if ($attempt_data['locked_until'] && $now < new DateTime($attempt_data['locked_until'])) {
                $remaining = (new DateTime($attempt_data['locked_until']))->getTimestamp() - $now->getTimestamp();
                $error_message = "❌ Account is locked. Please try again in $remaining seconds.";
            }
        }

        if (empty($error_message)) {
            $password_safe = mysqli_real_escape_string($conn, $password);
            $query = "SELECT * FROM users WHERE username = '$username_safe' AND password = '$password_safe'";
            $login_result = mysqli_query($conn, $query);

            if ($login_result && mysqli_num_rows($login_result) > 0) {
                $stmt = $conn->prepare("DELETE FROM login_attempts WHERE username = ?");
                $stmt->bind_param("s", $username_safe);
                $stmt->execute();

                $_SESSION['username'] = $username;
                header("Location: manage.php");
                exit();
            } else {
                if (!$attempt_data) {
                    $stmt = $conn->prepare("INSERT INTO login_attempts (username, attempts) VALUES (?, 1)");
                    $stmt->bind_param("s", $username_safe);
                    $stmt->execute();
                } else {
                    $attempts = $attempt_data['attempts'] + 1;

                    if ($attempts >= $max_attempts) {
                        $locked_until = (new DateTime())->modify("+$lockout_time seconds")->format('Y-m-d H:i:s');
                        $stmt = $conn->prepare("UPDATE login_attempts SET attempts = ?, locked_until = ? WHERE username = ?");
                        $stmt->bind_param("iss", $attempts, $locked_until, $username_safe);
                        $stmt->execute();
                        $error_message = "❌ Too many failed attempts. Account locked for " . ($lockout_time / 60) . " minutes.";
                    } else {
                        $stmt = $conn->prepare("UPDATE login_attempts SET attempts = ? WHERE username = ?");
                        $stmt->bind_param("is", $attempts, $username_safe);
                        $stmt->execute();
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
    <style>
     
    </style>
</head>
<body id="login-body">
<?php include 'nav.inc'; ?>

<main>
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="login.php" novalidate>
      <label for="username" class="login-label">Username</label>
      <input type="text" id="username" name="username" placeholder="Please enter your username">

      <label for="password" class="login-label">Password</label>
      <input type="password" id="password" name="password" placeholder="Please enter your password">

      <button type="submit" id="login-btn">Login</button>
    </form>
  </div>
</main>

<?php include 'footer.inc'; ?>
</body>
</html>