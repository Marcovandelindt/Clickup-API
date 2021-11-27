<?php

namespace App\Controllers;

use App\Models\Team;
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
        $users = $this->connection->run('SELECT * FROM `users`')->fetchAll();

        if (!empty($users)) {
            foreach ($users as $user) {

                # Create new ClickUpClient instance
                $client = new ClickUpClient($user['clickup_access_token']);

               $teams = $client->teams();

                if (!empty($teams)) {
                    foreach ($teams as $team) {
                        $existingTeam = $this->connection->run('SELECT * FROM `teams` WHERE `clickup_id` = ' . $team->id() . '')->fetchAll();

                        if (empty($existingTeam)) {
                            $teamObject = new Team;
                            $teamObject->clickup_id = $team->id();
                            $teamObject->name = $team->name();
                            $teamObject->created_at = date('Y-m-d H:i:s');
                            $teamObject->save();
                        }
                    }
                }
            }
        }
    }
}