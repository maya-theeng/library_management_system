<?php
include "../common/connection.php";
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT id, name, email, password FROM student_register WHERE email='$email'";
    $res = mysqli_query($db_connect, $sql);
    $row = mysqli_fetch_assoc($res);
    
    if (mysqli_num_rows($res) > 0 && password_verify($password, $row['password'])) {
        $_SESSION['sid'] = $row['id'];
        $_SESSION['student_name'] = $row['name'];
        $_SESSION['user_email'] = $email;
        header("Location: stud_dashboard.php");
        exit();
    } else {
        $error = "Email or Password is incorrect";
    }
    mysqli_close($db_connect);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="main">
    <nav>
        <h2 class="logo">GP<span>LIBRARY</span></h2>
        <ul>
            <li><a href="../index.php">HOME</a></li>
            <li><a href="s_login.php">LOGIN</a></li>
            <li><a href="../register.php">REGISTER</a></li>
            <li><a href="../admin/a_login.php">ADMIN-LOGIN</a></li>
        </ul>
    </nav>
    <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="loginform">
                <h1 style="text-align: center; color: white;">STUDENT</h1>
                <div class="aa">
                    Email <br><input type="email" name="email" class="login" id="email" required/><br>
                    Password <br><input type="password" name="password" class="login" id="password" required/><br>
                    <input type="submit" name="submit" value="login" class="login">
                </div>
            </div>
        </form>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</div>
<?php include "../common/footer.php"; ?>
</body>
</html>
