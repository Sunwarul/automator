<?php
$host = 'localhost';
$port = 8000;
$url = "http://$host:$port";


$filename = $argv[1] ?? 'index.php'; // Default to 'index.php' if no argument is provided

// Check if the file exists
if (!file_exists($filename)) {
    die("Error: File '$filename' not found.\n");
}

// Start the server in the background
$command = "php -S $host:$port $filename > /dev/null 2>&1 &";
exec($command);

// Open in default browser
if (PHP_OS_FAMILY === 'Windows') {
    exec("start $url");
} elseif (PHP_OS_FAMILY === 'Darwin') { // macOS
    exec("open $url");
} else { // Linux
    exec("xdg-open $url");
}

echo "Server running at $url (Serving: $filename)\n";
