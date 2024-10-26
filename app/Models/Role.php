<?php

namespace App\Models;

use CodeIgniter\Model;

class Role extends Model
{
    protected $table            = 'groups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'title', 'description'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules      = [
        'name'        => 'required|string|max_length[100]',
        'title'       => 'permit_empty|string|max_length[100]',
        'description' => 'permit_empty|string|max_length[255]',
    ];
    
    protected $validationMessages   = [
        'name' => [
            'required' => 'Le nom du groupe est obligatoire.',
            'max_length' => 'Le nom du groupe ne doit pas dépasser 100 caractères.'
        ],
        'title' => [
            'max_length' => 'Le titre du groupe ne doit pas dépasser 100 caractères.'
        ],
        'description' => [
            'max_length' => 'La description ne doit pas dépasser 255 caractères.'
        ],
    ];
    
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getGroups()
    {
        return $this->findAll();
    }

    public function getRolesWithPermissions()
    {
        $roles = $this->select('groups.*, permissions.id as permission_id, permissions.name as permission_name')
                      ->join('group_permissions', 'groups.id = group_permissions.group_id', 'left')
                      ->join('permissions', 'group_permissions.permission_id = permissions.id', 'left')
                      ->findAll();
    
        // Tableau pour stocker les rôles avec les permissions associées
        $rolesWithPermissions = [];
    
        foreach ($roles as $role) {
            $roleId = $role['id'];
    
            // Si ce rôle n'existe pas encore dans le tableau, on l'ajoute avec ses détails
            if (!isset($rolesWithPermissions[$roleId])) {
                $rolesWithPermissions[$roleId] = [
                    'id' => $role['id'],
                    'name' => $role['name'],
                    'description' => $role['description'],
                    'permissions' => [], // Initialiser les permissions comme un tableau vide
                ];
            }
    
            // Ajouter la permission au rôle si une permission est disponible
            if ($role['permission_id'] && $role['permission_name']) {
                $rolesWithPermissions[$roleId]['permissions'][] = [
                    'id' => $role['permission_id'],
                    'name' => $role['permission_name'],
                ];
            }
        }
    
        // Réinitialiser les clés numériques pour avoir un tableau simple d'éléments
        return array_values($rolesWithPermissions);
    }
    
}
