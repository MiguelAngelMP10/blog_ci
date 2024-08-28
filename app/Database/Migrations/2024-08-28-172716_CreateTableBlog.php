<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBlog extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ),
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'content' => array(
                'type' => 'TEXT',
            ),

        ));
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addKey('id', true);
        $this->forge->createTable('blogs');
    }

    public function down(): void
    {
        $this->forge->dropForeignKey('user_id', 'blogs');
        $this->forge->dropTable('blogs');
    }
}
