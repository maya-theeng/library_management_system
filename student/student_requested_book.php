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
    <h2>List Of Requested Books</h2>
    <?php
        if(isset($_POST['submit'])){
   
            $q=mysqli_query($db_connect,"SELECT * from book_request where sid='$sid' && book_name like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No book found. Try searching again.";
            }
            else
            {
        echo "<table class='tableright'>";
   echo "<tr>";
   echo "<th>B_ID</th>";
   echo "<th>Book Name</th>";
   echo "<th>Status</th>";
   echo "<th>Request Date</th>";
   echo "</tr>";
   while ($row = mysqli_fetch_assoc($res)) {
       echo "<tr>";
       echo "<td>" . $row['bid'] . "</td>";
       echo "<td>" . $row['book_name'] . "</td>";
       echo "<td>" . $row['status'] . "</td>";
       echo "<td>" . $row['request_date'] . "</td>";
       echo "</tr>";
   }
        echo "</table>";
            }
        }
            /*if button is not pressed.*/
        else
        {
  
            $res=mysqli_query($db_connect,"SELECT * FROM `book_request` where sid='$sid';");
         echo "<table class='tableright'>";
        echo "<tr>";
        echo "<th>B_ID</th>";
        echo "<th>Book Name</th>";
        echo "<th>Status</th>";
        echo "<th>Request Date</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $row['bid'] . "</td>";
            echo "<td>" . $row['book_name'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['request_date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    mysqli_close($db_connect);
    ?>
    
</body>
</html>
<?php include "../common/footer.php"; ?>