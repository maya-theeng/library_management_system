<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../admin/a_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="main">
        <nav>
            <div><h2 class="logo">GP<span>LIBRARY</span></h2></div>
            <div>
                <ul>
                    <li><a href="admin_dashboard.php">Dashboard</a></li>
                    <li><a href="addbook.php">Add Book</a></li>
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li><a href="addadmin.php">Add Admin</a></li>
                    <li><a href="book_list.php">Books</a></li>
                    <li><a href="student_info.php">Students</a></li>
                    <li><a href="manage_request.php">Requests</a></li>
                    <li><a href="book_issue_list.php">Issued Books</a></li>
                    <li><a href="returned_books.php">Returned Books</a></li>
                    <li><a href="notification.php">Notifications</a></li>
                    <li><a href="../common/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>