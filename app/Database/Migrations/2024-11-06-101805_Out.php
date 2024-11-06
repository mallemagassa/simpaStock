<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Out extends Migration
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
            'profit' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'amount_total_sale' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'amount_total_purchase' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'ref' => [
               'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'observation' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true,
            ],
            'product_out' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'shop_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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

        $this->forge->createTable('outs');
    }

    public function down()
    {
        $this->forge->dropTable('outs');
    }
}
