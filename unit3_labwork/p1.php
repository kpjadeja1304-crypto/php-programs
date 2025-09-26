<?php
session_start();


$valid_username = "ankit";
$valid_password = "password123";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    
    if ($username === $valid_username && $password === $valid_password) {
    
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        echo "Login successful! Welcome, " . htmlspecialchars($username) . ".";
    } else {
        echo "Invalid username or password.";
    }
} else {
    
    echo '
    <form method="POST" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>';
}
?>
