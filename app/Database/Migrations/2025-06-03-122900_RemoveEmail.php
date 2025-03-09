<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveEmail extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('users', 'email');
    }

    public function down()
    {
        $this->forge->addColumn('users', [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique'     => true,
            ],
        ]);
    }
}