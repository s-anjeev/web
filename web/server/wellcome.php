<?php
// Include the database connection file
require_once "db_connect.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $course = $_POST["preferredStream"];
    $subjects = $_POST["subject1"] . ", " . $_POST["subject2"] . ", " . $_POST["subject3"];
    $rollNumber = ""; // You need to implement a way to generate roll numbers
    $admissionDate = date("F j, Y"); // Current date

    // HTML output for the confirmation form
    $output = "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <meta charset=\"UTF-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <title>Admission Confirmation</title>
                    <link rel=\"stylesheet\" href=\"/web/style/output_form_css.css\">
                </head>
                <body>
                    <div class=\"container\">
                        <h1>College Name</h1>
                        <h2>Admission Confirmation</h2>
                        <p>Congratulations! You are now officially enrolled in our college.</p>
                        <h3>Student Information</h3>
                        <div class=\"form-group\">
                            <label for=\"studentName\">Name:</label>
                            <span id=\"studentName\">$name</span>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"course\">Course Selected:</label>
                            <span id=\"course\">$course</span>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"subjects\">Subjects:</label>
                            <span id=\"subjects\">$subjects</span>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"rollNumber\">Roll Number:</label>
                            <span id=\"rollNumber\">$rollNumber</span>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"admissionDate\">Admission Date:</label>
                            <span id=\"admissionDate\">$admissionDate</span>
                        </div>
                        <p>Welcome to our college!</p>
                        <button id=\"downloadBtn\">Download as PDF</button>
                    </div>
                    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js\"></script>
                    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js\"></script>
                    <script src=\"/web/script/output_form_script.js\"></script>
                </body>
                </html>";

    // Output the dynamic HTML
    echo $output;
} else {
    // Redirect back to the form page if form submission method not allowed
    header("Location: previous_form_page.php?error=" . urlencode("Form submission method not allowed"));
    exit();
}
?>
