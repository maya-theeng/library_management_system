<?php
include "../common/connection.php";
include "../common/header_student.php";
// Check if the student is logged in
if (!isset($_SESSION['sid'])) {
    header("Location: s_login.php");
    exit();
}
$sid = $_SESSION['sid'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Returned Books</title>
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
    <h2>List Of Returned Books</h2>
    <?php
    if (isset($_POST['submit'])) {
        $search = mysqli_real_escape_string($db_connect, $_POST['search']);
        $q = mysqli_query($db_connect, "SELECT * FROM book_return WHERE sid = '$sid' AND book_name LIKE '%$search%'");
        if (mysqli_num_rows($q) == 0) {
            echo "Sorry! No returned books found matching your search.";
        } else {
            echo "<table class='tableright'>";
            echo "<tr>";
            // Table header
            echo "<th>Return Id</th>";
            echo "<th>Book Id</th>";
            echo "<th>Book Name</th>";
            echo "<th>Return Date</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['bid'] . "</td>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['return_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        // Display all returned books for the logged-in student
        $res = mysqli_query($db_connect, "SELECT * FROM book_return WHERE sid = '$sid'");
        if (mysqli_num_rows($res) == 0) {
            echo "You have not returned any books yet.";
        } else {
            echo "<table class='tableright'>";
            echo "<tr>";
            // Table header
            echo "<th>Return Id</th>";
            echo "<th>Book Id</th>";
            echo "<th>Book Name</th>";
            echo "<th>Return Date</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['bid'] . "</td>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['return_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>