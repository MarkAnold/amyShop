<?php

namespace App\Database\Seeds;

use App\Models\MenusModel;
use CodeIgniter\Database\Seeder;

class MenusSeeder extends Seeder
{
    public function run()
    {
        $model  = new MenusModel();
        
        $data['parents'] = [
            [
                'name'=>'Dashboard',
                'url'=> base_url(),
                'icon'=>'',
            ],
            [
                'name'=>'Products',
                'url'=> base_url(),
                'icon'=>'',
            ]
        ];
        $data['children'] = [
            [
                'name'=>'Add Product',
                'url'=> base_url(),
                'icon'=>'',
                'parent_id'=>'2',
            ],
            [
                'name'=>'View Product',
                'url'=> base_url(),
                'icon'=>'',
                'parent_id'=>'2',
            ]
        ];

        if($model->insertBatch($data['parents'])):
            $model->insertBatch($data['children']);
        endif;
    }
}
