<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        // Ajouter des groupes
        $this->db->table('groups')->insertBatch([
            [
                'name' => 'superadmin',
                'title' => 'Super Admin',
                'description' => 'Complete control of the site.',
            ],
            [
                'name' => 'admin',
                'title' => 'Admin',
                'description' => 'Day to day administrators of the site.',
            ],
            [
                'name' => 'developer',
                'title' => 'Developer',
                'description' => 'Site programmers.',
            ],
            [
                'name' => 'user',
                'title' => 'User',
                'description' => 'General users of the site. Often customers.',
            ],
            [
                'name' => 'beta',
                'title' => 'Beta User',
                'description' => 'Has access to beta-level features.',
            ],
        ]);

        // Ajouter des permissions
        $this->db->table('permissions')->insertBatch([
            [
                'name' => 'admin.access',
                'description' => 'Can access the site\'s admin area',
            ],
            [
                'name' => 'admin.settings',
                'description' => 'Can access the main site settings',
            ],
            [
                'name' => 'users.manage-admins',
                'description' => 'Can manage other admins',
            ],
            [
                'name' => 'users.create',
                'description' => 'Can create new non-admin users',
            ],
            [
                'name' => 'users.edit',
                'description' => 'Can edit existing non-admin users',
            ],
            [
                'name' => 'users.delete',
                'description' => 'Can delete existing non-admin users',
            ],
            [
                'name' => 'beta.access',
                'description' => 'Can access beta-level features',
            ],
        ]);
    }
}
