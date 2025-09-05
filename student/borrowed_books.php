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
    <!--__________________________search bar________________________-->
    <div class="srch">
        <form  method="post" name="form1">
            
                <input  type="text" name="search" placeholder="search books.." required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    Search
                </button>
        </form>
    </div>
    <h2>List Of Borrowed Book</h2>
    <?php
        if(isset($_POST['submit'])){
            $q=mysqli_query($db_connect,"SELECT * from book_issue where student_name like '%$_POST[search]%' AND sid = '$sid'");
            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No book found. Try searching again.";
            }
            else
            {
        echo "<table class='tableright'>";
            echo "<tr>";
            //Table header
            echo "<th>"; echo "Issued Id";	echo "</th>";
            echo "<th>"; echo "Book Id";	echo "</th>";
            echo "<th>"; echo "Book-Name";  echo "</th>";
            echo "<th>"; echo "Issue Date";  echo "</th>";
            echo "<th>"; echo "Expected Return Date";  echo "</th>";
            echo "<th>"; echo "Remaining Day";  echo "</th>";
   echo "<th>"; echo "Action";  echo "</th>";
            echo "</tr>";	
            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['book_name']; echo "</td>";
                echo "<td>"; echo $row['issue_date']; echo "</td>";
                echo "<td>"; echo $row['expected_returndate']; echo "</td>";
                echo "<td>"; echo $row['remaining_day']; echo "</td>";
    echo "<td>";
            echo "<form method='post' action='returnbook.php'>";
            echo "<input type='hidden' name='book_id' value='" . $row['bid'] . "'>";
            echo "<button type='submit' name='return'>Return</button>";
            echo "</form>";
            echo "</td>";
    // echo "<td><a href='return_book.php?id=" . $row['id'] . "'><button>Return</button></a></td>";
                echo "</tr>";
            }
        echo "</table>";
            }
        }
            /*if button is not pressed.*/
        else
        {
            $res=mysqli_query($db_connect,"SELECT * FROM book_issue WHERE sid = '$sid'");
        echo "<table border=1 class='tableright'>";
        echo "<tr>";
        //Table header
        echo "<th>"; echo "Issued Id";	echo "</th>";
        echo "<th>"; echo "Book Id";	echo "</th>";
        echo "<th>"; echo "Book-Name";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Expected Return Date";  echo "</th>";
        echo "<th>"; echo "Remaining Day";  echo "</th>";
  echo "<th>"; echo "Action";  echo "</th>";
        echo "</tr>";	
        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td>"; echo $row['id']; echo "</td>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['book_name']; echo "</td>";
            echo "<td>"; echo $row['issue_date']; echo "</td>";
            echo "<td>"; echo $row['expected_returndate']; echo "</td>";
            echo "<td>"; echo $row['remaining_day']; echo "</td>";
   echo "<td>";
            echo "<form method='post' action='returnbook.php'>";
            echo "<input type='hidden' name='book_id' value='" . $row['bid'] . "'>";
            echo "<button type='submit' name='return'>Return</button>";
            echo "</form>";
            echo "</td>";
   // echo "<td><a href='return_book.php?id=" . $row['id'] . "'><button>Return</button></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        }
    }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>