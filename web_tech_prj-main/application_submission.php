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