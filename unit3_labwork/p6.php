<?php
session_start(); 


$timeout_duration = 300; 

if (!isset($_SESSION['logged_in'])) {

    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = 'DemoUser';
    $_SESSION['last_activity'] = time();
    echo "<p>Welcome, {$_SESSION['username']}! You are now logged in.</p>";
} else {
    
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
        
        session_unset(); 
        session_destroy(); 
        echo "<p>You have been logged out due to inactivity.</p>";
        exit();
    } else {
        
        $_SESSION['last_activity'] = time();
        echo "<p>Welcome back, {$_SESSION['username']}! You are still active.</p>";
    }
}
?>
