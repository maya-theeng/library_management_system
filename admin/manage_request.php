<?php
include "../common/connection.php";
include "../common/header_admin.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Request Books</title>
    <style type="text/css">
        table {
            width: 80%;
            border-collapse: collapse;
            
        }
        table, th, td {
            border: 1px solid black;
        }
        
        .tableright
        {
            margin-left:280px;
        }
        .srch
        {
            padding-left: 1200px;
        } 
    </style>
</head>
<body>
    <!--__________________________search bar________________________-->
    <div class="srch">
        <form  method="post" name="form1">
            
                <input type="text" name="search" placeholder="Student name.." required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    Search
                </button>
        </form>
    </div>
    <h2>List Of Requested Books</h2>
    <?php
        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db_connect,"SELECT * from book_request where student_name like '%$_POST[search]%' ");

            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No found with that name. Try searching again.";
            }
            else
            {
        echo "<table class='tableright' >";
            echo "<tr >";
                //Table header
                echo "<th>"; echo "Request Id";	echo "</th>";
                echo "<th>"; echo "book Id";	echo "</th>";
                echo "<th>"; echo "Book Name";  echo "</th>";
                echo "<th>"; echo "Student Id";  echo "</th>";
                echo "<th>"; echo "Student Name";  echo "</th>";
                echo "<th>"; echo "Request Date";  echo "</th>";
                echo "<th>"; echo "Action";  echo "</th>";
                
            echo "</tr>";	
            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['book_name']; echo "</td>";
                echo "<td>"; echo $row['sid']; echo "</td>";
                echo "<td>"; echo $row['student_name']; echo "</td>";
                echo "<td>"; echo $row['request_date']; echo "</td>";
                echo "<td>";
                    echo '<a href="approve_book.php?id=' . $row['id'] . '"><button>accept</button></a>';
                    echo '<a href="delete.php?reject=' . $row['id'] . '" 
                    onclick="return confirm(\'Are you sure you want to delete this?\');"><button>reject</button></a>';
                echo "</td>";

                echo "</tr>";
            }
        echo "</table>";
            }
        }
            /*if button is not pressed.*/
        else
        {
            $res=mysqli_query($db_connect,"SELECT * FROM `book_request`;");
        echo "<table  class='tableright'>";
            echo "<tr >";
                //Table header
                echo "<th>"; echo "Request Id";	echo "</th>";
                echo "<th>"; echo "book Id";	echo "</th>";
                echo "<th>"; echo "Book Name";  echo "</th>";
                echo "<th>"; echo "Student Id";  echo "</th>";
                echo "<th>"; echo "Student Name";  echo "</th>";
                echo "<th>"; echo "Request Date";  echo "</th>";
                echo "<th>"; echo "Action";  echo "</th>";
                
                
            echo "</tr>";	
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['book_name']; echo "</td>";
                echo "<td>"; echo $row['sid']; echo "</td>";
                echo "<td>"; echo $row['student_name']; echo "</td>";
                echo "<td>"; echo $row['request_date']; echo "</td>";
                echo "<td>";
                    echo '<a href="approve_book.php?id=' . $row['id'] . '"><button>accept</button></a>';
                    echo '<a href="delete.php?del=' . $row['id'] . '" 
                    onclick="return confirm(\'Are you sure you want to delete this?\');"><button>reject</button></a>';
                echo "</td>";

                
                echo "</tr>";
            }
        echo "</table>";
        }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>