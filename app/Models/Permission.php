<?php

namespace App\Models;

use CodeIgniter\Model;

class Permission extends Model
{
    protected $table            = 'permissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'description'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'name'        => 'required|max_length[100]',
        'description' => 'permit_empty|max_length[255]',  // Permet une description vide ou null
    ];
    
    protected $validationMessages   = [
        'name' => [
            'required'   => 'Le nom est obligatoire.',
            'max_length' => 'Le nom ne peut pas dépasser 100 caractères.',
        ],
        'description' => [
            'max_length' => 'La description ne peut pas dépasser 255 caractères.',
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

    public function getPermissions()
    {
        return $this->findAll();
    }

    public function getPermissionsWithRoles()
    {
        $permissions = $this->select('permissions.*, groups.id as role_id, groups.name as role_name')
                            ->join('group_permissions', 'permissions.id = group_permissions.permission_id', 'left')
                            ->join('groups', 'group_permissions.group_id = groups.id', 'left')
                            ->findAll();

        $permissionsWithRoles = [];

        foreach ($permissions as $permission) {
            $permissionId = $permission['id'];

            if (!isset($permissionsWithRoles[$permissionId])) {
                $permissionsWithRoles[$permissionId] = [
                    'id' => $permission['id'],
                    'name' => $permission['name'],
                    'description' => $permission['description'],
                    'roles' => [],
                ];
            }

            if ($permission['role_id'] && $permission['role_name']) {
                $permissionsWithRoles[$permissionId]['roles'][] = [
                    'id' => $permission['role_id'],
                    'name' => $permission['role_name'],
                ];
            }
        }
        
        return array_values($permissionsWithRoles);
    }

}

