<?php

class View {
    public static function showView($view, $output = null) {
        $file = VIEW_PATH . $view . '.php';
        if (file_exists($file)) {
            ob_start();

            if ($output) {
                extract($output);
            }

            require_once $file;

            $html = ob_get_contents();
            ob_end_clean();

            exit($html);
        }
    }
}