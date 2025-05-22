<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata and responsive viewport setup -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to external CSS and Google Fonts -->
    <link href="styles/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Algolia Places.js for address suggestions -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/places.js@1.19.0">
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

    <!-- Brief explanation of the page for search engines -->
    <meta name="description" content="Submit your job application to Data Nexus by completing our secure and easy-to-use online form.">

    <!-- Keywords related to job application and form content -->
    <meta name="keywords" content="Data Nexus, job application, apply form, cybersecurity careers, online form, personal details, technical skills">

     <!-- USED CHATGPT TO ANALYSE THE REQUIREMENTS, TO MAKE SURE WE COVERED EVERYTHING NEEDED BY THE ASSIGHMENT-->

    <!-- Author of the page -->
    <meta name="author" content="Thomas Federico">

    <title>Data Nexus Application Portal</title>
</head>

<body>

<!-- ========== HEADER ========== -->
<?php include 'nav.inc'; ?>
    

<!-- ========== MAIN CONTENT ========== -->
<main>

    <!-- Optional external JavaScript (form enhancements) -->
    <script src="javascript/main.js"></script>

    <!-- Introductory section for the form -->
    <div id="apply-title">
        
        <h1>Application Form</h1>
            This is the application form page! <br>
            All questions must be answered in full and correctly before submitting form.

    </div>

    <!-- ========== APPLICATION FORM ========== -->
    <form method="post" action="php/process_eoi.php" id="jobApplicationForm">

        <!-- Step 1: Job Reference Number -->
        <fieldset data-step="1">
            <legend>Job Reference Number</legend>
            <label for="jobReferenceNumber">Job Reference Number</label>
            <select name="jobReferenceNumber" id="jobReferenceNumber">
                <option value="">-- Select Reference --</option>
                <option value="00001">00001 - Cybersecurity Specialist</option>
                <option value="00002">00002 - Investigation Team Leader</option>
              </select>
        </fieldset>

        <!-- Step 2: Personal Information -->
        <fieldset data-step="2">
            <legend>Personal Information</legend>

            <!-- Name fields with alphabet-only patterns -->
            <div id="apply-input-fn">
                <label for="firstName">First Name</label> 
                <input type="text" name="firstName" id="firstName" placeholder="Please enter your first name" value="">
            </div>

            <div id="apply-first-ln">
                <label for="lastName">Last Name</label> 
                <input type="text" name="lastName" id="lastName" placeholder="Please enter your last name" value="">
            </div>

            <!-- Date of birth -->
            <div id="apply-input-dob">
                <label for="dateOfBirth">Date of Birth</label> 
                <input type="date" name="dateOfBirth" id="dateOfBirth" value="">
            </div>
            
            <!-- Gender radio buttons -->
            <div class="gender-radio-group">
                    <label for="gender">Gender</label>
                    Male<input type="radio" name="gender" id="male" value="Male">
                    Female<input type="radio" name="gender" id="female" value="Female">
                    Other<input type="radio" name="gender" id="other" value="Other">
            </div>
            
        </fieldset>

        <!-- Step 3: Address Information -->
        <fieldset data-step="3">
            <legend>Address</legend>

            <div class="apply-fields">
                <!-- Street address -->
                <p>
                    <label for="address">Street Address</label> 
                    <input type="text" name="address" id="address" placeholder="26 Lammington Drive" value="">
                </p>

                <!-- Suburb with validation -->
                <p>
                    <label for="suburb">Suburb / Town</label> 
                    <input type="text" name="suburb" id="suburb" placeholder="Please enter your suburb here" value="">
                </p>

                <!-- State dropdown -->
                <p>
                    <label for="state">State</label>
                    <select name="state" id="state">
                        <option value="" disabled selected>-- Select State --</option>
                        <option value="NSW">NSW</option>
                        <option value="VIC">VIC</option>
                        <option value="QLD">QLD</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                        <option value="NT">NT</option>
                    </select>
                </p>

                <!-- Postcode must be 4 digits -->
                <p>
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" placeholder="Please enter your postcode here" value="">
                </p>
            </div>
        </fieldset>

        <!-- Step 4: Contact Information -->
        <fieldset data-step="4">
            <legend>Contact Information</legend>

            <!-- Email with HTML5 pattern validation -->
            <p>
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" placeholder="Please enter your email address here" value="">
            </p>

            <!-- Australian phone number pattern -->
            <p>
                <label for="phoneNumber">Phone Number</label>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Please enter your phone number here" value="">
            </p>
        </fieldset>

        <!-- Step 5: Skills and Additional Info -->
        <fieldset data-step="5">
            <legend>Other Important Information</legend>

            <p>
                <label for="requiredTechnicalList">Required Technical Skills</label>
                <textarea name="requiredTechnicalList" id="requiredTechnicalList" placeholder="Please enter your technical skills here"></textarea>
            </p>

            <p>
                <label for="otherSkills">Other Skills</label>
                <textarea name="otherSkills" id="otherSkills" placeholder="Please enter any other relevant skills here"></textarea>
            </p>
        </fieldset>

        <!-- Submit and Reset buttons -->
        <input type="submit" value="Register">
        <input type="reset" value="Reset Form">
    </form>
</main>

<!-- ========== FOOTER ========== -->
<?php include 'footer.inc'; ?>
</body>
</html>