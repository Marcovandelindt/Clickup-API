<?php

namespace App\Models;
use Dcblogdev\PdoWrapper\Database;

class Team
{
    public $id;
    public $clickup_id;
    public $name;
    public $created_at;
    public $updated_at;

    /**
     * Constructor
     */
    public function __construct()
    {
        global $databaseParams;
        $this->connection = new Database($databaseParams);
    }

    /**
     * Save a new team
     */
    public function save()
    {
        $sql = '
            INSERT INTO `teams` (
                `clickup_id`,
                `name`,
                `created_at`                
            ) VALUES (
                "' . $this->clickup_id . '",
                "' . $this->name . '",
                "' . $this->created_at . '"      
            );
        ';
        $this->connection->run($sql);

        return true;

    }
}