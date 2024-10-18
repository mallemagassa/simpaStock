<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    public string $defaultGroup = 'user';

    public array $groups = []; // Initialisé vide, sera rempli depuis la base de données.
    public array $permissions = []; // Initialisé vide, sera rempli depuis la base de données.
    public array $matrix = []; // Initialisé vide, sera rempli depuis la base de données.

    public function __construct()
    {
        parent::__construct();

        $this->loadGroups();
        $this->loadPermissions();
        $this->loadMatrix();
    }

    protected function loadGroups()
    {
        $groupModel = new \App\Models\Role();
        $this->groups = $groupModel->getGroups();
    }

    protected function loadPermissions()
    {
        $permissionModel = new \App\Models\Permission();
        $this->permissions = $permissionModel->getPermissions();
    }

    protected function loadMatrix()
    {
        // Chargement de la matrice des permissions à partir de la base de données
        // Par exemple, vous pouvez définir cette matrice selon vos besoins
        $this->matrix = [
            'superadmin' => [
                'admin.*',
                'users.*',
                'beta.*',
            ],
            'admin' => [
                'admin.access',
                'users.create',
                'users.edit',
                'users.delete',
                'beta.access',
            ],
            'developer' => [
                'admin.access',
                'admin.settings',
                'users.create',
                'users.edit',
                'beta.access',
            ],
            'user' => [],
            'beta' => [
                'beta.access',
            ],
        ];
    }
}
