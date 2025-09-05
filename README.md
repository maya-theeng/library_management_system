📚 Library Management System
 
A simple Library Management System (LMS) built with PHP, CSS, and MySQL.
This project allows students to register, log in, and manage library activities such as borrowing and returning books.
 
🚀 Features
 
Student registration and login
 
Book management (add, edit, delete, list books)
 
Borrow and return system
 
Database-driven (MySQL)
 
Clean and simple UI
 
🛠️ Tech Stack
 
Backend: PHP (Core PHP)
 
Frontend: HTML, CSS
 
Database: MySQL
 

⚙️ Installation & Setup
 
Clone the repository:
 
git clone https://github.com/maya-theeng/library_management_system.git
 
 
Move the project to your server’s root directory (htdocs for XAMPP, www for WAMP, etc.).
 
Import the database:
 
Open phpMyAdmin
 
Create a new database (e.g., library_db)
 
Import the tables.txt SQL schema
 
Update database connection details in common/db_connect.php (if exists).
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_db";
 
 
Start Apache & MySQL, then open the project in browser:
 
http://localhost/library_management_system
 
🧑‍🎓 Usage
 
Register as a new student
 
Log in using your credentials
 
Borrow and return books from the student dashboard
 
Admin/management features 
 
 
🚧 Future Improvements
 
Admin panel for managing students and books
 
Fine calculation for late returns
 
Search and filter for books
 
Role-based authentication (Admin, Student, Librarian)
 
Responsive design

    
