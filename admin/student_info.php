<?php
include "../common/connection.php";
include "../common/header_admin.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
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
            
                <input type="text" name="search" placeholder="Student name.." required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    search
                </button>
        </form>
    </div>
    <h2>List Of Students</h2>
    <?php
        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db_connect,"SELECT * FROM `student_register` where name like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No student found with that name. Try searching again.";
            }
            else
            {
        echo "<table class='tableright' >";
            echo "<tr >";
                //Table header
                echo "<th>"; echo "ID";	echo "</th>";
                echo "<th>"; echo "Name";	echo "</th>";
                echo "<th>"; echo "Email";  echo "</th>";
                echo "<th>"; echo "Address";  echo "</th>";
                echo "<th>"; echo "Mobile";  echo "</th>";
                echo "<th>"; echo "Semester";  echo "</th>";
                echo "<th>"; echo "Status";  echo "</th>";
                echo "<th>"; echo "Action";  echo "</th>";
                
            echo "</tr>";	
            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['address']; echo "</td>";
                echo "<td>"; echo $row['mobile']; echo "</td>";
                echo "<td>"; echo $row['semester']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";
                echo "<td>";
                    echo '<a href="update_student.php?id=' . $row['id'] . '"><button>Edit</button></a>';
                    echo '<a href="delete_student.php?del=' . $row['id'] . '" 
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
            $res=mysqli_query($db_connect,"SELECT * FROM `student_register`;");
        echo "<table class='tableright' >";
            echo "<tr>";
                //Table header
                echo "<th>"; echo "ID";	echo "</th>";
                echo "<th>"; echo "Name";	echo "</th>";
                echo "<th>"; echo "Email";  echo "</th>";
                echo "<th>"; echo "Address";  echo "</th>";
                echo "<th>"; echo "Mobile";  echo "</th>";
                echo "<th>"; echo "Semester";  echo "</th>";
                echo "<th>"; echo "Status";  echo "</th>";
                echo "<th>"; echo "Action";  echo "</th>";
                
                
            echo "</tr>";	
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['address']; echo "</td>";
                echo "<td>"; echo $row['mobile']; echo "</td>";
                echo "<td>"; echo $row['semester']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";
                echo "<td>";
                    echo '<a href="update_student.php?id=' . $row['id'] . '"><button>Edit</button></a>';
                    echo '<a href="delete_student.php?del=' . $row['id'] . '" 
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