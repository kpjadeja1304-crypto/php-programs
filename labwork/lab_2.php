<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset Token Generator</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $timestamp = time();
        $token = md5($email . $timestamp);
       
        echo "<h2>Password Reset Token</h2>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p><strong>Generated Token:</strong> <code>$token</code></p>";
        echo "<p>Use this token in password reset URLs, for example:</p>";
        echo "<pre>https://yourwebsite.com/reset_password.php?token=$token</pre>";
        echo "<p>This token helps verify the user's identity during password reset by matching it against stored tokens.</p>";
    } else {
        echo "<p style='color:red;'>Please enter a valid email address.</p>";
    }
}
?>

<h1>Password Reset Token Generator</h1>
<form method="post" action="">
    <label>Email:<br>
        <input type="email" name="email" required>
    </label><br><br>
    <input type="submit" value="Generate Token">
</form>

</body>
</html>
