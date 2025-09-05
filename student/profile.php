<?php
include "../common/connection.php";
include "../common/header_student.php";

// Check if the student is logged in
if (!isset($_SESSION['sid'])) {
    header("Location: s_login.php");
    exit();
}
$sid = $_SESSION['sid'];
// Fetch student's profile information
$sql = "SELECT * FROM student_register WHERE id = '$sid'";
$result = mysqli_query($db_connect, $sql);
$student = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <style type="text/css">
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 50px auto;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
        .profile-container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            margin-top:50px;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Student Profile</h2>
        <?php if ($student): ?>
            <table>
                <tr>
                    <th>Student ID</th>
                    <td><?php echo htmlspecialchars($student['id']); ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($student['email']); ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo htmlspecialchars($student['mobile']); ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo htmlspecialchars($student['address']); ?></td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td><?php echo htmlspecialchars($student['semester']); ?></td>
                </tr>
            </table>
        <?php else: ?>
            <p>Student profile not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php include "../common/footer.php"; ?>