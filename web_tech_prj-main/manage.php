<!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Metadata for proper character encoding and responsive behavior -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- External stylesheet for consistent styling -->
        <link href="styles/styles.css" rel="stylesheet">

        <!-- Google Fonts for modern typography -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <!-- Description -->
        <meta name="description" content="">

        <!-- Keywords -->
        <meta name="keywords" content="Data Nexus, HR, Human Resources">

        <!-- USED CHATGPT TO ANALYSE THE REQUIREMENTS, TO MAKE SURE WE COVERED EVERYTHING NEEDED BY THE ASSIGHMENT-->

        <!-- Author of the page -->
        <meta name="author" content="Thomas Federico">

        <!-- Temp Name -->
        <title>Data Nexus - Human Resources Manegment</title>
    </head>

<!-------- HEADER --------->
<?php include 'includes/header.inc'; ?>

<!------------------------->

<!---------- BODY --------->
    <body>
        <h1>Human Resources Manegment Quearies<h1>
        <b>Content Goes Here (Placeholder)</b>
<!-- Checkbox Options: List All EOIS, List EOIS for A Perticular Position, List all EOIs for a particular applicant given their first name, last name or both. -->
<!-- Option to delete all eois, change status of eois. -->
 <p>Option</p>
             <div class="radioBawtoens">
                <div id="option" class="radio">
                    <label for="listAllEOIs">List All EOIs</label>
                    <input type="radio" name="option" id="listAllEOIs" value="listAllEOIs">
                </div>
                <div id="option" class="radio">
                    <label for="listAllEOIsPosition">List All EOIs by Position</label>
                    <input type="radio" name="option" id="listAllEOIsPosition" value="listAllEOIsPosition">
                </div>
                <div id="option" class="radio">
                    <label for="listAllEOIsName">List All EOIs by Name</label>
                    <input type="radio" name="option" id="listAllEOIsName" value="listAllEOIsName">
                </div>
                <div id="option" class="radio">
                    <label for="deleteEOIs">Delete EOIs</label>
                    <input type="radio" name="option" id="deletEOIs" value="deletEOIs">
                </div>
            </div>

        <b>Job Reference Number</b>
        <b>List of EOIs</b>
    </body>
<!------------------------->

<!-------- FOOTER --------->
<?php include 'includes/footer.inc'; ?>
<!------------------------->
</html>


<!--------- TASKS AND INFO FOR ME ---------

5. HR manager queries (manage.php)
Create a web page manage.php that allows a manager to make the following queries of
the eoi table and returns a web page with the appropriate results.
    • List all EOIs.
    • List all EOIs for a particular position (given a job reference number).
    • List all EOIs for a particular applicant given their first name, last name or both.
    • Delete all EOIs with a specified job reference number
    • Change the Status of an EOI.
    • Provide the manager with the ability to select the field on which to sort the order in

which the EOI records are displayed.
    • Create a manager registration page with server side validation requiring unique

username and a password rule, and store this information in a table.
    • Control access to manage.php by checking username and password.
    • Have access to the web site disabled for user a period of time on, say, three or more
      invalid login attempts.

-!>