<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 50,
                'null' => false,
            ],
            'FullName' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'dob' => [
                'type' => 'Date',
                'null' => true,
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
        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('users',true,['COMMENT' => 'Stores users related information']);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
