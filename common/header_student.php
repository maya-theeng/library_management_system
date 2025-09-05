<?php
session_start();
if (!isset($_SESSION['sid'])) {
    header("Location: ../student/s_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="main">
        <nav>
            <div><h2 class="logo">GP<span>LIBRARY</span></h2></div>
            <div>
                <ul>
                    <li><a href="stud_dashboard.php">Dashboard</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="borrowed_books.php">Borrowed Books</a></li>
                    <li><a href="notifications.php">Notifications</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="../common/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>