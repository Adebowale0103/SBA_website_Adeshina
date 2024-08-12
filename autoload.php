<?php

// Define base directory for your project
$baseDir = __DIR__ . '/classes/';

// Register the autoloader function
spl_autoload_register(function ($class) use ($baseDir) {
    // Replace namespace separators with directory separators if needed
    $relativeClass = str_replace('\\', '/', $class);

    // Construct the file path
    $file = $baseDir . $relativeClass . '.php';

    // If the file exists, include it
    if (file_exists($file)) {
        require $file;
    }
});
