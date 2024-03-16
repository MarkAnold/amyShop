<?php

namespace App\Controllers\AmySolution;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenusModel;

class MasterController extends BaseController
{
    protected $menus;
    public function __construct()
    {
        $this->menus = new MenusModel();
    }

    
}
