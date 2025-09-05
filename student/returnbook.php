<?php
session_start();
include "../common/connection.php";
// include "stud_dashboard.html";
$sid = $_SESSION['sid'];
$student_name = $_SESSION['student_name']; // Ensure that the student's name is stored in the session
// Handle the return action
if (isset($_POST['return'])) {
    $book_id = $_POST['book_id'];
    // Fetch the book issue details
    $sql_issue_details = "SELECT * FROM book_issue WHERE bid = '$book_id' AND sid = '$sid'";
    $result_issue_details = mysqli_query($db_connect, $sql_issue_details);
    $issue_details = mysqli_fetch_assoc($result_issue_details);
    if ($issue_details) {
        $book_name = $issue_details['book_name'];
        $return_date = date('Y-m-d');
        // Insert the return details into the book_return table
        $sql_insert_return = "INSERT INTO book_return (sid, bid, book_name, student_name, return_date)
                              VALUES ('$sid', '$book_id', '$book_name', '$student_name', '$return_date')";
        mysqli_query($db_connect, $sql_insert_return);
        // Delete the entry from the book_issue table
        $sql_delete_issue = "DELETE FROM book_issue WHERE bid = '$book_id' AND sid = '$sid'";
        mysqli_query($db_connect, $sql_delete_issue);
        // Update the book's availability in the book table
        $sql_update_book = "UPDATE book SET available = 1 WHERE bid = '$book_id'";
        mysqli_query($db_connect, $sql_update_book);
        if (mysqli_affected_rows($db_connect) > 0) {
            header("Location: borrowed_books.php?msg=Book returned successfully");
        } else {
            header("Location: borrowed_books.php?error=Error returning book");
        }
    } else {
        header("Location: borrowed_books.php?error=Book issue details not found");
    }
    }
?>