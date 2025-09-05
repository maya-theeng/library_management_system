<?php
session_start();
include "../common/connection.php";
include "../common/header_student.php";
// Check if the student is logged in
if (!isset($_SESSION['sid'])) {
    header("Location: s_login.php");
    exit();
}
$sid = $_SESSION['sid'];
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $sql = "SELECT password FROM student_register WHERE id = '$sid'";
    $result = mysqli_query($db_connect, $sql);
    $student = mysqli_fetch_assoc($result);
    // Verify current password
    if (password_verify($current_password, $student['password'])) {
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql_update = "UPDATE students SET password = '$hashed_password' WHERE id = '$sid'";
            if (mysqli_query($db_connect, $sql_update)) {
                $success = 'Password updated successfully.';
            } else {
                $error = 'Error updating password. Please try again.';
            }
        } else {
            $error = 'New password and confirm password do not match.';
        }
    } else {
        $error = 'Current password is incorrect.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style type="text/css">
        .form-container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #6db6b9e6;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #5a9da3;
        }
        .form-container .message {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Change Password</h2>
        <?php if ($error): ?>
            <div class="message" style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="message" style="color: green;"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="password" name="current_password" placeholder="Current Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
            <button type="submit">Change Password</button>
        </form>
    </div>
</body>
</html>
<?php include "../common/footer.php"; ?>