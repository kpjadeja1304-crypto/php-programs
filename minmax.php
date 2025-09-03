<!DOCTYPE html>
<html>
<head>
    <title>Find Max and Min Number</title>
</head>
<body>

<form method="post">
    Enter numbers separated by spaces:<br>
    <input type="text" name="numbers" required>
    <input type="submit" value="Find Max and Min">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input string from form
    $input = $_POST['numbers'];

    // Convert the string into an array of integers
    $numbers = array_map('intval', explode(' ', $input));

    // Calculate max and min
    $maxNumber = max($numbers);
    $minNumber = min($numbers);

    echo "<h3>Results:</h3>";
    echo "your array is [".$input."]<br>";
    echo "Maximum number is: " . $maxNumber . "<br>";
    echo "Minimum number is: " . $minNumber;
}
?>

</body>
</html>
