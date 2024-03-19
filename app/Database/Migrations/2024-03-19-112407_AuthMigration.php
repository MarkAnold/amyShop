<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'auth_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true
            ],
            'secret_one' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'secret_two' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'created_at dateTime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);

        $this->forge->addPrimaryKey('auth_id');
        $this->forge->addUniqueKey('secret_one');
        $this->forge->createTable('auth');
    }

    public function down()
    {
        $this->forge->dropTable('auth', true);
    }
}
