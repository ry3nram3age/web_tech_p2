<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
       
    </style>
</head>
<body id="logout-body">
    <?php include 'nav.inc'; ?>

    <main id="logout-main">
        <div class="message-box">
            <h1>You have successfully logged out</h1>
            <p>Thank you for using our system.</p>
            <a href="login.php">Back to Login</a>
        </div>
    </main>

    <?php include 'footer.inc'; ?>
</body>
</html>