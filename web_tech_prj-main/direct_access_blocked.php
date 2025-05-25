<?php
http_response_code(403); // Forbidden
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- direct_access_blocked.php made and developed by Ryan Neill -->
    <meta charset="UTF-8">
    <title>403 Forbidden</title>
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
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
            max-width: 400px;
            width: 100%;
        }
        .message-box .icon {
            font-size: 60px;
            color: #ff3333;
            margin-bottom: 15px;
        }
        .message-box h1 {
            color: #ff4d4d;
            margin-bottom: 10px;
        }
        .message-box p {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #ccc;
        }
        .message-box a {
            display: inline-block;
            padding: 12px 25px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
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
            <div class="icon">🚫</div>
            <h1>403 Forbidden</h1>
            <p>Direct access to this page is not allowed.</p>
            <a href="index.php">Return to Home</a>
        </div>
    </main>

    <?php include 'footer.inc'; ?>
</body>
</html>