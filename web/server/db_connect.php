<?php
// Function to establish database connection
    function db_connect() {
    // Database connection parameters
    $host = "localhost"; // Host name
    $username = "root"; // MySQL username
    $password = ""; // MySQL password, leave it empty if you're using the root user

    // Establishing connection
    $conn = new mysqli($host, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS admission";
    if ($conn->query($sql_create_db) === TRUE) {
        // echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Select the created database
    $conn->select_db("admission");

    // SQL to create table
    $sql_create_table = "CREATE TABLE IF NOT EXISTS student_details (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        father_name VARCHAR(255) NOT NULL,
        mother_name VARCHAR(255) NOT NULL,
        dob DATE NOT NULL,
        adhar_no VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        mobile VARCHAR(15) NOT NULL,
        gender VARCHAR(10) NOT NULL,
        religion VARCHAR(50) NOT NULL,
        village VARCHAR(255) NOT NULL,
        post_office VARCHAR(255) NOT NULL,
        tehsil VARCHAR(255) NOT NULL,
        district VARCHAR(255) NOT NULL,
        state VARCHAR(255) NOT NULL,
        pincode VARCHAR(10) NOT NULL,
        stream VARCHAR(50) NOT NULL,
        subject1_code VARCHAR(50) NOT NULL,
        subject1_title VARCHAR(255) NOT NULL,
        subject2_code VARCHAR(50) NOT NULL,
        subject2_title VARCHAR(255) NOT NULL,
        subject3_code VARCHAR(50) NOT NULL,
        subject3_title VARCHAR(255) NOT NULL,
        subject4_code VARCHAR(50) NOT NULL,
        subject4_title VARCHAR(255) NOT NULL,
        subject5_code VARCHAR(50) NOT NULL,
        subject5_title VARCHAR(255) NOT NULL,
        10th_board VARCHAR(255) NOT NULL,
        10th_marks FLOAT NOT NULL,
        10th_total_marks FLOAT NOT NULL,
        10th_roll_number VARCHAR(255) NOT NULL,
        10th_class VARCHAR(50) NOT NULL,
        12th_board VARCHAR(255) NOT NULL,
        12th_marks FLOAT NOT NULL,
        12th_total_marks FLOAT NOT NULL,
        12th_roll_number VARCHAR(255) NOT NULL,
        12th_class VARCHAR(50) NOT NULL
    )";

    // Execute query to create table
    if ($conn->query($sql_create_table) === TRUE) {
        // echo "Table student_details created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Return the connection object
    return $conn;

    }

?>
