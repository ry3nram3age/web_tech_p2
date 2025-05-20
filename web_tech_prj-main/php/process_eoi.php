<?php

//AUTHOR - Max Dinon, Ryan Neill
//Security session id stuff so users cant access this page
function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $jobReferenceNumber = test_input($_POST['jobReferenceNumber']);
  $first_name = test_input($_POST["firstName"]);
  $last_name = test_input($_POST["lastName"]);
  $email = test_input($_POST["email"]);
  $dob = test_input($_POST["dateOfBirth"]);
  $gender = test_input($_POST["gender"]);
  $address = test_input($_POST["address"]);
  $suburb = test_input($_POST['suburb']);
  $state = test_input($_POST['state']);
  $postcode = test_input($_POST['postcode']);
  $phoneNumber = test_input($_POST['phoneNumber']);
  $requiredTechnicalList = test_input($_POST['requiredTechnicalList']);
  $otherSkills = test_input($_POST['otherSkills']);

  if (empty($jobReferenceNumber)) 
    {
        echo "You must enter your Job Reference Number associated with the position";
        }
        elseif (empty($first_name)) 
        {
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
        elseif (!preg_match("/^[0-9]{1,5}[A-Za-z]?\s[A-Za-z\s]{2,50}$/", $address)) {
            echo "Address needs to be in the form 123 Main Street, 12B Victoria Rd";
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
        elseif (empty($state)) {
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
            //Max's form submission code to the EOI db
            $query = "INSERT INTO `expressions_of_interest`(`job_reference_number`, `first_name`, `last_name`,`gender`, `street_address`, `suburb`, `state`, `postcode`, `email address`, `phone_number`, `skills`, `other_skills`) VALUES $jobReferenceNumber, $first_name, $last_name, $gender, $address, $suburb, $state, $postcode, $email, $phoneNumber, $requiredTechnicalList, $otherSkills)";
            mysqli_query($conn, $query);

        }
    }

?>