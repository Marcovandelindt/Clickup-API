<?php

namespace App\Controllers;

use App\View;
use Symfony\Component\Routing\RouteCollection;

class HomeController
{
    /**
     * Index action
     */
    public function index()
    {
        View::make('pages/home');
    }
}