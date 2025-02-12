<?php
$host = 'localhost';
$port = 8000;
$url = "http://$host:$port";

// Get filename from argument
$filename = $argv[1] ?? 'index.php'; // Default to 'index.php' if no argument is provided

// Check if the file exists
if (!file_exists($filename)) {
    die("Error: File '$filename' not found.\n");
}

// Start the server in the background
$command = "php -S $host:$port $filename > /dev/null 2>&1 &";
exec($command);

// Open browser only if it's not already open
if (!file_exists(".vscode/server.lock")) {
    file_put_contents(".vscode/server.lock", "running");
    echo "<script>
        function liveReload() {
            fetch('/__reload')
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'reload') {
                        location.reload();
                    }
                })
                .catch(error => console.error('Live reload error:', error));
        }
        
        setInterval(liveReload, 2000); // Check for changes every 2 seconds
    </script>";
    if (PHP_OS_FAMILY === 'Windows') {
        exec("start $url");
    } elseif (PHP_OS_FAMILY === 'Darwin') { // macOS
        exec("open $url");
    } else { // Linux
        exec("xdg-open $url");
    }
}

// echo "Server running at $url (Serving: $filename)\n";
