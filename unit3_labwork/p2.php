<?php
if (isset($_GET['name']) && !empty(trim($_GET['name']))) {
    
    $name = htmlspecialchars(trim($_GET['name']));
    echo "Welcome, $name!";
} else {
    
    echo '
    <form method="GET" action="">
        Enter your name: <input type="text" name="name" required>
        <input type="submit" value="Submit">
    </form>';
}
?>
