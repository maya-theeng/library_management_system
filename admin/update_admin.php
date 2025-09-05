<?php
include ("../common/connection.php");
include ("../common/header_admin.php");
    $name = "";
    $email= "";
    
    // $password = "";
    $query = "select * from admin where id = $_GET[id]";
    $query_run = mysqli_query($db_connect,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $name = $row['name'];
        $email = $row['email'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Information Update</title>
    <link rel="stylesheet" href="../assets/css/addadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
        <div class="flex">
            <form action="" method="POST">
                <div class="Register">
                    <div class="create">
                        <h2>Update admin Detail</h2>
                    </div>
                    <div>
                        <label for="fullname">Full Name</label><br>
                        <input type="text" id="fullname" value="<?php echo $name; ?>" name="fullname" class="label"><br><br>
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input type="text" id="email" name="email" value="<?php echo $email;?>" class="label"><br><br>
                    </div>
                    
                    <input  type="submit" name="submit" value="UPDATE" class="label">
                </div>
            </form>
            <?php
            if(isset($_POST['submit'])){
                $name=$_POST['fullname'];
                $email=$_POST['email'];
                $id=intval($_GET['id']);
                $sql= "UPDATE admin SET name='$name', email='$email' WHERE id=$id";
                $res=mysqli_query($db_connect,$sql);
                if($res){
                    ?>
                    
                    <script>
                        alert("Update  Admin information successfulyy!");
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
    </div> 
    
</body>
</html>
<?php include "../common/footer.php"; ?>