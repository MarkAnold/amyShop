<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PermissionsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'permission_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 50,
                'null' => false,
            ],
            'created_at dateTime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);
        $this->forge->addPrimaryKey('permission_id');
        $this->forge->createTable('permissions',true,['COMMENT' => 'Stores users related information']);
    }

    public function down()
    {
        $this->forge->dropTable('permissions');
    }
}
