<?php
session_start();
// UPDATE these values for your MySQL server
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'interview_portal';

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    die('DB Connection failed: ' . $conn->connect_error);
}

?>