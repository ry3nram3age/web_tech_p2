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
      body {
        font-family: 'Poppins', sans-serif;
      }
      .login-container {
        background-color: #222;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 10px #000;
        width: 650px;
        margin: 40px auto;
      }
      .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #ff6600;
        padding-bottom: 1rem;
      }
      label {
        display: block;
        margin: 12px 0 5px;
      }
      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background: #333;
        color: white;
      }
      button {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        background-color: #ff6600;
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      button:hover {
        background-color: #e05200;
      }
      .error {
        color: #ff4d4d;
        text-align: center;
        margin-top: 10px;
      }
    </style>
</head>
<body>
<?php include 'nav.inc'; ?>

<main>
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="login.php" novalidate>
        
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Please enter your username">

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Please enter your password">

      <button type="submit">Login</button>
    </form>
  </div>
</main>

<?php
session_start();
require_once("settings.php");

// CONFIGURATION
$max_attempts = 4;          // max failed tries allowed
$lockout_time = 300;        // lockout time in seconds (5 minutes)

// Check if locked out
if (isset($_SESSION['lockout_expires'])) {
    if (time() < $_SESSION['lockout_expires']) {
        $remaining = $_SESSION['lockout_expires'] - time();
        die("❌ You are temporarily locked out. Please try again in $remaining seconds.");
    } else {
        // Lockout expired, reset
        unset($_SESSION['failed_attempts']);
        unset($_SESSION['lockout_expires']);
    }
}

// Initialize failed attempts
if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username) || empty($password)) {
        die("❌ Username and password are required.");
    }

    // Escape inputs (minimum safety)
    $username_safe = mysqli_real_escape_string($conn, $username);
    $password_safe = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username = '$username_safe' AND password = '$password_safe'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['failed_attempts'] = 0; // reset on success
        header("Location: manage.php");
        exit();
    } else {
        $_SESSION['failed_attempts']++;

        if ($_SESSION['failed_attempts'] >= $max_attempts) {
            $_SESSION['lockout_expires'] = time() + $lockout_time;
            die("❌ Too many failed attempts. You are locked out for " . ($lockout_time / 60) . " minutes.");
        } else {
            // Do not show remaining attempts; just generic error
            echo "❌ Incorrect username or password.";
        }
    }
}
?>

<?php include 'footer.inc'; ?>
</body>
</html>