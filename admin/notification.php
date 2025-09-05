<?php
include "../common/connection.php";
include "../common/header_admin.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
</head>
<body>
    <h1>Notifications</h1>
    <?php
    // Fetch all notifications
    $sql = "SELECT n.*, sr.name as student_name FROM notifications n JOIN student_register sr ON n.sid = sr.id ORDER BY n.date DESC";
    $result = mysqli_query($db_connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' style='width: 80%; border-collapse: collapse;'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Student ID</th>";
        echo "<th>Student Name</th>";
        echo "<th>Message</th>";
        echo "<th>Date</th>";
        echo "</tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['sid'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No notifications found.</p>";
    }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>