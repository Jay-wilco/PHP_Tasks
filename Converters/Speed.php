<!DOCTYPE html>
<html>

<head>
    <title>Speed Converter</title>


    <form method="post"">
Enter speed in km/h: <input type=" number" name="kmh" step="any" required>
        <input type="submit" name="convert" value="Convert">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['convert'])) {
            $kmh = $_POST['kmh'];
            $ms = $kmh / 3.6;
            $knots = $kmh / 1.852;

            echo "<h3>Results:</h3>";
            echo "<p>$kmh km/h = " . round($ms, 2) . " m/s</p>";
            echo "<p>$kmh km/h = " . round($knots, 2) . " knots</p>";
        }

        ?>
</head>

<body>