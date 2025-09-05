<?php
include "../common/connection.php";
include "../common/header_admin.php";
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
        
        .tableright
        {
            margin-left:280px;
        }
        .srch
        {
            padding-left: 1100px;
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
    <h2>List Of Books</h2>
    <?php
        if(isset($_POST['submit'])){
            $q=mysqli_query($db_connect,"SELECT * from book where book_name like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No book found. Try searching again.";
            }
            else
            {
        echo "<table class='tableright'>";
            echo "<tr>";
                //Table header
                echo "<th>"; echo "B_ID";	echo "</th>";
    echo "<th>"; echo "ISBN";	echo "</th>";
                echo "<th>"; echo "Book-Name";  echo "</th>";
                echo "<th>"; echo "Authors Name";  echo "</th>";
                echo "<th>"; echo "Publication";  echo "</th>";
                echo "<th>"; echo "Edition";  echo "</th>";
                echo "<th>"; echo "price";  echo "</th>";
                echo "<th>"; echo "Publication date";  echo "</th>";
                echo "<th>"; echo "Action";  echo "</th>";

            echo "</tr>";	
            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['isbn']; echo "</td>";
                // echo "<td>"; echo"<img src='data:image/jpeg;base64,".base64_encode($row['image'])."'/>";
                echo "<td>"; echo $row['book_name']; echo "</td>";
                echo "<td>"; echo $row['author_name']; echo "</td>";
                echo "<td>"; echo $row['publication']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['price']; echo "</td>";
                echo "<td>"; echo $row['publication_date']; echo "</td>";
                echo "<td>";
                    echo '<a href="updatebook.php?bid=' . $row['bid'] . '"><button>Edit</button></a>';
                    echo '<a href="delete_book.php?del=' . $row['bid'] . '" 
                    onclick="return confirm(\'Are you sure you want to delete this?\');"><button>Delete</button></a>';
                echo "</td>";
                
                echo "</tr>";
            }
        echo "</table>";
            }
        }
            /*if button is not pressed.*/
        else
        {
            $res=mysqli_query($db_connect,"SELECT * FROM `book`;");
        echo "<table border=1 class='tableright'>";
            echo "<tr>";
                //Table header
                echo "<th>"; echo "B_ID";	echo "</th>";
                echo "<th>"; echo "ISBN";	echo "</th>";
                echo "<th>"; echo "Book-Name";  echo "</th>";
                echo "<th>"; echo "Authors Name";  echo "</th>";
                echo "<th>"; echo "Publication";  echo "</th>";
                echo "<th>"; echo "Edition";  echo "</th>";
                echo "<th>"; echo "price";  echo "</th>";
                echo "<th>"; echo "Publication date";  echo "</th>";
                echo "<th>"; echo "Action";  echo "</th>";

            echo "</tr>";	
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['isbn']; echo "</td>";
                // echo "<td>"; echo"<img src='data:image/jpeg;base64,".base64_encode($row['image'])."'/>";
                echo "<td>"; echo $row['book_name']; echo "</td>";
                echo "<td>"; echo $row['author_name']; echo "</td>";
                echo "<td>"; echo $row['publication']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['price']; echo "</td>";
                echo "<td>"; echo $row['publication_date']; echo "</td>";
                echo "<td>";
                    echo '<a href="updatebook.php?bid=' . $row['bid'] . '"><button>Edit</button></a>';
                    echo '<a href="delete_book.php?del=' . $row['bid'] . '" 
                    onclick="return confirm(\'Are you sure you want to delete this?\');"><button>Delete</button></a>';
                echo "</td>";
                echo "</tr>";
            }
        echo "</table>";
        }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>