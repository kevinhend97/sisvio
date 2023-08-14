<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentViolations extends Migration
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
            'student_id' => [
                'type' => 'int'
            ],
            'violation_id' => [
                'type' => 'int'
            ],
            'point' => [
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
        $this->forge->createTable('student_violations');
        $this->forge->addForeignKey('student_id', 'students', 'id');
        $this->forge->addForeignKey('violation_id', 'violations', 'id');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('student_violations');
    }
}
