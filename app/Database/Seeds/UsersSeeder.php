<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        $data = [
            'email' => 'admin@example.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'name' => 'Admin',
            'surnames' => 'Admin',
            'gender' => 'male',
            'date_of_birth' => Time::now(),
        ];

        // Inserta el usuario en la tabla 'users'
        $this->db->table('users')->insert($data);
    }
}
