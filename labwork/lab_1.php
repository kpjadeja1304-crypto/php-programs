<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Input Sanitization - Lab 1</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $email = strtolower($email);
    $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    echo "<h2>Sanitized Output</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p><strong>Message:</strong><br>" . nl2br($safeMessage) . "</p>";
}
?>

<h1>Contact Form</h1>
<form method="post" action="">
    <label>Name:<br>
        <input type="text" name="name" required>
    </label><br><br>

    <label>Email:<br>
        <input type="email" name="email" required>
    </label><br><br>

    <label>Message:<br>
        <textarea name="message" rows="6" cols="40" required></textarea>
    </label><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
