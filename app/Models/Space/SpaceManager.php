<?php

namespace App\Models\Space;

use App\Models\Space\Space;

class SpaceManager extends Space
{
    /**
     * Get Space by clickUpId
     *
     * @param int $clickupId
     *
     * @return mixed
     */
    public static function getSpaceByClickUpId($clickupId)
    {
        global $connection;

        $sql = '
            SELECT
                `s`.*
            FROM
                `spaces` AS `s`
            WHERE
                `s`.`clickup_id` = ' . $clickupId . '
            LIMIT 1    
        ';

        $result = $connection->run($sql)->fetchObject(Space::class);

        if (!empty($result)) {
            return $result;
        }

        return false;
    }

    /**
     * Save a space
     *
     * @param Space $space
     */
    public static function saveSpace(Space $space)
    {
        global $connection;

        $sql = '
            INSERT INTO `spaces` (
                `clickup_id`,
                `name`,
                `created_at`
            ) VALUES (
                "' . $space->clickup_id . '",
                "' . $space->name . '",
                "' . $space->created_at . '"
            )
        ';

        $connection->run($sql);
    }
}