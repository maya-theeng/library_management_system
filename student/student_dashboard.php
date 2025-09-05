<?php
include "../common/connection.php";
include "../common/header_student.php";

$sid = $_SESSION['sid'];
$sql_student = "SELECT semester FROM student_register WHERE id = '$sid'";
$result_student = mysqli_query($db_connect, $sql_student);
$row_student = mysqli_fetch_assoc($result_student);
$semester = $row_student['semester'];

$select_books = mysqli_query($db_connect, "SELECT COUNT(*) FROM book WHERE semester = '$semester'");
$total_books = mysqli_fetch_row($select_books);
$select_request_books = mysqli_query($db_connect, "SELECT COUNT(*) FROM book_request WHERE sid = '$sid'");
$total_request_books = mysqli_fetch_row($select_request_books);
$select_borrowed_books = mysqli_query($db_connect, "SELECT COUNT(*) FROM book_issue WHERE sid = '$sid'");
$total_borrowed_books = mysqli_fetch_row($select_borrowed_books);
$select_return_books = mysqli_query($db_connect, "SELECT COUNT(*) FROM book_return WHERE sid = '$sid'");
$total_return_books = mysqli_fetch_row($select_return_books);
?>

<div class="boxes">
    <div class="box box1">
        <i class='bx bxs-book'></i>
        <a href="books.php"><span class="text">Total Books</span></a><br>
        <strong><center><?php echo $total_books[0]; ?></center></strong>
    </div>
    <div class="box box3">
        <i class='bx bxs-book'></i>
        <a href="student_requested_book.php"><span class="text">Total Requested Book</span></a><br>
        <strong><center><?php echo $total_request_books[0]; ?></center></strong>
    </div>
    <div class="box box2">
        <i class='bx bxs-book'></i>
        <a href="borrowed_books.php"><span class="text">Total Borrowed Book</span></a><br>
        <strong><center><?php echo $total_borrowed_books[0]; ?></center></strong>
    </div>
    <div class="box box3">
        <i class='bx bxs-book'></i>
        <a href="returned_books.php"><span class="text">Total Returned Book</span></a><br>
        <strong><center><?php echo $total_return_books[0]; ?></center></strong>
    </div>
</div>

<?php include "../common/footer.php"; ?>