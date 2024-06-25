<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],

            "name" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            "username" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            "email" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            "password" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            "picture" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            "bio" => [
                'type' => 'TEXT',
                'constraint' => 255
            ],

            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp'
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id', 'pk_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
