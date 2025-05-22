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

            <section id="cybersecurity_specialist_position">
                <?php
                
                class Jobs {
                   public $job_id;
                   public $position;
                   public $company;
                   public $location;
                   public $salary;
                   public $id;
                   public $description;
                   public $responsibilities;
                   public $qualifications;
                   public $experience;
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
                        $job->qualifications = $row['qualifications'];
                        $job->experience = $row['experience'];
                        $job->languages = $row['languages'];

                        $jobs[] = $job;
                    }
                }

                // Output using while loop (no foreach)
                $i = 0;
                while ($i < count($jobs)) {
                    $job = $jobs[$i];
                    //                <!-- Overview Info -->
                    echo "<h2>Cybersecurity Specialist</h2>";
                    echo "<h3>Brief Description</h3>";
                    echo "<ul>";
                    echo "<li>Job Title: " . $job->position . "</li>";
                    echo "<li>Company: " . $job->company . "</li>";
                    echo "<li>Location: " . $job->location . "</li>";
                    echo "<li>Salary Range: " . $job->salary . "</li>";
                    echo "<li>Job Reference ID: " . $job->id . "</li>";
                    echo "</ul>";
                    echo "<br>";
                    echo "<h3>Job Description:</h3>";
                    echo "<p>" . $job->description . "</p>";
                    echo "<h3>Key Job Responsibilities:</h3>";
                    echo "<ul>";
                    $i++;
                }
                
                ?>
                




                <!-- Role Summary -->
                <h3>Job Description:</h3>
                <p>The Cybersecurity Specialist at DataNexus's CyberSec will play a key role in safeguarding our clients' digital assets by identifying vulnerabilities, implementing security protocols, and responding to incidents. You will work with advanced technologies to ensure robust security across systems and networks.</p>

                <!-- Responsibilities -->
                <h3>Key Job Responsibilities:</h3>
                <ul>
                    <li>Perform vulnerability assessments and penetration testing.</li>
                    <li>Lead incident response and security breach resolution.</li>
                    <li>Design and implement secure networks and systems.</li>
                    <li>Monitor security alerts and proactively defend against cyber threats.</li>
                    <li>Conduct security audits and provide recommendations for improvements.</li>
                </ul>

                <!-- Required Skills -->
                <h3>Qualifications Required:</h3>
                <h4>Essential:</h4>
                <ul>
                    <li>3+ years of hands-on cybersecurity experience.</li>
                    <li>Strong knowledge of network protocols, firewalls, and security tools.</li>
                    <li>Certifications: CISSP, CEH, CompTIA Security+, or equivalent.</li>
                    <li>Experience with security platforms like Splunk, Nessus, or Wireshark.</li>
                    <li>Excellent problem-solving and communication skills.</li>
                </ul>

                <h4>Preferable:</h4>
                <ul>
                    <li>Experience in a Security Operations Center (SOC).</li>
                    <li>Advanced certifications (e.g., CISM, CCSP, OSCP).</li>
                    <li>Programming knowledge (Python, PowerShell, Bash).</li>
                    <li>Experience with cloud security (AWS, Azure, GCP).</li>
                </ul>

                <!-- Language Requirements -->
                <h4>Languages Required:</h4>
                <ul>
                    <li>English (fluent, written and spoken).</li>
                    <li>Additional languages (Spanish, Mandarin) are a plus.</li>
                </ul>

                <!-- Apply Now Button -->
                <a href="apply.html" id="jobs-apply1">APPLY</a>
            </section>

            <!-- ========== JOB 2: INVESTIGATION TEAM LEADER ========== -->
            <section id="investigation_team_leader_position">
                <h2 id="investigation_team_leader">Investigation Team Leader</h2>

                <!-- ChatGPT-assisted content generation -->
                <!-- Prompt used:
                     Can you write a brief description for an Investigation Leader position within DataNexus's CyberSec small company.
                     include job descri
                          require_once 'settings.php'; 
                     ption, salary range, key responsibilities, essential and preferable qualifications, and required languages.
                -->

                <!-- Overview Info -->
                <h3>Brief Description</h3>
                <ul>
                    <li>Job Title: Investigation Team Leader</li>
                    <li>Company: DataNexus's CyberSec</li>
                    <li>Location: Melbourne HQ</li>
                    <li>Salary Range:public $
                    <li>Job Reference ID: 00002</li>=
                </ul>

                <!-- Role Summary -->
                <h3>Job Description:</h3>
                <p>The Investigation Leader will be responsible for overseeing cybersecurity investigations related to incident response, digital forensics, and threat analysis. They will lead a team to identify and mitigate cybersecurity threats while ensuring the integrity of digital evidence and maintaining a high standard of investigative practices.</p>

                <!-- Responsibilities -->
                <h3>Key Job Responsibilities:</h3>
                <ul>
                    <li>Lead and manage cybersecurity investigations.</li>
                    <li>Collaborate with internal cybersecurity teams.</li>
                    <li>Analyze and document findings.</li>
                    <li>Ensure digital evidence complies with legal standards.</li>
                    <li>Mentor junior investigators.</li>
                    <li>Stay updated on current trends.</li>
                </ul>

                <!-- Required Skills -->
                <h3>Qualifications Required:</h3>
                <h4>Essential:</h4>
                <ul>
                    <li>Bachelor's degree in Cybersecurity, IT, or related field.</li>
                    <li>5+ years experience in cybersecurity investigations.</li>
                    <li>Proven leadership experience.</li>
                    <li>Knowledge of cybersecurity frameworks/tools.</li>
                    <li>Strong analytical and communication skills.</li>
                </ul>

                <h4>Preferable:</h4>
                <ul>
                    <li>Master's degree in Cybersecurity or related field.</li>
                    <li>Relevant certifications (e.g. CEH, CISSP, CCFP).</li>
                    <li>Experience with cloud security.</li>
                    <li>Familiarity with malware analysis.</li>
                </ul>

                <!-- Language Requirements -->
                <h3>Languages Required:</h3>
                <ul>
                    <li>English (fluent, both written and spoken).</li>
                    <li>Additional languages (Spanish, French, Mandarin) are a plus.</li>
                </ul>

                <!-- Apply Now Button -->
                <a href="apply.html" id="jobs-apply2">APPLY</a>
            </section>
        </section>
    </main>

    <!-- ========== FOOTER SECTION ========== -->
    <!-- Contains Jira link and contact info -->
    <?php include 'footer.inc';
          require_once 'settings.php';  ?>
    

</body>
</html>