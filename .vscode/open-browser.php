<?php
$host = 'localhost';
$port = 8000;
$url = "http://$host:$port";

// Get filename from argument
$filename = $argv[1] ?? 'index.php'; // Default to 'index.php' if no argument is provided
$baseName = basename($filename);

// Check if the file exists
if (!file_exists($filename)) {
    die("Error: File '$filename' not found.\n");
}


$str = file_get_contents($filename);
$reloadStr = file_get_contents('.vscode/hot-reload.txt');
$reloadStr = str_replace('FILENAME', $baseName, $reloadStr);

if (! str_contains('liveReload()', $str) && ! str_contains('?>', $str)) {
    file_put_contents($filename, $reloadStr, FILE_APPEND);
}

echo "Server running at $url/$baseName\n";
// Start the server in the background
$command = "php -S $host:$port -t .";
// $command = "php -S $host:$port $filename > /dev/null 2>&1 &";
exec($command);

// Open browser only if it's not already open
if (!file_exists(".vscode/server.lock")) {
    file_put_contents(".vscode/server.lock", "running");
    if (PHP_OS_FAMILY === 'Windows') {
        exec("start $url");
    } elseif (PHP_OS_FAMILY === 'Darwin') { // macOS
        exec("open $url");
    } else { // Linux
        exec("xdg-open $url");
    }
}


