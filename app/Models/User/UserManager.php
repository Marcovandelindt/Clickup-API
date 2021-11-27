<?php

namespace App\Models\User;

use App\Models\User\User;

/**
 * Manager class for the users
 */

class UserManager extends User
{
    /**
     * Get a user by id
     *
     * @param int $id
     *
     * @return mixed User | false
     */
    public static function getUserById($id)
    {
        global $connection;

        $sql = '
            SELECT
                `u`.*
            FROM
                `users` AS `u`
            WHERE
                `u`.`id` = ' . $id . '
            LIMIT 1     
        ';

        $result = $connection->run($sql)->fetchObject(User::class);

        if (!empty($result)) {
            return $result;
        }

        return false;
    }

    /**
     * Get all users
     *
     * @return mixed array | false
     */
    public static function getAllUsers()
    {
        global $connection;

        $sql = '
            SELECT
                `u`.*
            FROM
                `users` AS `u`
        ';

        $result = $connection->run($sql)->fetchAll(\PDO::FETCH_CLASS, User::class);

        if (!empty($result)) {
            return $result;
        }

        return false;
    }
}