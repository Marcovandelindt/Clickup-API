<?php

namespace App\Models\Status;

class Status
{
    const STATUS_OPEN = 1;
    const STATUS_PLANNED_IN = 2;
    const STATUS_REJECTED = 3;
    const STATUS_IN_PROGRESS = 4;
    const STATUS_WAIT = 5;
    const STATUS_CHECK = 6;
    CONST STATUS_FINISHED = 7;
    const STATUS_DONE = 8;

    public $id;
    public $name;
    public $color;
    public $created_at;
    public $modified_at;
}