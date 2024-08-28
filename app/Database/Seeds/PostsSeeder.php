<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run()
    {
        // Define un array para almacenar los datos a insertar
        $data = [];

        // Genera 50 registros
        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'title' => "Post Title $i",
                'content' => "This is the content for post number $i.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'user_id' => '1'
            ];
        }

        // Inserta los datos en la tabla 'posts'
        $this->db->table('posts')->insertBatch($data);
    }
}
