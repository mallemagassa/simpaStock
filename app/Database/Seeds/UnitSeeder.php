<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Kilogram',
            ],
            [
                'name' => 'Liter',
            ],
            [
                'name' => 'Meter',
            ],
        ];

        // Insérer les données dans la table 'units'
        $this->db->table('units')->insertBatch($data);
    }
}
