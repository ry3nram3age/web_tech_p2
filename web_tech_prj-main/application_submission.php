<?php
session_start();

// Safely get the name from the URL (passed after form submission)
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Applicant';
$eoi = isset($_GET['eoi']) ? htmlspecialchars($_GET['eoi']): "Error";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Submitted</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
         {
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
            color: #28a745;
            margin-bottom: 20px;
        }
        .message-box p {
            margin-bottom: 20px;
        }
        .message-box a {
            display: inline-block;
            margin-top: 10px;
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
<body id="application-submit-body">

<?php include 'nav.inc'; ?>

<main id="application-submit-main">
    <div class="message-box">
        <h1>✅ Thank You, <?= $name ?>!</h1>
        <p>Your application has been successfully submitted. We will review it and get back to you shortly.</p>
        <?php
        echo "<p>Application number: $eoi</p>";
        ?>
        <a href="index.php">Return to Home</a>
    </div>
</main>

<?php include 'footer.inc'; ?>

</body>
</html>