<?php

namespace App\Models\Team;

use App\Models\Team\Team;

/**
 * Manager class for teams
 */

class TeamManager extends Team
{

    /**
     * Get a team by ClickUp ID
     *
     * @param int $clickupId
     *
     * @return mixed Team | false
     */
    public static function getTeamByClickUpId($clickupId)
    {
        global $connection;

        $sql = '
            SELECT
                `t`.*
            FROM
                `teams` AS `t`
            WHERE
                `t`.`clickup_id` = ' . $clickupId .  '
            LIMIT 1    
        ';

        $result = $connection->run($sql)->fetchObject(Team::class);

        if (!empty($result)) {
            return $result;
        }

        return false;
    }

    /**
     * Save a team
     *
     * @param Team $team
     *
     */
    public static function saveTeam(Team $team)
    {
        global $connection;

        $sql = '
            INSERT INTO `teams` (
                `clickup_id`,
                `name`,
                `created_at`
            ) VALUES (
                "' . $team->clickup_id . '",
                "' . $team->name . '",
                "' . $team->created_at . '"      
            )
        ';

        $connection->run($sql);
    }
}