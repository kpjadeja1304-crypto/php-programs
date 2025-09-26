<?php

$ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';


$method = $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN';

$logMessage = date('Y-m-d H:i:s') . " - IP: $ip - Method: $method" . PHP_EOL;


file_put_contents('log.txt', $logMessage, FILE_APPEND);


echo "<h2>Request Info</h2>";
echo "<p><strong>IP Address:</strong> $ip</p>";
echo "<p><strong>Request Method:</strong> $method</p>";
?>
