<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Student extends Migration
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
            'nis' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'name' => [
                'type' => 'tinytext',
            ],
            'gender' => [
                'type' => 'varchar',
                'constraint' => 1
            ],
            'class' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'address' => [
                'type' => 'tinytext'
            ],
            'phone' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'password' => [
                'type' => 'text'
            ],
            'created_at datetime not null default current_timestamp',
            'updated_at datetime not null default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->createTable('students');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}
