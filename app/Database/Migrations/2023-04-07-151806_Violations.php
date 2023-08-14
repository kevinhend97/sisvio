<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Punishment extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'code' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'title' => [
                'type' => 'tinytext',
            ],
            'description' => [
                'type' => 'text',
            ],
            'min_point' => [
                'type' => 'int'
            ],
            'max_point' => [
                'type' => 'int'
            ],
            'created_at datetime not null default current_timestamp',
            'updated_at datetime not null default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->createTable('violations');
        $this->forge->addUniqueKey('code');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('violations');
    }
}
