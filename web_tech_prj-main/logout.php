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
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        .message-box {
            text-align: center;
            background-color: #222;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px #000;
        }
        .message-box h1 {
            color: #ff6600;
            margin-bottom: 20px;
        }
        .message-box a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .message-box a:hover {
            background-color: #e05200;
        }
    </style>
</head>
<body>
    <?php include 'nav.inc'; ?>

    <main>
        <div class="message-box">
            <h1>You have successfully logged out</h1>
            <p>Thank you for using our system.</p>
            <a href="login.php">Back to Login</a>
        </div>
    </main>

    <?php include 'footer.inc'; ?>
</body>
</html>