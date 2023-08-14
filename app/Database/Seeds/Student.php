<?php

namespace App\Database\Seeds;

use App\Models\Student as ModelsStudent;
use CodeIgniter\Database\Seeder;

class Student extends Seeder
{
    public function run()
    {
        $studentModel = new ModelsStudent();
        $faker = \Faker\Factory::create();
        $faker->seed(4312);

        for ($i = 0; $i < 200; $i++) {
            $gender = $faker->randomElement(array('L', 'P'));
            $nis = $faker->numberBetween(10000, 99999);
            $studentModel->insert([
                'nis' => $nis,
                'name' => $faker->name($gender == 'L' ? 'male' : 'female'),
                'gender' => $gender,
                'class' => $faker->randomElement(array('X A', 'X B', 'XI A', 'XI B', 'XII A', 'XII B')),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'password' => createPassword($nis),
            ]);
        }
    }
}
