<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SetupDatabase extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'unique'     => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique'     => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}