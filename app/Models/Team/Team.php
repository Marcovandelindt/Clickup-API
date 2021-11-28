<?php

namespace App\Models\Team;

class Team
{
    public $id;
    public $clickup_id;
    public $name;
    public $created_at;
    public $updated_at;

    /**
     * Get the ClickUp ID of a team
     *
     * @return int
     */
    public function getClickUpId()
    {
        return $this->clickup_id;
    }
}