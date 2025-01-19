<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <form method="POST">

            <h2>Grade Calculator</h2>
            
            <label for="">Student Name
                <input type="text" name="full_name" placeholder="Enter Fullname">
            </label>

            <hr>

            <label for="">Unit
                <input type="number" name="ut" placeholder="Enter Unit Grade">
            </label>

            <hr>
    
            <label for="">Prelim
                <input type="number" name="pm" placeholder="Enter Prelim Grade">
            </label>

            <hr>

            <label for="">Midterm
                <input type="number" name="mt" placeholder="Enter Midterm Grade">
            </label>

            <hr>

            <label for="">Pre-Final
                <input type="number" name="pf" placeholder="Enter Pre-Final Grade">
            </label>

            <hr>

            <label for="">Final
                <input type="number" name="f" placeholder="Enter Final Grade">
            </label>

            <input type="submit" name="calculate" value="result"">
        </form>
    
        <?php
        if (isset($_POST["result"])) {
            $name = $_POST["full_name"];
            $ut = $_POST["ut"];
            $pm = $_POST["pm"];
            $mt = $_POST["mt"];
            $pf = $_POST["pf"];
            $f = $_POST["f"];

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
            echo "Average of <strong>Grade</strong> is <strong>$ave%</strong>";
            echo "<br>";
            echo "Result: $result";
            echo "</div>";

        }
        ?>

    </center>

</body>

</html>