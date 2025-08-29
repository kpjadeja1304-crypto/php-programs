<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Moderation System</title>
</head>
<body>

<?php
$bannedWords = ['spam', 'hack', 'phish', 'malware', 'scam'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = trim($_POST['comment'] ?? '');
    $commentLower = strtolower($comment);
    $flagged = false;
    foreach ($bannedWords as $word) {
        if (strpos($commentLower, $word) !== false) {
            $flagged = true;
            break;
        }
    }
    $safeComment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');

    echo "<h2>User Comment</h2>";
    echo "<blockquote>$safeComment</blockquote>";

    if ($flagged) {
        echo "<p style='color: red; font-weight: bold;'>Warning: Your comment contains banned words and is flagged for review.</p>";
    } else {
        echo "<p style='color: green;'>Comment is clean and approved.</p>";
    }
}
?>

<h1>Comment Moderation</h1>
<form method="post" action="">
    <label>Enter your comment:<br>
        <textarea name="comment" rows="5" cols="50" required></textarea>
    </label><br><br>
    <input type="submit" value="Submit Comment">
</form>

</body>
</html>
