<?php

// Include the database connection file
require_once "db_connect.php";

// Establish a database connection
$conn = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Information
    $name = sanitizeInput($_POST["name"]);
    $fatherName = sanitizeInput($_POST["fatherName"]);
    $motherName = sanitizeInput($_POST["motherName"]);
    $dob = sanitizeInput($_POST["dob"]);
    $adharNo = sanitizeInput($_POST["adharNo"]);
    $email = sanitizeInput($_POST["email"]);
    $mobile = sanitizeInput($_POST["mobile"]);
    $gender = sanitizeInput($_POST["gender"]);
    $religion = sanitizeInput($_POST["religion"]);

    // Address
    $village = sanitizeInput($_POST["village"]);
    $postOffice = sanitizeInput($_POST["postOffice"]);
    $tehsil = sanitizeInput($_POST["tehsil"]);
    $district = sanitizeInput($_POST["district"]);
    $state = sanitizeInput($_POST["state"]);
    $pincode = sanitizeInput($_POST["pincode"]);

    // Subject Details
    $course = sanitizeInput($_POST["stream"]);
    $subject1_code = sanitizeInput($_POST["subject1_code"]);
    $subject1_title = sanitizeInput($_POST["subject1_title"]);
    $subject2_code = sanitizeInput($_POST["subject2_code"]);
    $subject2_title = sanitizeInput($_POST["subject2_title"]);
    $subject3_code = sanitizeInput($_POST["subject3_code"]);
    $subject3_title = sanitizeInput($_POST["subject3_title"]);
    $subject4_code = sanitizeInput($_POST["subject4_code"]);
    $subject4_title = sanitizeInput($_POST["subject4_title"]);
    $subject5_code = sanitizeInput($_POST["subject5_code"]);
    $subject5_title = sanitizeInput($_POST["subject5_title"]);

    // Academic Details
    $tenth_board = sanitizeInput($_POST["10th_board"]);
    $tenth_marks = sanitizeInput($_POST["10th_marks"]);
    $tenth_total_marks = sanitizeInput($_POST["10th_total_marks"]);
    $tenth_roll_number = sanitizeInput($_POST["10th_roll_number"]);
    $tenth_class = sanitizeInput($_POST["10th_class"]);

    $twelfth_board = sanitizeInput($_POST["12th_board"]);
    $twelfth_marks = sanitizeInput($_POST["12th_marks"]);
    $twelfth_total_marks = sanitizeInput($_POST["12th_total_marks"]);
    $twelfth_roll_number = sanitizeInput($_POST["12th_roll_number"]);
    $twelfth_class = sanitizeInput($_POST["12th_class"]);

    // Further processing or storing the data can be done here

    // // Redirecting to a thank you page after successful submission
    // header("Location: thankyou.html");
    // exit();
}

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// SQL query to insert data into student_details table
$sql_insert = "INSERT INTO student_details (name, father_name, mother_name, dob, adhar_no, email, mobile, gender, religion, village, post_office, tehsil, district, state, pincode, stream, subject1_code, subject1_title, subject2_code, subject2_title, subject3_code, subject3_title, subject4_code, subject4_title, subject5_code, subject5_title, 10th_board, 10th_marks, 10th_total_marks, 10th_roll_number, 10th_class, 12th_board, 12th_marks, 12th_total_marks, 12th_roll_number, 12th_class) 
VALUES ('$name', '$fatherName', '$motherName', '$dob', '$adharNo', '$email', '$mobile', '$gender', '$religion', '$village', '$postOffice', '$tehsil', '$district', '$state', '$pincode', '$course', '$subject1_code', '$subject1_title', '$subject2_code', '$subject2_title', '$subject3_code', '$subject3_title', '$subject4_code', '$subject4_title', '$subject5_code', '$subject5_title', '$tenth_board', '$tenth_marks', '$tenth_total_marks', '$tenth_roll_number', '$tenth_class', '$twelfth_board', '$twelfth_marks', '$twelfth_total_marks', '$twelfth_roll_number', '$twelfth_class')";

// Execute query
if ($conn->query($sql_insert) === TRUE) {
    // Get current date
    $admissionDate = date("Y-m-d");

    $rollno = 10002;

    // Data to be sent
    $data_to_send = array(
        'name' => $name,
        'course' => $course,
        'subject1' => $subject1_code,
        'subject2' => $subject2_code,
        'subject3' => $subject3_code,
        'subject4' => $subject4_code,
        'subject5' => $subject5_code,
        'rollNumber' => $rollno,
        'admissionDate' => $admissionDate
    );

    // Encode data
    $data_encoded = http_build_query($data_to_send);

    // URL of b.php
    $url = 'http://localhost/programs/web/server/wellcome.php'; // Adjust the URL accordingly

    // Send POST request to b.php
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $data_encoded
        )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    // Output received data
    echo $response;

} else {
    // Redirect to error.php
    header("Location: error.php");
    exit();
}

// Close connection
// $conn->close();
?>
