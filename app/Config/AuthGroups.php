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
        $groupData = $groupModel->findAll();

        // Parcourez chaque groupe et structurez les données
        foreach ($groupData as $group) {
            $this->groups[$group['name']] = [
                'title'       => $group['title'],       // Récupérer le titre depuis la base de données
                'description' => $group['description'], // Récupérer la description depuis la base de données
            ];
        }
    }

    protected function loadPermissions()
    {
        $permissionModel = new \App\Models\Permission();
        $permissionsData = $permissionModel->findAll(); 
        foreach ($permissionsData as $permission) {
            $this->permissions[$permission['name']] = $permission['description'];
        }
    }
    
    protected function loadMatrix()
    {
        $groupPermissionModel = new \App\Models\GroupPermission();
        $permissionModel = new \App\Models\Permission();
        $groupModel = new \App\Models\Role();
    
        // Récupérez tous les groupes
        $groups = $groupModel->findAll();
        
        // Initialisez la matrice
        $this->matrix = [];
    
        foreach ($groups as $group) {
            // Récupérez les permissions associées à chaque groupe
            $groupPermissions = $groupPermissionModel->where('group_id', $group['id'])->findAll();
            
            // Récupérez les noms des permissions
            $permissions = [];
            foreach ($groupPermissions as $groupPermission) {
                $permission = $permissionModel->find($groupPermission['permission_id']);
                if ($permission) {
                    $permissions[] = $permission['name'];
                }
            }
    
            // Assignez les permissions à la matrice
            $this->matrix[$group['name']] = $permissions;
        }
    }
}
