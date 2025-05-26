<?php
session_start();

// Get the name from the URL safely
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Applicant';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Submitted</title>
    <link href="styles/styles.css" rel="stylesheet">
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
            max-width: 600px;
            margin: 50px auto;
            background-color: #222;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px #000;
            text-align: center;
        }
        h1 {
            color: #ff6600;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.1rem;
        }
        a {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #e05200;
        }
    </style>
</head>
<body>

<?php include 'nav.inc'; ?>

<main>
    <h1>Thank You, <?= $name ?>!</h1>
    <p>Your application has been successfully submitted to Data Nexus.</p>
    <a href="index.php">Return to Home</a>
</main>

<?php include 'footer.inc'; ?>

</body>
</html>