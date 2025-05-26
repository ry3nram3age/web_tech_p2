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
   
</head>
<body id="direct-access-body">
    <?php include 'nav.inc'; ?>

    <main id="direct-access-main">
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