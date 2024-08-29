<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsToUsers extends Migration
{
    public function up(): void
    {
        $fields = [
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'surnames' => ['type' => 'VARCHAR', 'constraint' => 100],
            'gender' => ['type' => 'ENUM', 'constraint' => ['male', 'female', 'other']],
            'date_of_birth' => ['type' => 'DATE'],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down(): void
    {
        $this->forge->dropColumn('users', ['name', 'surnames', 'gender', 'date_of_birth']);

    }
}
