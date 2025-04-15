<!DOCTYPE html>
<html>

<head>
    <title>Celsius to Fahrenheit Converter</title>
</head>

<body>


    <h2>Temperature converter</h2>

    <form method="post"">
Enter temperature in Celsius: <input type=" number" name="celsius" step="any" required>
        <input type="submit" name="convert" value="Convert">

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['convert'])) {
        $celsius = $_POST['celsius'];
        $fahrenheit = ($celsius * 9 / 5 + 32);
        $kelvin = $celsius + 273.15;

        echo "<h3>results:</h3>";
        echo "<p>$celsius C = $fahrenheit  F</p>";
        echo "<p>$celsius C = $kelvin F</p>";
    }
    ?>



    </head>

    <body>