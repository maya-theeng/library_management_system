<?php
include "common/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="main">
        <nav>
            <div><h2 class="logo">GP<span>LIBRARY</span></h2></div>
            <div>
              <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="student/s_login.php">LOGIN</a></li>
                <li><a href="register.php">REGISTER</a></li>
                <li><a href="admin/a_login.php">ADMIN-LOGIN</a></li>
             </ul>
            </div>
        </nav>
        <div class="flex">
            <form action="" method="POST">
                <div class="Register">
                    <div class="create">
                        <h2>Create an account</h2>
                    </div><br><br>
                    <div>
                        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required >
                    </div><br>
                    <div>
                        <input type="text" id="email" name="email" placeholder="Email" required>
                    </div><br>
                    <div>
                        <input type="text" id="adsress" name="address" placeholder="Address" required>
                    </div><br>
                    <div>
                        <input type="text" name="mobile" placeholder="Mobile No." required=""> <br>
                    </div><br>
                    <div>
                    <label for="semester">Semester:</label>
                    <select  name="semester" id="semester" required="">
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
                    <label for="status">Status:</label>
                    <select id="status" name="status" required="">
                        <option value="">Select Status</option>
                        <option  value="1">Active</option>
                        <option  value="0">Inactive</option>         
                    </select>
                    </div>
                    <br>
                    <div>
                        <input type="password" id="password" name="password" placeholder="Password" required pattern= 
                        "^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" required =""                   
                        title="Password must contain at least one number,  
                        one alphabet, one symbol, and be at  
                        least 8 characters long"> <br><br>
                    </div>
                    <input  type="submit" name="submit" value="Sign Up">
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
                $password=$_POST['password'];
                
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                $sql="INSERT INTO `student_register`(`name`, `email`, `address`, `mobile`, `semester`, `status`, `password`) VALUES
                ('$name','$email','$address','$mobile','$semester','$status','$hashed_password')";
                
                $res=mysqli_query($db_connect,$sql);
                if($res){
                    header("Location: student/s_login.php?success=Registration successful. Please login.");
                    exit();
                }
                else{
                    echo"Registration failed! Please try again";
                }
            }
        ?> 
        </div>
    </div>
    <?php include "common/footer.php"; ?>
</body>
</html>