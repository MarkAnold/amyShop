<?php

namespace App\Database\Seeds;

use App\Models\PermissionsModel;
use App\Models\RolePermissionsModel;
use App\Models\RolesModel;
use CodeIgniter\Database\Seeder;

class ConfigSeeder extends Seeder
{
    // Helper['setting'];
    public function run()
    {
        

        $roles = [
            ['name' => 'SuperAdmin'],
            ['name' => 'Admin'],
            ['name' => 'recieption'],
        ];

        $permissions = [
            ['name'=> 'Read'],
            ['name'=> 'Delete'],
            ['name'=> 'Update'],
            ['name'=> 'create'],
        ];

        $role_permisssions = [
            ['permission_id'=>'1','role_id'=>'1'],
            ['permission_id'=>'2','role_id'=>'1'],
            ['permission_id'=>'3','role_id'=>'1'],
            ['permission_id'=>'4','role_id'=>'1'],
            ['permission_id'=>'1','role_id'=>'2'],
            ['permission_id'=>'2','role_id'=>'2'],
            ['permission_id'=>'3','role_id'=>'2'],
            ['permission_id'=>'4','role_id'=>'2'],
            ['permission_id'=>'1','role_id'=>'3'],
            ['permission_id'=>'2','role_id'=>'3'],
        ];
        // models
        $roleModel = new RolesModel();
        $permissionModel = new PermissionsModel();
        $role_permisssionsModel = new RolePermissionsModel();

        // insert
        $roleModel->insertBatch($roles);
        $permissionModel->insertBatch($permissions);
        $role_permisssionsModel->insertBatch($role_permisssions);


        // uSER 
        $user = [
            'username' =>'Super Admin',
            'FullName' =>'Katongole Mark',
            'dob' =>'2001/2/11',
            'role_id' =>'1',
        ];

        $auth = [
            'user_id' => '1',
            'secret_one' => 'admin@amysolution.com',
            'secret_two' => '$2y$10$qWvFec9D1by0sexYr3dON.PTdMNWLuUjVWvWBD8DgS9xcZy89fnmy', //admmin!123
        ];


        $this->db->table('users')->insert($user);
        $this->db->table('auth')->insert($auth);

    }
}
