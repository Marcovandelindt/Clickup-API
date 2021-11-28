<?php

namespace App\Models\Status;

class StatusManager extends Status
{
    /**
     * Get a status by name
     *
     * @param string $name
     *
     * @return mixed
     */
    public static function getStatusByName($name)
    {
        global $connection;

        $sql = '
            SELECT 
                `s`.*
            FROM
                `statuses` AS `s`
            WHERE
                `s`.`name` = "' . $name . '"
            LIMIT 1    
        ';

        $result = $connection->run($sql)->fetchObject(Status::class);

        if (!empty($result)) {
            return $result;
        }

        return false;
    }

    /**
     * Save a status
     *
     * @param Status $status
     */
    public static function saveStatus(Status $status)
    {
        global $connection;

        $sql = '
             INSERT INTO `statuses` (
                `name`,
                `color`,
                `created_at`
            ) VALUES (
                "' . $status->name . '",
                "' . $status->color . '",
                "' . $status->created_at . '"      
            )
        ';

        $connection->run($sql);
    }
}