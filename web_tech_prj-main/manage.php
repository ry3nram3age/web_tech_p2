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
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
        }

        h1.section-title {
            text-align: center;
            margin-top: 50px;
            font-size: 2rem;
            color: #fff;
        }

  

       fieldset {
            border: none;
            padding: 0;
        }

        legend {
            font-size: 1.5rem;
            color: #ff6600;
            margin-bottom: 25px;
            font-weight: bold;
            border-bottom: 1px solid #ff6600;
            padding-bottom: 10px;
        }

        .hr-manage-panel label {
            display: block;
            margin-top: 25px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input, select {
            width: 100%;
            padding: 12px 16px;
            background-color: #222;
            border: 1px solid #444;
            border-radius: 6px;
            color: #eee;
            font-size: 1rem;
        }

       .button-group {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 35px;
        }

        button {
            flex: 1 1 30%;
            padding: 12px 0;
            background-color: #ff6600;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e05200;
        }
        .eoi-results-table {
    margin-top: 20px;
    background-color: #111;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.eoi-results-table h2 {
    color: #fff;
    margin-bottom: 20px;
    text-align: center;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #1e1e1e;
    color: white;
    font-size: 0.95rem;
}

.styled-table th,
.styled-table td {
    border: 1px solid #333;
    padding: 12px;
    text-align: center;
}

.styled-table th {
    background-color: #ff6600;
    color: white;
}

.styled-table tr:nth-child(even) {
    background-color: #2a2a2a;
}

.btn-view {
    background-color: #1e90ff;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-approve {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    margin-left: 6px;
    cursor: pointer;
}

.btn-reject {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    margin-left: 6px;
    cursor: pointer;
}
    </style>
</head>
<body>


    <?php include 'nav.inc'; ?>

    <main>


        <section class="hr-manage-panel">
            <form action="manage.php" method="POST">
                <fieldset>
                    <legend>Search / Filter EOIs</legend>

                    <label for="job_ref">Job Reference Number:</label>
                    <input type="text" id="job_ref" name="job_ref" placeholder="e.g., 00001">

                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name">

                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name">

                    <label for="sort_field">Sort by:</label>
                    <select name="sort_field" id="sort_field">
                        <option value="eoi_id">EOI ID</option>
                        <option value="job_ref">Job Ref</option>
                        <option value="first_name">First Name</option>
                        <option value="status">Status</option>
                    </select>

                    <div class="button-group">
                        <button type="submit" name="action" value="list">List EOIs</button>
                        <button type="submit" name="action" value="delete">Delete EOIs by Job Ref</button>
                        <button type="submit" name="action" value="update_status">Update EOI Status</button>
                    </div>

                    
                </fieldset>
            </form>

            <section class="eoi-results-table">
  <h2>Manage Job Applications</h2>
  <table class="styled-table">
    <thead>
      <tr>
        <th>EOI ID</th>
        <th>Job Ref</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1001</td>
        <td>00001</td>
        <td>Ryan</td>
        <td>Smith</td>
        <td>ryan@example.com</td>
        <td>0400123456</td>
        <td>New</td>
        <td>
          <button class="btn-approve">Approve</button>
          <button class="btn-reject">Reject</button>
        </td>
      </tr>
      <tr>
        <td>1002</td>
        <td>00002</td>
        <td>Jess</td>
        <td>Brown</td>
        <td>jess@example.com</td>
        <td>0411222333</td>
        <td>Pending</td>
        <td>
          <button class="btn-approve">Approve</button>
          <button class="btn-reject">Reject</button>
        </td>
      </tr>
      <tr>
        <td>1003</td>
        <td>00001</td>
        <td>Ali</td>
        <td>Khan</td>
        <td>ali@example.com</td>
        <td>0433445566</td>
        <td>Rejected</td>
        <td>
          <button class="btn-approve">Approve</button>
          <button class="btn-reject">Reject</button>
        </td>
      </tr>
    </tbody>
  </table>
</section>
</div>
           
    
    </main>

    <?php include 'footer.inc'; ?>


</body>


</html>