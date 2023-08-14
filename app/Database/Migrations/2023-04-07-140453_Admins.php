<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{

    // userId
    // role (manager|sales|admin)
    // username
    // password
    // name
    // email
    // phone
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'password' => [
                'type' => 'tinytext',
            ],
            'created_at datetime not null default current_timestamp',
            'updated_at datetime not null default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true, true);
        $this->forge->createTable('admins');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
