<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Define document character encoding and responsive behavior -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to external CSS stylesheet for global and page-specific styles -->
    <link href="styles/styles.css" rel="stylesheet">

    <!-- Google Fonts: Poppins for modern, clean typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Search engine optimization: brief page summary -->
    <meta name="description" content="Explore Data Nexus — a leading cybersecurity company offering innovative job opportunities for future tech professionals.">

    <!-- SEO keywords to help users discover the site via search engines -->
    <meta name="keywords" content="Data Nexus, cybersecurity, tech careers, homepage, IT company, future jobs">

    <!-- Author of the HTML document -->
    <meta name="author" content="Ryan Neill, Max Dinon">

    <!-- Statement on tool usage for educational transparency -->
    <!-- USED CHATGPT TO ANALYSE THE REQUIREMENTS, TO MAKE SURE WE COVERED EVERYTHING NEEDED BY THE ASSIGNMENT -->

    <!-- Page title shown on the browser tab -->
    <title>Welcome to Data Nexus</title>
</head>
<body>

    <!-- =================== HEADER SECTION =================== -->
    <!-- Contains logo and navigation links -->
    <?php include 'nav.inc'; ?>
    

    <!-- =================== MAIN CONTENT =================== -->
    <main>

        <!-- Hero section with animated welcome message -->
        <section id="hero-intro">
            <h1 class="fade-in-up">Welcome to <span>Data Nexus</span></h1>
            <p class="fade-in-up delay-1">Discover top cybersecurity roles tailored for future professionals</p>
        </section>
          
        <!-- Highlighted navigation boxes for Jobs, Apply, About -->
        <section id="webpage-navigation-info">

          <!-- Jobs Section Box -->
          <a href="jobs.html">
            <div class="home-info-sections box-fade-in box-delay-1">
              <h2>Jobs</h2>
              <p>Explore exciting cybersecurity job opportunities across various roles and specialties.
              Whether you're just starting out or looking to advance your career, discover positions designed to grow you!</p>
            </div>
          </a>

          <!-- Apply Section Box -->
          <a href="apply.html">
            <div class="home-info-sections box-fade-in box-delay-2">
              <h2>Apply</h2>
              <p>We've simplified every step so you can focus on showcasing your strengths. Join a company that values clarity, communication, and candidates who are ready to grow.</p>
            </div>
          </a>

          <!-- About Section Box -->
          <a href="about.html">
            <div class="home-info-sections box-fade-in box-delay-3">
              <h2>About</h2>
              <p>We're a passionate group of tech enthusiasts on a mission to empower the next generation of cybersecurity professionals through innovation and mentorship.</p>
            </div>
          </a>

        </section>
    </main>

    <!-- =================== FOOTER SECTION =================== -->
    <!-- Contact info and Jira project link -->
    <?php include 'footer.inc'; ?>
    

</body>
</html>