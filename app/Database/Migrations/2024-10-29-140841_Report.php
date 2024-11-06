<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Report extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'amount_total' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'quantity_before' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'quantity_after' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'ops' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'shop_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('shop_id', 'shops', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('reports');
    }

    public function down()
    {
        //
    }
}










