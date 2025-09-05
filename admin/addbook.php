<?php
include "../common/connection.php";
include "../common/header_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <link rel="stylesheet" href="../assets/css/addbook.css">
</head>
<body>
   
    <div class="b">
        <form action="" method="POST">
            <div class="bb">
                <h2>Books Info</h2>
                <label for="isbn">ISBN:</label><br><input type="text" name="isbn" id="isbn" required><br>
                <label for="name">Book Name:</label><br><input type="text" name="name" id="name" required><br>
                <label for="aname">Author Name:</label><br><input type="text" name="aname" id="aname" required><br>
                <label for="publication">Publication:</label><br><input type="text" name="publication" id="publication"required><br>
                <label for="edition">Edition:</label><br><input type="text" name="edition" id="edition"required><br>
                <label for="semester">Semester:</label>
                <select  name="semester" id="semester" required=""><br>
                    <option value="">Select semester</option>
                    <option  value="1">First</option>
                    <option  value="2">Second</option>
                    <option  value="3">Third</option>
                    <option  value="4">Fourth</option>
                    <option  value="5">Fifth</option>
                    <option  value="6">Six</option>
                    <option  value="7">Seven</option>
                    <option  value="8">Eight</option>
                </select><br>
                <label for="price">Price:</label><br><input type="text" name="price" id="price"required><br>
                <label for="pdate">Publication Date:</label><input type="date" name="pdate" id="pdate"required><br>
                <input type="submit" name="submit" value="Add">
            </div>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $isbn=$_POST['isbn'];
                $name=$_POST['name'];
                $aname=$_POST['aname'];
                $publication=$_POST['publication'];
                $edition=$_POST['edition'];
                $semester=$_POST['semester'];
                $price=$_POST['price'];
                $pdate=$_POST['pdate'];
                
                $sql="INSERT INTO `book`( `isbn`, `book_name`, `author_name`, `edition`, `semester`,`price`, `publication`, `publication_date`) 
                VALUES ('$isbn','$name','$aname','$edition','$semester','$price','$publication','$pdate')";
                
                $res=mysqli_query($db_connect,$sql);
                
                if($res){
                    ?>
                    <script>
                        alert("Added successfully!");
                        window.location.href = "admin_dashboard.php";
                    </script>
                    <?php
                }
                else{
                    echo"Registration failed! Please try again";
                }
            }
        ?>
    </div>
</body>
</html>