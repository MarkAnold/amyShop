<?php

namespace App\Controllers\Admin;

use App\Controllers\AmySolution\MasterController;

class MainController extends MasterController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getMenusItems()
    {
        $menus = $this->menus->findAll();
        return $menus;
    }
}
