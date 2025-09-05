<?php
include ("../common/connection.php");
if (isset($_GET['del']) && !empty($_GET['del'])) {
    // Sanitize the book ID to prevent SQL injection
    $student_id = mysqli_real_escape_string($db_connect, $_GET['del']);
    // SQL query to delete the book with the provided ID
    $sql = "DELETE FROM student_register WHERE id = $student_id";
    if (mysqli_query($db_connect, $sql)) {
        header("Location: student_info.php?msg=Student deleted successfully");
    } else {
        echo "Error deleting Student: " . mysqli_error($db_connect);
    }
} else {
    echo "Student ID not provided";
}
?>