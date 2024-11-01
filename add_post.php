<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
  

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "New review added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
</head>
<body>
    <h1>Add review</h1>
    <form method="POST" action="add_post.php">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="5" required></textarea><br><br>

        <input type="submit" value="Add review">
    </form>
</body>
</html>
<style>
        :root {
            --primary-color: #2887ff;
            --primary-color-dark: #2476da;
            --text-dark: #0a0a0a;
            --text-light: #737373;
            --extra-light: #f3f4f6;
            --white: #ffffff;
            --max-width: 1200px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--extra-light);
            color: var(--text-dark);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: var(--max-width);
            margin: auto;
            background: var(--white);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            padding: 10px;
            border: 1px solid var(--text-light);
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: var(--primary-color-dark);
        }
    </style>
