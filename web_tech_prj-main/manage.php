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

        .hr-manage-panel {
            background-color: #111;
            border: 1px solid #ff6600;
            border-radius: 10px;
            padding: 40px;
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
            box-shadow: 0 0 15px rgba(255, 102, 0, 0.3);
        }

        .hr-manage-panel fieldset {
            border: none;
            padding: 0;
        }

        .hr-manage-panel legend {
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

        .hr-manage-panel input,
        .hr-manage-panel select {
            width: 100%;
            padding: 12px 16px;
            background-color: #222;
            border: 1px solid #444;
            border-radius: 6px;
            color: #eee;
            font-size: 1rem;
        }

        .hr-manage-panel .button-group {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 35px;
        }

        .hr-manage-panel button {
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

        .hr-manage-panel button:hover {
            background-color: #e05200;
        }
    </style>
</head>
<body>
    <?php include 'nav.inc'; ?>

    <main>
        <h1 class="section-title">Manage Job Applications</h1>

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

-!>