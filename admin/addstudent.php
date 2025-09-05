<?php
include "../common/connection.php";
include "../common/header_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add student</title>
    <link rel="stylesheet" href="../assets/css/addstudent.css">
</head>
<body>
<div class="flex">
    <form action="" method="POST">
        <div class="Register">
            <div class="create">
                <h2>Add New Student</h2>
            </div>
            <div>
                <input type="text" id="fullname" name="fullname" placeholder="Full Name"required="" >
            </div><br>
            <div>
                <input type="text" id="email" name="email" placeholder="Email" required="">
            <div><br>
                <input type="text" id="address" name="address"  placeholder="address"required=""><br>
            </div><br>
            <div>
            <input type="text" name="mobile"  placeholder="mobile" required=""> 
                    </div><br>
                    <div>
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
                        <input type="password" id="password" name="password" placeholder="Password" pattern= 
                        "^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" required =""                   
                        title="Password must contain at least one number,  
                        one alphabet, one symbol, and be at  
                        least 8 characters long">
                    </div>
                    <br>
                    <input  type="submit" name="submit" value="Add Student" >
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
                    ?>
                    
                    <script>
                        alert("Added successfully!");
                        window.location.href = "admin_dashboard.php";
                    </script>
                    
                    <?php
                }
                else{
                    echo"Registration failedd! Please try again";
                }
            }
        ?> 
                
    </div>
</body>
</html>