<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            background: rgb(79, 184, 58);
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        #calc {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        form p {
            margin-bottom: 15px;
        }

        input[type="number"],
        input[readonly] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[readonly] {
            background-color: #f0f0f0;
            color: #555;
        }

        input[type="submit"] {
            width: 85px;
            margin: 5px;
            padding: 10px 0;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        b {
            display: block;
            margin-top: 8px;
            color: #444;
        }
    </style>

</head>


<?php
$first_num = $_POST['first_num'];
$second_num = $_POST['second_num'];
$operator = $_POST['operator'];
$result = '';

if (is_numeric($first_num) && is_numeric($second_num)) {
    switch ($operator) {
        case "Add":
            $result = $first_num + $second_num;
            break;
        case "Subtract":
            $result = $first_num - $second_num;
            break;
        case "Multiply":
            $result = $first_num * $second_num;
            break;
        case "Divide":
            $result = $first_num / $second_num;
    }
}


?>

<body>

    <div id="calc">
        <h1>PHP - Simple Calculator</h1>
        <form action="" method="post">
            <p>
                <input type="number" name="first_num" id="first_num" required="required" value="<?php echo $first_num; ?>" /> <b>First Number</b>
            </p>
            <p>
                <input type="number" name="second_num" id="second_num" required="required" value="<?php echo $second_num; ?>" /> <b>Second Number</b>
            </p>

            <p>
                <input readonly="readonly" name="result" value="<?php echo $result; ?>"><b>Result</b>
            </p>
            <input type="submit" name="operator" value="Add" />
            <input type="submit" name="operator" value="Subtract" />
            <input type="submit" name="operator" value="Multiply" />
            <input type="submit" name="operator" value="Divide" />





        </form>



    </div>


</body>

</html>