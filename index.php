<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/image.css">
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
        <div class="main1">
            <div class="content">
                <img src="assets/images/library3.jpg"/>
            </div>
            <div class="main1-text"> 
                <h2>Welcome to GP Library</h2>
                <p>Enhance your knowledge with us</p>
            </div>
        </div>
    </div>
    <div class="container">
    <?php
    include "common/connection.php";
    $sql = "SELECT book_name, image FROM book";
    $result = mysqli_query($db_connect, $sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookName = htmlspecialchars($row["book_name"], ENT_QUOTES, 'UTF-8');
            $imagePath = htmlspecialchars($row["image"], ENT_QUOTES, 'UTF-8');
            echo '<div class="book-box">';
            echo '<img src="assets/images/' . $imagePath . '" alt="' . $bookName . '">';
            echo '<button class="request-button" onclick="requestBook(\'' . addslashes($bookName) . '\')" aria-label="Request ' . $bookName . '">Request</button>';
            echo '</div>';
        }
    } else {
        echo "No books available.";
    }
    $db_connect->close();
    ?>
    </div>
    <script>
        function requestBook(bookName) {
            if (bookName) {
                alert('You need to log in to request ' + bookName + '. If you want to log in, please click OK.');
                window.location.href = 'student/s_login.php';
            } else {
                alert('Book is not available');
            }
        }
    </script>
    <?php include "common/footer.php"; ?>
</body>
</html>