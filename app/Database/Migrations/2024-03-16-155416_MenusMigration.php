<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenusMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' =>100,
                'null' => false,
            ],
            'url' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'icon' => [
                'type' => 'varchar',
                'constraint' =>50,
                'null' => false,
            ],
            'created_at dateTime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null',
        ]);

        $this->forge->addPrimaryKey('menu_id');
        $this->forge->addForeignKey('parent_id','menus', 'menu_id');
        $this->forge->createTable('menus',true);
    }

    public function down()
    {
        $this->forge->dropTable('menus',true);
    }
}
