<?php
// Database connection for phpMyAdmin and the 'khushi_db' database
$servername = "localhost";
$username = "root"; // Default username for phpMyAdmin
$password = ""; // Default password for phpMyAdmin (change if necessary)
$dbname = "amchi_mumbai"; // Replace with the correct database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Signup logic
if (isset($_POST['signUp'])) {
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Check if email already exists
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert new user into the database
        $signup_query = "INSERT INTO users (fName, lName, email, password) VALUES ('$fName', '$lName', '$email', '$password')";
        if ($conn->query($signup_query) === TRUE) {
            // Redirect to home.html upon successful signup
            header("Location: home.html");
            exit();
        } else {
            echo "Error: " . $signup_query . "<br>" . $conn->error;
        }
    }
}

// Login logic
if (isset($_POST['signIn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if email exists in the database
    $login_query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($login_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Redirect to home.html upon successful login
            header("Location: home.html");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Email not registered!";
    }
}

// Close the connection
$conn->close();
?>
