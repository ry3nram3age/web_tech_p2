<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enhancements - Data Nexus</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php include 'nav.inc'; ?>

<main id="enhancements-main">
    <h2>Enhancements Implemented</h2>
    <ul>
    <li>Added a manager registration page with server-side validation and unique username checking.</li>
    <li>Implemented access control so only logged-in managers can access manage.php (protected pages).</li>
    <li>Added a login attempt lockout system to prevent brute-force attacks after multiple failed logins.</li>
    <li>Enabled the manager to sort and search EOI records by job reference, first name, or last name.</li>
</ul>
</main>

<?php include 'footer.inc'; ?>
</body>
</html>