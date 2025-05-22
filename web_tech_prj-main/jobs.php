<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== META INFORMATION ========== -->
    <!-- Character encoding and responsive scaling -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO: Page description and keywords -->
    <meta name="description" content="DataNexus's CyberSec Job availability and descriptions">
    <meta name="keywords" content="HTML, CSS">

    <!-- USED CHATGPT TO ANALYSE THE REQUIREMENTS, TO MAKE SURE WE COVERED EVERYTHING NEEDED BY THE ASSIGNMENT -->
    
    <!-- Author of the page -->
    <meta name="author" content="Max Dinon">

    <!-- ========== STYLESHEETS AND FONTS ========== -->
    <!-- External CSS and Google Fonts -->
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Page title shown in browser tab -->
    <title>Data Nexus Open Vacancies</title>
</head>

<body>

    <!-- ========== HEADER SECTION ========== -->
    <!-- Contains the site logo and main navigation -->
    <?php 
    include 'nav.inc';
    require_once 'settings.php'; 
    ?>
    
    <!-- ========== MAIN SECTION: JOB LISTINGS ========== -->
    <main>
        <section id="jobs">

            <!-- Jobs Page Heading -->
            <h1>Jobs</h1>

            <!-- ========== ASIDE: WHY WORK FOR US ========== -->
            <aside>
                <h2>Why work for us?</h2>
                <ol>
                    <li>Competitive pay</li>
                    <li>Industry leading teams</li>
                    <li>Opportunities for career progression</li>
                    <li>Outstanding performance</li>
                </ol>
            </aside>

            <!-- ========== JOB 1: CYBERSECURITY SPECIALIST ========== -->

            
                <?php
                function put_in_list($str) {
                                        echo "<ul>";
                    $strArr = [];
                    $strArr = explode(". ", $str);
                    foreach ($strArr as $sentence) {
                        echo "<li>" . $sentence . "</li>";
                    }
                    echo "</ul>";

                }

                class Jobs {
                   public $job_id;
                   public $position;
                   public $company;
                   public $location;
                   public $salary;
                   public $id;
                   public $description;
                   public $responsibilities;
                   public $essential_qualifications;
                   public $preferable_qualifications;
                   public $languages;
                } 
                $sql = "SELECT * FROM jobs";
                $result = mysqli_query($conn, $sql);

                $jobs = [];

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $job = new Jobs();

                        // Manually assign each known column to the object
                        $job->id = $row['id'];
                        $job->position = $row['position'];
                        $job->company = $row['company'];
                        $job->location = $row['location'];
                        $job->salary = $row['salary'];
                        $job->description = $row['description'];
                        $job->responsibilities = $row['responsibilities'];
                        $job->essential_qualifications = $row['essential_qualifications'];
                        $job->preferable_qualifications = $row['preferable_qualifications'];
                        $job->languages = $row['languages'];

                        $jobs[] = $job;
                    }
                }

                // Output using while loop (no foreach)
                $i = 0;
                while ($i < count($jobs)) {
                    $job = $jobs[$i];
                    //    Dynamic Job Position Info page
                    echo "<section id='investigation_team_leader_position'>";
                    echo "<h2>" . $job->position ."</h2>";
                    echo "<h3>Brief Description</h3>";
                    echo "<ul>";
                    echo "<li>Job Title: " . $job->position . "</li>";
                    echo "<li>Company: " . $job->company . "</li>";
                    echo "<li>Location: " . $job->location . "</li>";
                    echo "<li>Salary Range: " . $job->salary . "</li>";
                    echo "<li>Job Reference ID: " . $job->id . "</li>";
                    echo "</ul>";
                    echo "<h3>Job Description:</h3>";
                    echo "<p>" . $job->description . "</p>";
                    echo "<h3>Key Job Responsibilities:</h3>";
                    put_in_list($job->responsibilities);
                    echo "<h3>Qualifications Required:</h3>";
                    echo "<h4>Essential:</h4>";
                    put_in_list($job->essential_qualifications);
                    echo "<h4>Preferable:</h4>";
                    put_in_list($job->preferable_qualifications);
                    echo "<h4>Languages Required:</h4>";
                    put_in_list($job->languages);
                    echo "<a href='apply.php' id='jobs-apply2'>APPLY</a>";
                    echo "</section>";
                    $i++;
                }
               
                ?>
    </main>

<?php 
include 'footer.inc';
require_once 'settings.php';  
?>
</body>
</html>