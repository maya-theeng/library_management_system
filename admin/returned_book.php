<?php
include "../common/connection.php";
include "../common/header_admin.php";
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
    <h2>List Of Returned Book</h2>
    <?php
    // Handle search functionality
    if (isset($_POST['submit'])) {
        // Sanitize input to prevent SQL injection
        $search_term = mysqli_real_escape_string($db_connect, $_POST['search']);
        
        // Fetch returned books matching search criteria
        $q = mysqli_query($db_connect, "SELECT * FROM book_return WHERE book_name LIKE '%$search_term%'");
        if (mysqli_num_rows($q) == 0) {
            echo "Sorry! No book found. Try searching again.";
        } else {
            echo "<table class='tableright'>";
            echo "<tr>";
            // Table header
            echo "<th>Return Id</th>";
            echo "<th>Book Id</th>";
            echo "<th>Book-Name</th>";
            echo "<th>Student Id</th>";
            echo "<th>Student Name</th>";
            echo "<th>Return date</th>";
            echo "</tr>";  
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['bid'] . "</td>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['sid'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['return_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        // Fetch all returned books if search is not submitted
        $res = mysqli_query($db_connect, "SELECT * FROM `book_return`");
        echo "<table class='tableright'>";
        echo "<tr>";
        // Table header
        echo "<th>Return Id</th>";
        echo "<th>Book Id</th>";
        echo "<th>Book-Name</th>";
        echo "<th>Student Id</th>";
        echo "<th>Student Name</th>";
        echo "<th>Return date</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['bid'] . "</td>";
            echo "<td>" . $row['book_name'] . "</td>";
            echo "<td>" . $row['sid'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['return_date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>