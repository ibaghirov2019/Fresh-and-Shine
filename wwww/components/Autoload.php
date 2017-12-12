<?php

/**
 * The __autoload function for automatically connecting classes
 */
function __autoload($class_name)
{
    // An array of folders in which the necessary classes can be located
    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );

    // We pass along an array of folders
    foreach ($array_paths as $path) {

        // Form the name and path to the file with the class
        $path = ROOT . $path . $class_name . '.php';

        // If such a file exists, we connect it
        if (is_file($path)) {
            include_once $path;
        }
    }
}
