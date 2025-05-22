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

  <h2>Manage Job Applications</h2>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>EOI ID</th>
          <th>Job Ref</th>
          <th>Applicant Name</th>
          <th>Email</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1001</td>
          <td>00001</td>
          <td>Max Dinon</td>
          <td>max@example.com</td>
          <td>New</td>
          <td class="actions">
            <button class="view-btn">View</button>
            <button class="approve-btn">Approve</button>
            <button class="reject-btn">Reject</button>
          </td>
        </tr>
        <!-- More rows will be generated in PHP -->
      </tbody>
    </table>
  </div>
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

-->
