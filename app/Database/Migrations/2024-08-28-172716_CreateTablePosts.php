<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePosts extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ));
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addKey('id', true);
        $this->forge->createTable('posts');
    }

    public function down(): void
    {
        $this->forge->dropForeignKey('user_id', 'posts');
        $this->forge->dropTable('posts');
    }
}
