<?php

$name = $_POST['name'];
$course = $_POST['course'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];
$rollNumber = $_POST['rollNumber'];
$admissionDate = $_POST['admissionDate'];

// HTML output for the confirmation form
$output = "<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>Admission Confirmation</title>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>

                <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f2f2f2;
                }
                
                .container {
                    max-width: 800px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }
                
                h1,
                h2,
                h3 {
                    color: #007bff;
                }
                
                .form-group {
                    margin-bottom: 15px;
                    text-align: left;
                }
                
                label {
                    display: inline-block;
                    width: 150px;
                    font-weight: bold;
                }
                
                span {
                    display: inline-block;
                    width: 200px;
                }
                
                button {
                    display: block;
                    width: 100%;
                    padding: 10px;
                    border: none;
                    border-radius: 4px;
                    background-color: #007bff;
                    color: #fff;
                    font-size: 16px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }
                
                button:hover {
                    background-color: #0056b3;
                }
                
                @media (max-width: 600px) {
                    .container {
                        padding: 10px;
                    }
                
                    label,
                    span {
                        display: block;
                        width: auto;
                    }
                }
                
                </style>
            </head>
            <body>
                <div class=\"container\">
                    <h1>Government Degree College Indora</h1>
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
                        <label for=\"subject1\">Subject 1:</label>
                        <span id=\"subject1\">$subject1</span>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"subject2\">Subject 2:</label>
                        <span id=\"subject2\">$subject2</span>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"subject3\">Subject 3:</label>
                        <span id=\"subject3\">$subject3</span>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"subject4\">Subject 4:</label>
                        <span id=\"subject4\">$subject4</span>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"subject5\">Subject 5:</label>
                        <span id=\"subject5\">$subject5</span>
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
                    <button id=\"downloadBtn\" onclick=\"downloadPDF()\">Download as PDF</button>
                    <script>
                    function downloadPDF() {
                        // Get the container element
                        const container = document.querySelector('.container');
                    
                        // Use HTML2Canvas to capture the content of the container as an image
                        html2canvas(container).then(canvas => {
                            // Convert the canvas to a data URL
                            const imgData = canvas.toDataURL('image/png');
                    
                            // Initialize jsPDF
                            const pdf = new jsPDF('p', 'mm', 'a4');
                    
                            // Add the image to the PDF
                            pdf.addImage(imgData, 'PNG', 0, 0, 210, 297); // Adjust dimensions as needed
                    
                            // Save the PDF
                            pdf.save('content.pdf');
                        });
                    }
                    </script>
                </div>
                
                <script src=\"/web/script/pdf.js\"></script>
            </body>
            </html>";

// Output the dynamic HTML
echo $output;

?>
