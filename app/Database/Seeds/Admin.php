<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        helper('any');

        $data = [
            'username' => 'admin',
            'name' => 'admin',
            'password' => createPassword('admin123')
        ];

        // Using Query Builder
        $this->db->table('admins')->insert($data);
    }
}
