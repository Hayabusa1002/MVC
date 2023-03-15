<?php
    // Autoload.php loads all files that are in the same folder (libraries) as this file
    spl_autoload_register(function($class)
    {
        $path = '../app/libraries/' . $class . '.php';
        if(file_exists($path)) { require_once $path; }
    })
?>