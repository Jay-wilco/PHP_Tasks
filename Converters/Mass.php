<!DOCTYPE html>
<html>

<head>

    <h2>MAss converter</h2>
    <form method="post">
        <label>Enter Value</label>
        <input type="number" name="value" step="any" required>
        <label> Choose conversion:</label>
        <select name="conversions">
            <option value="kg_to_g"> Kilograms to grams</option>
            <option value="g_to_kg"> grams to Kilograms</option>
        </select>
        <input type="submit" name="convert" value="Convert">

    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['convert'])) {
        $value = $_POST['value'];
        $conversion = $_POST['conversion'];

        if ($conversion == "kg_to_g") {
            $result = $value * 1000;
            echo "<h3>Result:</h3>";
            echo "<p>$value kg = $result g</p>";
        } else if ($conversion == "g_to_kg") {
            $result = $value / 1000;
            echo "<h3>Result:</h3>";
            echo "<p>$value g = $result kg</p>";
        }
    }

    ?>
    </body>

</html>