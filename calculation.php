<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <link rel="stylesheet" href="css\style.css">
    <link rel="shortcut icon" href="https://imgs.search.brave.com/OfCCio4siH1eJebWxXApmmatqYi8wuLlVngxOafDAPM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/Yi5zYWFzaHViLmNv/bS9pbWFnZXMvYXBw/L3NlcnZpY2VfbG9n/b3MvMTE5LzBlMWZj/ZWYyMzgxNi9tZWRp/dW0ucG5nPzE1Nzc5/MzE4NDM" type="image/x-icon">

</head>

<body>
    <center>
        <form method="POST and GET">

            <h2>Grade Calculator</h2>
            
            <label for="">Student Name
                <input type="text" name="full_name" required>
            </label>

            <label for="">Unit
                <input type="number" name="ut" step="0.01" min="0" max="100" required>
            </label>
    
            <label for="">Prelim
                <input type="number" name="pm" step="0.01" min="0" max="100" required>
            </label>

            <label for="">Midterm
                <input type="number" name="mt" step="0.01" min="0" max="100" required>
            </label>

            <label for="">Pre-Final
                <input type="number" name="pf" step="0.01" min="0" max="100" required>
            </label>

            <label for="">Final
                <input type="number" name="f" step="0.01" min="0" max="100" required>
            </label>

            <input type="submit" name="result" value="Calculate"">
        </form>

        <form method="get">
            <button type="submit" name="logout" value="true" class="back_button">Logout</button>
        </form>
    
        <?php
        session_start();

        // If the user is logged in, we need to destroy the session when they exit.
        if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
            session_destroy(); // Destroy the session
            header("Location: index.php"); // Redirect to login page
            exit(); // Ensure no further code is executed
        }

        // If the user is not logged in, redirect to the login page
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }

        if (isset($_POST["result"])) {
            $name = $_POST["full_name"];
            $ut = (float)$_POST["ut"];
            $pm = (float)$_POST["pm"];
            $mt = (float)$_POST["mt"];
            $pf = (float)$_POST["pf"];
            $f = (float)$_POST["f"];

            $ave = ($ut + $pm + $mt + $pf + $f) / 5;
            $result = "";

            if ($ave >= 74.5) {
                $result = "<span class='pass'>Passed!</span>";
            } 
        
            else {
                $result = "<span class='failed'>Failed!</span>";
            }
    
            echo "<div class='php'>";
            echo "Student Name: <strong>$name</strong>";
            echo "<br>";
            echo "Average of <strong>Grade</strong> is "."<strong>".number_format($ave, 2) ."%</strong>";
            echo "<br>";
            echo "Result: $result";
            echo "</div>";
        }
        ?>

    </center>

</body>

</html>