<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <link rel="stylesheet" href="css\login.css">
    <link rel="shortcut icon" href="https://imgs.search.brave.com/OfCCio4siH1eJebWxXApmmatqYi8wuLlVngxOafDAPM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/Yi5zYWFzaHViLmNv/bS9pbWFnZXMvYXBw/L3NlcnZpY2VfbG9n/b3MvMTE5LzBlMWZj/ZWYyMzgxNi9tZWRp/dW0ucG5nPzE1Nzc5/MzE4NDM" type="image/x-icon">
</head>

<body>
    <center>
        <form method="post">
            
            <h1>Grade Calculator</h1>
            <h3>Create New Account</h3>

            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" pattern=".{8,}" title="at least 8 characters" required>

            <hr>

            <button class="create_button">Create Account</button>
            <button onclick="location.href='index.php'" class="back_button" name="back_button">Back</button>

        </form>

        <?php
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Read users from the JSON file, if it exists
            $file = 'users.json';
            if (file_exists($file)) {
                $users = json_decode(file_get_contents($file), true);
            } else {
                $users = [];  // If the file doesn't exist, initialize an empty array
            }

            // Check if the username already exists
            foreach ($users as $user) {
                if ($user['username'] === $username) {
                    echo "<p style='color:red;'>Account already exists. Please create new one</p>";
                    return;
                }
            }

            // Add the new user to the users array
            $users[] = ['username' => $username, 'password' => $password];

            // Write the updated users back to the file
            file_put_contents($file, json_encode($users));

            // Display a success message
            echo "<p>Account created successfully!</p>";
        }
        ?>
    </center>
</body>

</html>