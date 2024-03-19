<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolePermissionsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_permission_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'permission_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at dateTime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);
        $this->forge->addPrimaryKey('role_permission_id');
        $this->forge->createTable('roles_permission',true,['COMMENT' => 'Stores users related information']);
    }

    public function down()
    {
        $this->forge->dropTable('roles_permission',true);
    }
}
