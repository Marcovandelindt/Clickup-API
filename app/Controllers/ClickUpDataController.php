<?php

namespace App\Controllers;

use App\Models\Team\Team;
use App\Models\Team\TeamManager;
use App\Models\User\UserManager;
use Dcblogdev\PdoWrapper\Database;
use ClickUp\Client as ClickUpClient;

class ClickUpDataController
{
    protected $connection;

    public function __construct()
    {
        global $databaseParams;
        $this->connection = new Database($databaseParams);
    }

    /**
     * Retrieve data
     */
    public function retrieveData()
    {
        $users = UserManager::getAllUsers();

        if (!empty($users)) {
            foreach ($users as $user) {

                # Create new ClickUpClient instance
                $client = new ClickUpClient($user->getClickupAccessToken());

                $teams = $client->teams();

                if (!empty($teams)) {
                    foreach ($teams as $team) {
                        $existingTeam = TeamManager::getTeamByClickUpId($team->id());

                        if (!$existingTeam) {
                            $teamObject = new Team;
                            $teamObject->clickup_id = $team->id();
                            $teamObject->name = $team->name();
                            $teamObject->created_at = date('Y-m-d H:i:s');

                            prettyPrint($teamObject, true);

                            TeamManager::saveTeam($team);
                        }
                    }
                }
            }
        }
    }
}