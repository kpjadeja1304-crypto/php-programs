<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['theme'])) {
        
        setcookie('preferred_theme', $_POST['theme'], time() + 30*24*60*60, '/');
    }
    if (!empty($_POST['language'])) {
        
        setcookie('preferred_language', $_POST['language'], time() + 30*24*60*60, '/');
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


$theme = $_COOKIE['preferred_theme'] ?? 'light';
$language = $_COOKIE['preferred_language'] ?? 'en';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Preference via Cookies</title>
</head>
<body style="background-color: <?= $theme === 'dark' ? '#222' : '#fff' ?>; color: <?= $theme === 'dark' ? '#eee' : '#000' ?>;">

    <h2>Your Preferences</h2>
    <p>Theme: <strong><?= htmlspecialchars($theme) ?></strong></p>
    <p>Language: <strong><?= htmlspecialchars($language) ?></strong></p>

    <form method="POST" action="">
        <label>
            Theme:
            <select name="theme">
                <option value="light" <?= $theme === 'light' ? 'selected' : '' ?>>Light</option>
                <option value="dark" <?= $theme === 'dark' ? 'selected' : '' ?>>Dark</option>
            </select>
        </label><br><br>

        <label>
            Language:
            <select name="language">
                <option value="en" <?= $language === 'en' ? 'selected' : '' ?>>English</option>
                <option value="es" <?= $language === 'es' ? 'selected' : '' ?>>Hindi</option>
                <option value="fr" <?= $language === 'fr' ? 'selected' : '' ?>>Maithli</option>
            </select>
        </label><br><br>

        <button type="submit">Save Preferences</button>
    </form>

</body>
</html>
