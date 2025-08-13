<!DOCTYPE html>
<html>
<head>
    <title>Print Numbers Using For and Foreach</title>
</head>
<body>

<form method="post">
    <label>Start Number: <input type="number" name="start" required></label><br><br>
    <label>End Number: <input type="number" name="end" required></label><br><br>
    <input type="submit" value="Print Numbers">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = intval($_POST['start']);
    $end = intval($_POST['end']);

    if ($start > $end) {
        echo "<p style='color:red;'>Start number should be less than or equal to end number.</p>";
    } else {
        echo "<h2>Using for loop:</h2>";
        for ($i = $start; $i <= $end; $i++) {
            echo $i . "<br>";
        }

        echo "<h2>Using foreach loop:</h2>";
        $numbers = range($start, $end);
        foreach ($numbers as $num) {
            echo $num . "<br>";
        }
    }
}
?>

</body>
</html>
