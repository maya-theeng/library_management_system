<?php
include ("../common/connection.php");
if (isset($_GET['del']) && !empty($_GET['del'])) {
    // Sanitize the admin ID to prevent SQL injection
    $admin_id = mysqli_real_escape_string($db_connect, $_GET['del']);
    // SQL query to delete the admin with the provided ID
    $sql = "DELETE FROM admin WHERE id = $admin_id";
    if (mysqli_query($db_connect, $sql)) {
        header("Location: student_info.php?msg=Admin deleted successfully");
    } else {
        echo "Error deleting Admin: " . mysqli_error($db_connect);
    }
} else {
    echo "Admin ID not provided";
}
?>