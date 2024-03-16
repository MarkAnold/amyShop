<?php

namespace App\Controllers\Admin\Home;

use App\Controllers\Admin\MainController;

class IndexController extends MainController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('admin/home',[
            'menu' => $this->getMenusItems(),
        ]);
    }
}
