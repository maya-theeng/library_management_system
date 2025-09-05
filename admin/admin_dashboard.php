<?php
include "../common/connection.php";
include "../common/header_admin.php";

$select_student = mysqli_query($db_connect,"select count(*) from student_register");
$total_student= mysqli_fetch_row($select_student);
$select_book = mysqli_query($db_connect,"select count(*) from book");
$total_book= mysqli_fetch_row($select_book);
$select_admin = mysqli_query($db_connect,"select count(*) from admin");
$total_admin= mysqli_fetch_row($select_admin);
$select_request = mysqli_query($db_connect,"select count(*) from book_request");
$total_request= mysqli_fetch_row($select_request);
$select_issue = mysqli_query($db_connect,"select count(*) from book_issue");
$total_issue= mysqli_fetch_row($select_issue);
$select_return = mysqli_query($db_connect,"select count(*) from book_return");
$total_return= mysqli_fetch_row($select_return);
?>

<div class="boxes">
    <div class="box box1">
        <i class='bx bxs-book'></i>
        <a href="book_list.php"><span class="text">Total Books</span></a><br>
        <strong><center><?php echo $total_book[0]; ?></center></strong>
    </div>
    <div class="box box2">
        <i class='bx bxs-group'></i>
        <a href="student_info.php"><span class="text">Total Students</span></a><br>
        <strong><center><?php echo $total_student[0]; ?></center></strong>
    </div>
    <div class="box box4">
        <i class='bx bxs-user'></i>
        <a href="#"><span class="text">Total Admin </span></a><br>
        <strong><center><?php echo $total_admin[0]; ?></center></strong>
    </div>
    <div class="box box3">
        <i class='bx bxs-book'></i>
        <a href="manage_request.php"><span class="text">Total Requested Book</span></a>
        <br> <strong><center><?php echo $total_request[0]; ?></center></strong>
    </div>
    <div class="box box3">
        <i class='bx bxs-book'></i>
        <a href="book_issue_list.php"><span class="text">Total Issue Book</span></a>
        <br> <strong><center><?php echo $total_issue[0]; ?></center></strong>
    </div>
    
    <div class="box box3">
        <i class='bx bxs-book'></i>
        <a href="returned_books.php"><span class="text">Total Returned Book</span></a>
        <br> <strong><center><?php echo $total_return[0]; ?></center></strong>
    </div>
</div>

<?php include "../common/footer.php"; ?>