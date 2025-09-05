<?php
include ("../common/connection.php");
include("../common/header_admin.php");
    $isbn="";
    $bookname="";
    $author="";
    $publication="";
    $edition="";
    $price="";
    $semester="";
    $publicationdate="";
    $query = "select * from book where bid = $_GET[bid]";
    $query_run = mysqli_query($db_connect,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        
        $isbn=$row['isbn'];
        $bookname=$row['book_name'];
        $author=$row['author_name'];
        $publication=$row['publication'];
        $edition=$row['edition'];
        $price=$row['price'];
        $semester=$row['semester'];
        $publicationdate=$row['publication_date'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book info</title>
    <link rel="stylesheet" href="../assets/css/addbook.css">
</head>
<body>
<div class="b">
        <form action="" method="POST">
            <div class="bb">
                <h4>Books Info</h4>
                <label for="isbn">ISBN:</label><br>
                <input type="text" name="isbn" value="<?php echo $isbn; ?>" id="isbn" ><br>
                <label for="name">Book Name:</label><br>
                <input type="text" name="name" value="<?php echo $bookname; ?>"id="name" ><br>
                <label for="aname">Author Name:</label><br>
                <input type="text" name="aname" value="<?php echo $author; ?>"id="aname"><br>
                <label for="publication">Publication:</label><br>
                <input type="text" name="publication" value="<?php echo $publication; ?>" id="publication" ><br>
                <label for="edition">Edition:</label><br>
                <input type="text" name="edition" value="<?php echo $edition; ?>" id="edition"><br>
                <label for="price">Price:</label><br>
                <input type="text" name="price" value="<?php echo $price; ?>" id="price"><br>
                <label for="semester">Semester</label><br>
                <select  name="semester" id="semester" value="<?php echo $semester; ?>" required=""><br>
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
                <label for="pdate">Publication Date:</label>
                <input type="date" name="pdate" value="<?php echo $publicationdate; ?>" id="pdate"><br><br>

                <input type="submit" name="submit" value="update">
            </div>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $isbn=$_POST['isbn'];
                $bookname=$_POST['name'];
                $author=$_POST['aname'];
                $publication=$_POST['publication'];
                $edition=$_POST['edition'];
                $price=$_POST['price'];
                $semester=$_POST['semester'];
                $publicationdate=$_POST['pdate'];
                
                $bid=intval($_GET['bid']);
                $sql = "UPDATE book SET isbn='$isbn', book_name='$bookname', author_name='$author', edition='$edition', 
                price='$price',semester='$semester', publication='$publication', publication_date='$publicationdate' WHERE bid=$bid";
                $res=mysqli_query($db_connect,$sql);
                if($res){
                    ?>
                    
                    <script>
                        alert("Update Detail successfulyy!");
                        window.location.href = "admin_dashboard.php";
                    </script>
                    
                    <?php
                }
                else{
                    echo"Update failedd! Please try again";
                }
            }
            ?>
    </div>
</body>
</html>
<?php include "../common/footer.php"; ?>