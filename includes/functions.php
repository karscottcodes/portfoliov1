<?php

function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception('.env file not found');
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_ENV)) {
            $_ENV[$name] = $value;
        }
        if (!array_key_exists($name, $_SERVER)) {
            $_SERVER[$name] = $value;
        }
        putenv("$name=$value");
    }
}

loadEnv(__DIR__ . '/../.env');

$connect = mysqli_connect(
    $_ENV['DB_HOST'], // Host
    $_ENV['DB_USERNAME'], // Username
    $_ENV['DB_PASSWORD'], // Password
    $_ENV['DB_NAME'] // Database
);

mysqli_set_charset($connect, 'UTF8');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}