<?php
include "../common/connection.php";
include "../common/header_student.php";
// Check if the student is logged in
if (!isset($_SESSION['sid'])) {
    header("Location: s_login.php");
    exit();
}
$sid = $_SESSION['sid'];
// Fetch notifications for the logged-in student
$sql = "SELECT message, date FROM notifications WHERE sid = '$sid' ORDER BY date DESC";
$result = mysqli_query($db_connect, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
</head>
<body>
    <h1>Your Notifications</h1>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . $row['date'] . " - " . $row['message'] . "</p>";
        }
    } else {
        echo "<p>No notifications found.</p>";
    }
    ?>
</body>
</html>
<?php include "../common/footer.php"; ?>