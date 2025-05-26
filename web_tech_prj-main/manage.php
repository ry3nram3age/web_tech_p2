<?php
#session_start();
#
#if (!isset($_SESSION['username'])) {
#    // Block access if not logged in
#    header('Location: prohibited.php');
#    exit();
#}
##?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="description" content="HR management interface for handling job applications at Data Nexus.">
    <meta name="keywords" content="Data Nexus, HR, manage applications, EOIs">
    <meta name="author" content="Thomas Federico">
    <title>Data Nexus - HR Management</title>
    <style>
main {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 30px;
  padding: 20px;
  max-width: 1400px;
  margin: 0 auto;
  flex-wrap: wrap;
}

.filter-form {
  flex: 1 1 450px;
  max-width: 500px;
  background-color: #111;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px #000;
}

.filter-form form {
  display: flex;
  flex-direction: column;
}

.filter-form button {
  width: 100%;
  margin-top: 10px;
}

.styled-table {
  width: 100%;
  border-collapse: collapse;
  background-color: #1e1e1e;
  color: white;
  font-size: 0.85rem;
}

.styled-table th,
.styled-table td {
  border: 1px solid #333;
  padding: 6px 8px;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 150px;
}

.styled-table th {
  background-color: #ff6600;
}

.styled-table td:hover {
  white-space: normal;
  overflow: visible;
  text-overflow: unset;
}

.styled-table thead th {
  position: sticky;
  top: 0;
  background-color: #ff6600;
  z-index: 1;
}

.stylef-table tbody tr:nth-child(even) {
  background-color: #2a2a2a;
}

.styled-table tbody tr:hover {
  background-color: #333333;
  cursor: pointer;
}
.results-table h2 {
  text-align: center;
}

.results-table {
  flex: 1;
  max-width: 900px;
  background-color: #111;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px #000;
  overflow-x: scroll;
}

.filter-form h2 {
  text-align: center;
  padding-bottom: 2rem;
}

.btn-approve, .btn-reject, .btn-view {
  padding: 4px 8px;
  font-size: 0.8rem;
  margin: 0 2px;
  border-radius: 4px;
}
  </style>
</head>

<body>

<?php include 'nav.inc'; ?>

<main>
  <section class="filter-form">
    <h2>Search / Filter EOIs</h2>
    <form action="manage.php" method="POST">
      <label for="job_ref">Job Reference Number</label>
      <input type="text" id="job_ref" name="job_ref" placeholder="e.g., 00001">

      <label for="first_name">First Name</label>
      <input type="text" id="first_name" name="first_name">

      <label for="last_name">Last Name</label>
      <input type="text" id="last_name" name="last_name">

      <label for="sort_field">Sort by</label>
      <select name="sort_field" id="sort_field">

        <option value="eoi_id">EOI ID</option>
        <option value="job_ref">Job Ref</option>
        <option value="first_name">First Name</option>
        <option value="status">Status</option>
      </select>

      <button type="submit" name="action" value="list">List EOIs</button>
      <button type="submit" name="action" value="delete">Delete EOIs by Job Ref</button>
      <button type="submit" name="action" value="update_status">Update EOI Status</button>
    </form>

    <a href="logout.php">Logout</a>


    
  </section>


  <section class="results-table">
    <h2>Results Table</h2>
       <table class="styled-table">
      <?php
      require_once("settings.php");

      $sql = "SELECT * FROM jobs";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          echo "<thead><tr>";
          $fields = mysqli_fetch_fields($result);
          foreach ($fields as $field) {
              echo "<th>" . htmlspecialchars($field->name) . "</th>";
          }
          echo "</tr></thead><tbody>";

          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              foreach ($fields as $field) {
                  $columnName = $field->name;
                  echo "<td>" . htmlspecialchars($row[$columnName]) . "</td>";
              }
              echo "</tr>";
          }

          echo "</tbody>";
      } else {
          echo "<tr><td colspan='100%'>🚫 Database not found.</td></tr>";
      }

      mysqli_close($conn);
      ?>
    </table>

   
  </section>
</main>

<?php include 'footer.inc'; ?>

</body>
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

      