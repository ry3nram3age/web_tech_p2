<?php
include_once "settings.php";
//AUTHOR - Max Dinon, 
//Security session id stuff so users cant access this page

//Form validation

// define variables and set to empty values
$jobReferenceNumber = '';
$first_name = '';
$last_name = '';
$email = '';
$dob = '';
$gender = '';
$address = '';
$suburb = '';
$state = '';
$postcode = '';
$phoneNumber = '';
$requiredTechnicalList = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jobReferenceNumber = test_input($_POST['jobReferenceNumber']);
  $first_name = test_input($_POST["firstname"]);
  $last_name = test_input($_POST["lastname"]);
  $email = test_input($_POST["email"]);
  $dob = test_input($_POST["dateOfBirth"]);
  $gender = test_input($_POST["gender"]);
  $address = test_input($_POST["address"]);
  $suburb = test_input($_POST['suburb']);
  $state = test_input($_POST['state']);
  $postcode = test_input($_POST['postcode']);
  $phoneNumber = test_input($_POST['phoneNumber']);
  $requiredTechnicalList = test_input($_POST['requiredTechnicalList']);

if (empty($jobReferenceNumber)) {
    echo "Job Reference Number is required"
elseif (empty($first_name)) {
    echo "First Name is required"
elseif (!preg_match("/^[A-Za-z]+$/", $first_name)) {
    echo "First Name can only contain letters A–Z.";
}
elseif (!preg_match("/^.{1, 30}$/", $first_name)) {
    echo "First name must be between 1 - 30 characters"
}
elseif (empty($last_name)) {
    echo "Last Name is required"
}
elseif (!preg_match("/^[A-Za-z]+$/", $last_name)) {
    echo "First Name can only contain letters A–Z.";
}
elseif (!preg_match("/^.{1, 30}$/", $last_name)) {
echo "First name must be between 1 - 30 characters"
}
elseif (empty($dob)) {
    echo "Date of Birth must be selected"
}
elseif (empty($gender)) {
    echo "A Gender must be selected"
}
elseif (empty($address)) {
    echo "An address needs to be entered"
}
}
}
  }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
