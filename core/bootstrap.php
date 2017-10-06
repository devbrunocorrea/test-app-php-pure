<?php
spl_autoload_register(function ($class) {
    $listPath = array(
        getcwd() . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR,
        getcwd() . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR,
        getcwd() . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
        getcwd() . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'dao' . DIRECTORY_SEPARATOR,
        getcwd() . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,
    );

    foreach ($listPath as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

define('APP_PATH', DIRECTORY_SEPARATOR . 'agenda');
define('JS_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . "js" . DIRECTORY_SEPARATOR);
define('VIEW_PATH', getcwd() . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);