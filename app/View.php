<?php

namespace App;

class View
{
    /**
     * Create a new
     *
     * @param string $view
     */
    public static function make($view)
    {
        if (!empty($view)) {
            if (file_exists(APP_ROOT . '/views/' . $view . '.php')) {
                require_once APP_ROOT . '/views/layouts/header.php';
                require_once APP_ROOT . '/views/' . $view . '.php';
                require_once APP_ROOT . '/views/layouts/footer.php';
            } else {
                echo 'This view could not be found';
                die;
            }
        }
    }
}