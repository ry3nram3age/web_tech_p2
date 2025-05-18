<?php
include_once "settings.php";
//AUTHOR - Max Dinon, 
//Security session id stuff so users cant access this page

//Form validation

// define variables and set to empty values
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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
