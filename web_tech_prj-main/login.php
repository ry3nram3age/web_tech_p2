<!DOCTYPE html>
<html lang="en">
<head>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username)) {
        die("Username is required.");
    }

    if (empty($password)) {
        die("Password is required.");
    }

    $username_safe = mysqli_real_escape_string($conn, $username);
    $password_safe = mysqli_real_escape_string($conn, $password);

    $query  = "SELECT * FROM users WHERE username = '$username_safe' AND password = '$password_safe'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
        exit();
    } else {
        die("Incorrect Username and Password.");
    }
}
?>

<?php include 'footer.inc'; ?>
</body>
</html>