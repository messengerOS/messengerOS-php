<?php

use MessengerOS\MessengerOS\Model\Request;

// Define path/existence of Composer autoloader
$composerAutoloadFile = __DIR__ . '/vendor/autoload.php';
$composerAutoloadFileExists = (is_file($composerAutoloadFile));

if (!class_exists(Request::class)) {
    // Suggest to load Composer autoloader of project
    if (!$composerAutoloadFileExists) {
        //  Can't load the Composer autoloader in this project folder
        error_log("Composer autoloader not found. Execute 'composer install' in the project folder first.");
    } else {
        // Load Composer autoloader
        require_once $composerAutoloadFile;

        // If desired class still not existing
        if (!class_exists(Request::class)) {
            // Suggest to review the Composer autoloader settings
            error_log("Error finding MessengerOS API classes. Please review your autoloading configuration.");
        }
    }
}
