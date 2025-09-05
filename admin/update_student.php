<?php
include ("../common/connection.php");
include ("../common/header_admin.php");
    $name = "";
    $email= "";
    $address = "";
    $mobile = "";
    $semester="";
    $status="";
    // $password = "";
    $query = "select * from student_register where id = $_GET[id]";
    $query_run = mysqli_query($db_connect,$query);
    while ($row = mysqli_fetch_assoc($query_run)){
        $name = $row['name'];
        $email = $row['email'];
        $address = $row['address'];
        $mobile = $row['mobile'];
        $semester = $row['semester'];
        $semester = $row['semester'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
        <div class="flex">
            <form action="" method="POST">
                <div class="Register">
                    <div class="create">
                        <h2>Create an account</h2>
                    </div>
                    <div>
                        <label for="fullname">Full Name<span>*</span></label><br>
                        <input type="text" id="fullname" value="<?php echo $name; ?>" name="fullname" class="label"><br><br>
                    </div>
                    <div>
                        <label for="email">Email<span>*</span></label><br>
                        <input type="text" id="email" name="email" value="<?php echo $email;?>" class="label"><br><br>
                    </div>
                    <div>
                        <label for="adress">Address<span>*</span></label><br>
                        <input type="text" id="adsress" name="address" value="<?php echo $address;?>" class="label"><br><br>
                    </div>
                    <div>
                        <label for="mobile">Mobile No<span>*</span></label><br>
                        <input type="text" name="mobile" value="<?php echo $mobile;?>" required=""class="label"> <br>
                    </div>
                    <div>
                    <label for="semester">Semester<span>*</span></label><br>
                    <select  name="semester" id="semester" value="<?php echo $semester;?>" required="" class="label"><br>
                        <option value="">Select semester</option>
                        <option  value="1">First</option>
                        <option  value="2">Second</option>
                        <option  value="3">Third</option>
                        <option  value="4">Fourth</option>
                        <option  value="5">Fifth</option>
                        <option  value="6">Six</option>
                        <option  value="7">Seven</option>
                        <option  value="8">Eight</option>
                    </select>
                    </div><br>
                    <div>
                    <label for="status">Status<span>*</span></label><br>
                    <select id="status" name="status" value="<?php echo $status;?>" required=""class="label">
                        <option value="">Select Status</option>
                        <option  value="1">Active</option>
                        <option  value="0">Inactive</option>         
                    </select>
                    </div>
                    <br>
                    
                    <input  type="submit" name="submit" value="UPDATE" style="color:black; width:70px; height:30px"class="label">
                </div>
            </form>
            <?php
            if(isset($_POST['submit'])){
                $name=$_POST['fullname'];
                $email=$_POST['email'];
                $address=$_POST['address'];
                $mobile=$_POST['mobile'];
                $semester=$_POST['semester'];
                $status=$_POST['status'];
                $id=intval($_GET['id']);
                $sql= "UPDATE student_register SET name='$name', email='$email', address='$address', mobile='$mobile', 
                semester='$semester',status='$status' WHERE id=$id";
                $res=mysqli_query($db_connect,$sql);
                if($res){
                    ?>
                    
                    <script>
                        alert("Update  successfulyy!");
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