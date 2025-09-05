<?php
include "../common/connection.php";
include "../common/header_student.php";
// Check if the student is logged in
if (!isset($_SESSION['sid'])) {
    header("Location: s_login.php");
    exit();
}
$sid = $_SESSION['sid'];
$student_name = $_SESSION['student_name']; 
// Fetch student's current semester
$sql_student = "SELECT semester FROM student_register WHERE id = '$sid'";
$result_student = mysqli_query($db_connect, $sql_student);
$row_student = mysqli_fetch_assoc($result_student);
$current_semester = $row_student['semester'];
// Check the combined limit of requested and borrowed books
$sql_check_limit = "SELECT 
    (SELECT COUNT(*) FROM book_request WHERE sid = '$sid' AND status = 'requested') AS request_count, 
    (SELECT COUNT(*) FROM book_issue WHERE sid = '$sid') AS issue_count";
$result_check_limit = mysqli_query($db_connect, $sql_check_limit);
$row_check_limit = mysqli_fetch_assoc($result_check_limit);
$total_books = $row_check_limit['request_count'] + $row_check_limit['issue_count'];
$request_limit_reached = ($total_books >= 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <style type="text/css">
        table {
            width: 80%;
            border-collapse: collapse;    
        }
        table, th, td {
            border: 1px solid black;
        }
        
        .tableright {
            margin-left: 280px;
        }
        .srch {
            padding-left: 1100px;
        }
        h2{
            margin-left:280px;
            font-size: 20px;
            line-height: 2;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Search bar -->
    <div class="srch">
        <form method="post" name="form1">   
            <input type="text" name="search" placeholder="search books.." required="">
            <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                Search
            </button>
        </form>
    </div>
    <h2>List Of Books</h2>
    <?php
    // Handle search functionality
    if (isset($_POST['submit'])) {
        $q = mysqli_query($db_connect, "SELECT * FROM book WHERE book_name LIKE '%$_POST[search]%' AND available=1 AND semester='$current_semester'");
        if (mysqli_num_rows($q) == 0) {
            echo "Sorry! No book found. Try searching again.";
        } else {
            echo "<table class='tableright'>";
            echo "<tr>";
            // Table header
            echo "<th>B_ID</th>";
            echo "<th>ISBN</th>";
            echo "<th>Book-Name</th>";
            echo "<th>Authors Name</th>";
            echo "<th>Publication</th>";
            echo "<th>Edition</th>";
            echo "<th>Price</th>";
            echo "<th>Publication date</th>";
            echo "<th>Action</th>";
            echo "</tr>";  
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<tr>";
                echo "<td>" . $row['bid'] . "</td>";
                echo "<td>" . $row['isbn'] . "</td>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['author_name'] . "</td>";
                echo "<td>" . $row['publication'] . "</td>";
                echo "<td>" . $row['edition'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['publication_date'] . "</td>";
                echo "<td>";
                // Disable the request button if limit is reached
                if ($request_limit_reached) {
                    echo '<button disabled>Request</button>';
                } else {
                    echo '<a href="requestbook.php?request=' . $row['bid'] . '&book_name=' . $row['book_name'] .' " 
                        id="request_button_' . $row['bid'] . '" 
                        onclick="return confirm(\'Are you sure you want to request ' . $row['book_name'] . ' book?\');">
                        <button>Request</button>
                        </a>';
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        // Fetch books for the student's current semester
        $res = mysqli_query($db_connect, "SELECT * FROM `book` WHERE available=1 AND semester='$current_semester'");
        echo "<table border=1 class='tableright'>";
        echo "<tr>";
        // Table header
        echo "<th>B_ID</th>";
        echo "<th>ISBN</th>";
        echo "<th>Book-Name</th>";
        echo "<th>Authors Name</th>";
        echo "<th>Publication</th>";
        echo "<th>Edition</th>";
        echo "<th>Price</th>";
        echo "<th>Publication date</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $row['bid'] . "</td>";
            echo "<td>" . $row['isbn'] . "</td>";
            echo "<td>" . $row['book_name'] . "</td>";
            echo "<td>" . $row['author_name'] . "</td>";
            echo "<td>" . $row['publication'] . "</td>";
            echo "<td>" . $row['edition'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['publication_date'] . "</td>";
            echo "<td>";
            // Disable the request button if limit is reached
            if ($request_limit_reached) {
                echo '<button disabled>Request</button>';
            } else {
                echo '<a href="requestbook.php?request=' . $row['bid'] . '&book_name=' . $row['book_name'] . '" 
                    id="request_button_' . $row['bid'] . '" 
                    onclick="return confirm(\'Are you sure you want to request ' . $row['book_name'] . ' book?\');">
                    <button>Request</button>
                    </a>';
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>