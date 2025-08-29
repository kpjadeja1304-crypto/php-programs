<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Parsing for Batch Evaluation</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csvInput = trim($_POST['csv'] ?? '');
    $lines = explode("\n", $csvInput);

    echo "<h2>Student Averages</h2>";

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $parts = explode(',', $line);
        $name = array_shift($parts);
        $scores = array_map('floatval', $parts);

        if (count($scores) === 0) {
            echo htmlspecialchars($name) . " - No scores provided.<br>";
            continue;
        }
        $avg = array_sum($scores) / count($scores);
        $summary = implode(' ', [$name, '-', 'Avg:', number_format($avg, 2)]);
        echo htmlspecialchars($summary) . "<br>";
    }
}
?>

<h1>Batch Evaluation: CSV Input</h1>
<form method="post" action="">
    <label>Enter student data (one per line, format: Name,score1,score2,...):<br>
        <textarea name="csv" rows="6" cols="40" placeholder="name,score1,score2,..."></textarea>
    </label><br><br>
    <input type="submit" value="Calculate Averages">
</form>

</body>
</html>
