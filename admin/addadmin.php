<?php
include "../common/connection.php";
include "../common/header_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="../assets/css/addadmin.css">
</head>
<body>
<div class="flex">
    <form action="" method="POST">
        <div class="Register">
            <div class="create">
                <h2>Add New Admin</h2>
            </div>
            <div>
                <input type="text" id="fullname" name="fullname" placeholder="Full Name" required="" >
            </div><br>
            <div>
                <input type="text" id="email" name="email" placeholder="Email" required="">
            <div><br>
                <input type="text" id="address" name="address" placeholder="address"required=""><br>
            </div><br>
            <div>
            <input type="text" name="mobile" placeholder="mobile" required=""> 
                    </div><br>
                    <div>
                        <input type="password" id="password" name="password" placeholder="Password" pattern= 
                        "^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" required =""                   
                        title="Password must contain at least one number,  
                        one alphabet, one symbol, and be atleast 8 characters long">
                    </div>
                    <br>
                    <input  type="submit" name="submit" value="Add Admin" >
                </div>
            </form> 
            <?php
            if(isset($_POST['submit'])){
                $name=$_POST['fullname'];
                $email=$_POST['email'];
                $address=$_POST['address'];
                $mobile=$_POST['mobile'];
                $password=$_POST['password'];
                
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                $sql="INSERT INTO `admin`(`name`, `email`, `address`, `mobile`, `password`) VALUES
                ('$name','$email','$address','$mobile','$hashed_password')";
                
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