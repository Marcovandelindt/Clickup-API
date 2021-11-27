<?php

namespace App\Controllers;

use App\View;
use Dcblogdev\PdoWrapper\Database;
use Symfony\Component\Routing\RouteCollection;
use ClickUp\Client as ClickUpClient;

class HomeController
{
    protected $connection;

    public function __construct()
    {
        global $databaseParams;
        $this->connection = new Database($databaseParams);
    }

    /**
     * Index action
     */
    public function index()
    {
        $data = [
            'users' => $this->connection->run('SELECT * FROM `users`')->fetchAll(),
            'test' => 'test',
        ];

        View::make('pages/home', $data);
    }
}