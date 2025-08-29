<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Name Formatting for Certificates</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['fullname'] ?? '');
    $fullNameLower = strtolower($fullName);
    $words = explode(' ', $fullNameLower);
    foreach ($words as &$word) {
        $word = ucfirst($word);
    }
    unset($word);
    $formattedName = implode(' ', $words);

    echo "<h2>Formatted Name</h2>";
    echo "<p><strong>Original:</strong> " . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p><strong>Formatted:</strong> " . htmlspecialchars($formattedName, ENT_QUOTES, 'UTF-8') . "</p>";
}
?>

<h1>Certificate Name Formatter</h1>
<form method="post" action="">
    <label>Enter full name:<br>
        <input type="text" name="fullname" required>
    </label><br><br>
    <input type="submit" value="Format Name">
</form>

</body>
</html>
