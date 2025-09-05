<?php
session_start();
include "../common/connection.php";
// Check if the student is logged in
if (!isset($_SESSION['sid'])) {
    header("Location: s_login.php");
    exit();
}
$sid = $_SESSION['sid'];
$book_id = $_GET['request'];
$book_name = $_GET['book_name'];
$student_name = $_SESSION['student_name'];
$request_date = date('Y-m-d');
// Insert the book request
$sql_request = "INSERT INTO book_request (sid, bid, book_name,student_name, status,request_date ) 
VALUES ('$sid', '$book_id', '$book_name', '$student_name', 'requested','$request_date')";
if (mysqli_query($db_connect, $sql_request)) {
    header("Location: student_requested_book.php?msg=Book requested successfully");
} else {
    echo "Error: " . $sql_request . "<br>" . mysqli_error($db_connect);
}
exit();
?>