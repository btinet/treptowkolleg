<?php

# Nach eigenen Wünschen anpassen
const APP_NAME = 'App';

# Ab hier nichts ändern
const DS = DIRECTORY_SEPARATOR;
const ROOT_DIRECTORY = __DIR__ . DS;

function customAutoloader( $class )
{

    $classPath = str_replace('\\', '/', $class);
    $classPath = substr($classPath,strlen(APP_NAME));
    $file = ROOT_DIRECTORY . 'src' . DS . $classPath.  '.php';

    if ( file_exists($file) ) {
        require_once $file;
    }
}

spl_autoload_register( 'customAutoloader' );
