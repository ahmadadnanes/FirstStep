<?php 
spl_autoload_register(function ($class) {
    // Convert the namespace to a file path
    $file = str_replace('\\', '/', $class) . '.php';

    // Check if the file exists and require it
    if (file_exists($file)) {
        require $file;
    }
});