<?php

/**
 * Functions which can be used throughout the whole project
 */


/**
 * Print data in a more readable way
 *
 * @param mixed $data
 * @param bool $withDie
 */
function prettyPrint($data, $withDie = false)
{
    if (!empty($data)) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';

        if ($withDie) {
            die;
        }
    }
}
