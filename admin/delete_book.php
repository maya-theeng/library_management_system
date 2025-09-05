<?php
include ("../common/connection.php");
if (isset($_GET['del']) && !empty($_GET['del'])) {
    // Sanitize the book ID to prevent SQL injection
    $book_id = mysqli_real_escape_string($db_connect, $_GET['del']);
    // SQL query to delete the book with the provided ID
    $sql = "DELETE FROM book WHERE bid = $book_id";
    if (mysqli_query($db_connect, $sql)) {
        header("Location: book_list.php?msg=Book deleted successfully");
    } else {
        echo "Error deleting book: " . mysqli_error($db_connect);
    }
} else {
    echo "Book ID not provided";
}
?>