<?php

putenv('APP_ENV=production');  


$appEnv = $_ENV['APP_ENV'] ?? getenv('APP_ENV') ?? 'development';


$dbConfigs = [
    'development' => [
        'host' => 'localhost',
        'user' => 'dev_user',
        'password' => 'dev_pass',
        'dbname' => 'dev_db',
    ],
    'staging' => [
        'host' => 'staging.db.server',
        'user' => 'staging_user',
        'password' => 'staging_pass',
        'dbname' => 'staging_db',
    ],
    'production' => [
        'host' => 'prod.db.server',
        'user' => 'prod_user',
        'password' => 'prod_pass',
        'dbname' => 'prod_db',
    ],
];


$dbConfig = $dbConfigs[$appEnv] ?? $dbConfigs['development'];

echo "<h3>Current Environment: $appEnv</h3>";
echo "<pre>";
print_r($dbConfig);
echo "</pre>";
?>
