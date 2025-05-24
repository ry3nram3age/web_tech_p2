




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
  max-width: 700px;
  border-collapse: collapse;
  table-layout: fixed; /* let content define width */
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
}

.styled-table th {
  background-color: #ff6600;
}

.results-table h2 {
  text-align: center;
}

.styled-table td {
  max-width: 200px;
  word-wrap: break-word;
  overflow-wrap: break-word;
}

.styled-table th:nth-child(1),
.styled-table td:nth-child(1) {
  width: 60px;  /* EOI ID */
}
.styled-table th:nth-child(2),
.styled-table td:nth-child(2) {
  width: 80px;  /* Job Ref */
}
.styled-table th:nth-child(3),
.styled-table td:nth-child(3),
.styled-table th:nth-child(4),
.styled-table td:nth-child(4) {
  width: 120px;  /* First and Last Name */
}
.styled-table th:nth-child(5),
.styled-table td:nth-child(5) {
  width: 200px;  /* Email */
}

.results-table {
  flex: 1;
  max-width: 900px;
  background-color: #111;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px #000;
  overflow-x: auto;
  margin: 0 auto;
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
  </section>

  <section class="results-table">
    <h2>Results Table</h2>
    <table class="styled-table">

      <?php
require_once("settings.php");

$sql = "SELECT * FROM eoi";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5'>";
    
    // DYNAMICALLY FETCH COLUMN NAMES
    $fields = mysqli_fetch_fields($result);
    echo "<tr>";
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }
    echo "</tr>";
    
    // FETCH DATA ROWS
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($fields as $field) {
            $columnName = $field->name;
            echo "<td>" . htmlspecialchars($row[$columnName]) . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "🚫 Database not found.";
}

mysqli_close($conn);
?>
      </tbody>
    </table>
  </section>
</main>

<?php include 'footer.inc'; ?>


</body>




</html>