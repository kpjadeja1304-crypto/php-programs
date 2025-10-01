<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Calculator</title>
</head>
<body>

<h2>Simple Calculator</h2>

<form method="post" action="">
    Number 1: <input type="number" name="num1" required><br><br>
    Number 2: <input type="number" name="num2" required><br><br>
    Operation:
    <select name="operation" required>
        <option value="add">Add (+)</option>
        <option value="subtract">Subtract (-)</option>
        <option value="multiply">Multiply (×)</option>
        <option value="divide">Divide (÷)</option>
    </select><br><br>
    <input type="submit" name="submit" value="Calculate">
</form>

<?php
function calculator($num1, $num2, $operation) {
    switch ($operation) {
        case "add":
            return $num1 + $num2;
        case "subtract":
            return $num1 - $num2;
        case "multiply":
            return $num1 * $num2;
        case "divide":
            if ($num2 == 0) {
                return "Error: Division by zero!";
            }
            return $num1 / $num2;
        default:
            return "Invalid operation";
    }
}

if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    $result = calculator($num1, $num2, $operation);

    echo "<h3>Result: $result</h3>";
}
?>

</body>
</html>
