<?php
require_once 'settings.php';
// AUTHOR - Max Dinon, Ryan Neill

// Security session id stuff so users can't access this page
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403);
    header("Location: direct_access_blocked.php"); // Forbidden
    exit();
}

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Max's Eoi Form 
    $jobReferenceNumber = test_input($_POST['jobReferenceNumber']);
    $first_name = test_input($_POST["firstName"]);
    $last_name = test_input($_POST["lastName"]);
    $email = test_input($_POST["email"]);
    $dob = test_input($_POST["dateOfBirth"]);
    $gender = isset($_POST['gender']) ? test_input($_POST['gender']) : '';
    $address = test_input($_POST["address"]);
    $suburb = test_input($_POST['suburb']);
    $state  = isset($_POST['state'])  ? test_input($_POST['state'])  : '';
    $postcode = test_input($_POST['postcode']);
    $phoneNumber = test_input($_POST['phoneNumber']);
    $requiredTechnicalList = test_input($_POST['requiredTechnicalList']);
    $otherSkills = test_input($_POST['otherSkills']);
    $status = "New";
}

// Ryan's Eoi Validation
if (empty($jobReferenceNumber)) {
    echo "You must enter your Job Reference Number associated with the position";
}
elseif (empty($first_name)) {
    echo "You must enter your First Name";
}
elseif (!preg_match("/^[A-Za-z]+$/", $first_name)) {
    echo "First Name can only contain letters A-Z.";
}
elseif (!preg_match("/^.{1,30}$/", $first_name)) {
    echo "First name must be between 1 - 30 characters";
}
elseif (empty($last_name)) {
    echo "You must enter your Last Name";
}
elseif (!preg_match("/^[A-Za-z]+$/", $last_name)) {
    echo "Last Name can only contain letters A-Z.";
}
elseif (!preg_match("/^.{1,30}$/", $last_name)) {
    echo "Last Name must be between 1 - 30 characters";
}
elseif (empty($dob)) {
    echo "You must select your Date of Birth";
}
elseif (empty($gender)) {
    echo "You must select a Gender";
}
elseif (empty($address)) {
    echo "An address needs to be entered";
}
elseif (empty($suburb)) {
    echo "You must enter a suburb";
}
elseif (!preg_match("/^[A-Za-z\s'\-]+$/", $suburb)) {
    echo "Suburb can only contain letters, spaces, hyphens, or apostrophes.";
}
elseif (!preg_match("/^.{2,50}$/", $suburb)) {
    echo "Suburb must be between 2 and 50 characters long.";
}
elseif (empty($state) and ($state != "VIC") and ($state != "NSW") and ($state != "QLD") and ($state != "NT") and ($state != "WA") and ($state != "SA") and ($state != "TAS") and ($state != "ACT")) {
    echo $state;
    echo "You must select a state";
}
elseif (empty($postcode)) {
    echo "You must enter your postcode";
}
elseif (!preg_match("/^[0-9]+$/", $postcode)) {
    echo "Postcode must be a number.";
}
elseif (!preg_match("/^[0-9]{1,4}$/", $postcode)) {
    echo "Postcode must be between 1 - 4 digits";
}
else {
    // Check if the table exists - Max
    $table_check_sql = "SELECT 1 FROM information_schema.tables 
                        WHERE table_schema = ? AND table_name = ? 
                        LIMIT 1";
    $check_stmt = $conn->prepare($table_check_sql);
    $table_name = 'eoi';
    $check_stmt->bind_param("ss", $database, $table_name);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows === 0) {
        // create table if it doesn't exist - Max
        $create_table_sql = "
        CREATE TABLE eoi (
        `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
        `job_reference_number` int(10) NOT NULL,
        `first_name` varchar(50) NOT NULL,
        `last_name` varchar(50) NOT NULL,
        `gender` varchar(10) NOT NULL,
        `street_address` varchar(46) NOT NULL,
        `suburb` int(60) NOT NULL,
        `state` int(3) NOT NULL,
        `postcode` varchar(4) NOT NULL,
        `email_address` varchar(360) NOT NULL,
        `phone_number` int(15) NOT NULL,
        `skills` varchar(500) NOT NULL,
        `other_skills` varchar(500) NOT NULL,
        `status` varchar(10) NOT NULL DEFAULT 'New',
        PRIMARY KEY (EOInumber)
        )";
        
        if (!mysqli_query($conn, $create_table_sql)) {
            die("Error creating table: " . mysqli_error($conn));
        }
    }

    // Max's Code to insert data into EOI table
    $sql = "INSERT INTO eoi
            (job_reference_number, first_name, last_name, gender, street_address,
            suburb, state, postcode, email_address, phone_number, skills, other_skills)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssissss",
        $jobReferenceNumber,
        $first_name,
        $last_name,
        $gender,
        $address,
        $suburb,
        $state,
        $postcode,
        $email,
        $phoneNumber,
        $requiredTechnicalList,
        $otherSkills
    );

    $stmt->execute();

    $eoiNumber = $conn->insert_id;

    $stmt->close();
    $check_stmt->close();
    $conn->close();
    header("Location: application_submission.php?name=" . urlencode($first_name) . "&eoi=".  urlencode($eoiNumber));
    exit();
}
?>