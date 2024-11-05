<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddWaybillIdToOuts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('outs', [
            'waybill_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
        ]);

        $this->forge->addForeignKey('waybill_id', 'waybills', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey('outs', 'outs_Waybill_id_foreign');
        $this->forge->dropColumn('outs', 'Waybill_id');
    }
}
