<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Waybill extends Migration
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
            'product_out' => [
                'type' => 'TEXT',
                'null' => true,
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

        $this->forge->createTable('waybills');
    }

    public function down()
    {
        $this->forge->dropTable('waybills');
    }
}
