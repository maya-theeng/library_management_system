<?php
include "../common/connection.php";
include "../common/header_admin.php";
function insert_notification($db_connect, $sid, $message) {
    $message = mysqli_real_escape_string($db_connect, $message); // Escape special characters in the message
    $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp
    $sql_insert_notification = "INSERT INTO notifications (sid, message, date) VALUES ('$sid', '$message', '$timestamp')";
    return mysqli_query($db_connect, $sql_insert_notification);
}
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
    <h2>List Of Issued Book</h2>
    <?php
    if (isset($_POST['submit'])) {
        $q = mysqli_query($db_connect, "SELECT * FROM book_issue WHERE student_name LIKE '%$_POST[search]%' OR book_name LIKE '%$_POST[search]%'");
        if (mysqli_num_rows($q) == 0) {
            echo "Sorry! No book found. Try searching again.";
        } else {
            echo "<table class='tableright'>";
            echo "<tr>";
            // Table header
            echo "<th>Issued Id</th>";
            echo "<th>Book Id</th>";
            echo "<th>Book-Name</th>";
            echo "<th>Student Id</th>";
            echo "<th>Student Name</th>";
            echo "<th>Issue Date</th>";
            echo "<th>Expected Return Date</th>";
            echo "<th>Remaining Days</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['bid'] . "</td>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['sid'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['issue_date'] . "</td>";
                echo "<td>" . $row['expected_returndate'] . "</td>";
                echo "<td>" . $row['remaining_day'] . "</td>";
                echo "</tr>";
                // Check if remaining_day is 2 and insert notification
                if ($row['remaining_day'] == 2) {
                    $sid = $row['sid'];
                    $message = "Dear " . $row['student_name'] . ", this is a reminder to return the book '" . $row['book_name'] . "' within 2 days.";
                    insert_notification($db_connect, $sid, $message);
                }
            }
            echo "</table>";
        }
    } else {
        $res = mysqli_query($db_connect, "SELECT * FROM book_issue");
        echo "<table border=1 class='tableright'>";
        echo "<tr>";
        // Table header
        echo "<th>Issued Id</th>";
        echo "<th>Book Id</th>";
        echo "<th>Book-Name</th>";
        echo "<th>Student Id</th>";
        echo "<th>Student Name</th>";
        echo "<th>Issue Date</th>";
        echo "<th>Expected Return Date</th>";
        echo "<th>Remaining Days</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['bid'] . "</td>";
            echo "<td>" . $row['book_name'] . "</td>";
            echo "<td>" . $row['sid'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['issue_date'] . "</td>";
            echo "<td>" . $row['expected_returndate'] . "</td>";
            echo "<td>" . $row['remaining_day'] . "</td>";
            echo "</tr>";
            // Check if remaining_day is 2 and insert notification
            if ($row['remaining_day'] == 2) {
                $sid = $row['sid'];
                $message = "Dear " . $row['student_name'] . ", this is a reminder to return the book '" . $row['book_name'] . "' within 2 days.";
                insert_notification($db_connect, $sid, $message);
            }
        }
        echo "</table>";
    }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>