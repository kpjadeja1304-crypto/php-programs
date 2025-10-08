<?php
session_start();

// 3.1 Create cookie
if (isset($_GET['set_cookie'])) {
    setcookie("myCookie", "hello cookie", time() + 3600, "/"); // expires in 1 hour
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// 3.2 Read cookie
$cookieValue = isset($_COOKIE['myCookie']) ? $_COOKIE['myCookie'] : 'No cookie set';

// 3.3 Use cookie with header (setting cookie manually with header)
if (isset($_GET['set_cookie_header'])) {
    header("Set-Cookie: headerCookie=headerValue; Path=/; Max-Age=3600; HttpOnly");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// 3.4 Delete cookie
if (isset($_GET['delete_cookie'])) {
    setcookie("myCookie", "", time() - 3600, "/"); // expire cookie in past
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// 3.5 Create session
if (isset($_GET['create_session'])) {
    $_SESSION['user'] = "kp";
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
} 

// 3.6 Destroy session
if (isset($_GET['destroy_session'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Check session value
$sessionUser = isset($_SESSION['user']) ? $_SESSION['user'] : 'No session active';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Cookie & Session Example</title>
</head>
<body>
    <h1>Cookie & Session Demo</h1>

    <p><strong>Cookie Value:</strong> <?php echo htmlspecialchars($cookieValue); ?></p>
    <p><strong>Session User:</strong> <?php echo htmlspecialchars($sessionUser); ?></p>

    <ul>
        <li><a href="?set_cookie=1">Set Cookie</a></li>
        <li><a href="?set_cookie_header=1">Set Cookie via Header</a></li>
        <li><a href="?delete_cookie=1">Delete Cookie</a></li>
        <li><a href="?create_session=1">Create Session</a></li>
        <li><a href="?destroy_session=1">Destroy Session</a></li>
    </ul>
</body>
</html>
