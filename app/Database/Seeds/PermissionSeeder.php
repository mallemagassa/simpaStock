<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'show.product', 'description' => 'Afficher les produits'],
            ['name' => 'create.product', 'description' => 'Créer des produits'],
            ['name' => 'edit.product', 'description' => 'Modifier les produits'],
            ['name' => 'delete.product', 'description' => 'Supprimer les produits'],
            ['name' => 'show.user', 'description' => 'Afficher les utilisateurs'],
            ['name' => 'create.user', 'description' => 'Créer des utilisateurs'],
            ['name' => 'edit.user', 'description' => 'Modifier les utilisateurs'],
            ['name' => 'delete.user', 'description' => 'Supprimer les utilisateurs'],
            ['name' => 'show.stock', 'description' => 'Afficher le stock'],
            ['name' => 'create.stock', 'description' => 'Créer du stock'],
            ['name' => 'edit.stock', 'description' => 'Modifier le stock'],
            ['name' => 'delete.stock', 'description' => 'Supprimer le stock'],
            ['name' => 'out.stock', 'description' => 'Sortie de stock'],
            ['name' => 'in.stock', 'description' => 'Entrée en stock'],
            ['name' => 'show.unit', 'description' => 'Afficher les unités'],
            ['name' => 'create.unit', 'description' => 'Créer des unités'],
            ['name' => 'edit.unit', 'description' => 'Modifier les unités'],
            ['name' => 'delete.unit', 'description' => 'Supprimer les unités'],
            ['name' => 'show.shop', 'description' => 'Afficher les magasins'],
            ['name' => 'create.shop', 'description' => 'Créer des magasins'],
            ['name' => 'edit.shop', 'description' => 'Modifier les magasins'],
            ['name' => 'delete.shop', 'description' => 'Supprimer les magasins'],
            ['name' => 'show.report', 'description' => 'Afficher les rapports'],
            ['name' => 'create.report', 'description' => 'Créer des rapports'],
            ['name' => 'edit.report', 'description' => 'Modifier les rapports'],
            ['name' => 'delete.report', 'description' => 'Supprimer les rapports'],
            ['name' => 'show.role', 'description' => 'Afficher les roles'],
            ['name' => 'create.role', 'description' => 'Créer des roles'],
            ['name' => 'edit.role', 'description' => 'Modifier les roles'],
            ['name' => 'delete.role', 'description' => 'Supprimer les roles'],
            ['name' => 'show.out', 'description' => 'Afficher les sorties'],
            ['name' => 'create.out', 'description' => 'Créer des sorties'],
            ['name' => 'edit.out', 'description' => 'Modifier les sorties'],
            ['name' => 'delete.out', 'description' => 'Supprimer les sorties'],
        ];

        foreach ($data as $permission) {
            $this->db->table('permissions')->insert($permission);
        }
    }
}
