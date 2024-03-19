<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_id' => [
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
        $this->forge->addPrimaryKey('role_id');
        $this->forge->createTable('roles',true,['COMMENT' => 'Stores roles in the system']);
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
