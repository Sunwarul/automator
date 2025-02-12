<?php
session_start();

$file = $_GET['file'] ?? 'index.php';
// Get the last modified time of index.php (or the main file you're editing)
$lastModified = filemtime('../' . $file);

// Store last modified time in session
if (!isset($_SESSION['last_modified'])) {
    $_SESSION['last_modified'] = $lastModified;
}

// If file has changed, trigger reload
if ($_SESSION['last_modified'] < $lastModified) {
    $_SESSION['last_modified'] = $lastModified;
    echo 'reload';
} else {
    echo 'nochange';
}
