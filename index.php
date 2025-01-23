<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <link rel="shortcut icon" href="https://imgs.search.brave.com/OfCCio4siH1eJebWxXApmmatqYi8wuLlVngxOafDAPM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/Yi5zYWFzaHViLmNv/bS9pbWFnZXMvYXBw/L3NlcnZpY2VfbG9n/b3MvMTE5LzBlMWZj/ZWYyMzgxNi9tZWRp/dW0ucG5nPzE1Nzc5/MzE4NDM" type="image/x-icon">
    <link rel="stylesheet" href="css\login.css">
</head>

<body>
    <center>
        <form method="post">

            <h1>Grade Calculator</h1>

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="login_button" name="login">Login</button>

            <hr>

            <button onclick="location.href='create.php'" class="create_button" name="create_button">Create new Account</button>
        </form>

        <?php
        session_start();

        // Redirect to calculation page if the user is already logged in
        if (isset($_SESSION['username'])) {
            header("Location: calculation.php");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Read users from the users.json file
            $file = 'users.json';
            if (file_exists($file) && is_readable($file)) {
                $users = json_decode(file_get_contents($file), true);

                if ($users === null) {
                    $users = []; // Initialize as empty array if the JSON is malformed or empty
                }
            } else {
                $users = []; // Initialize as empty array if the file doesn't exist or is unreadable
            }

            // Loop through users and check the credentials
            foreach ($users as $user) {
                // Check if the username and password match
                if ($user['username'] === $username && $user['password'] === $password) {
                    $_SESSION['username'] = $username;  // Set session variable
                    session_regenerate_id(); // Prevent session fixation attacks
                    header("Location: calculation.php");  // Redirect to the calculation page
                    exit();
                }
            }

            // If no match is found, display an error message
            echo "<p style='color:red;'>Invalid username or password!</p>";
        }
        ?>
    </center>
</body>

</html>
