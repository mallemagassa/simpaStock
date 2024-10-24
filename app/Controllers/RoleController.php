<?php
namespace App\Controllers;

use App\Models\Permission;
use App\Models\Role;
use CodeIgniter\Controller;

class RoleController extends Controller
{
    protected $role;
    protected $db;

    public function __construct()
    {
        $this->role = new Role();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $permissions = new Permission();
        $data['permissions'] = $permissions->findAll();
        $roles = $this->role->getRolesWithPermissions();

        $data['roles'] = [];
    
        foreach ($roles as $role) {
            if (!isset($data['roles'][$role['id']])) {
                $data['roles'][$role['id']] = [
                    'id' => $role['id'],
                    'name' => $role['name'],
                    'title' => $role['title'],
                    'description' => $role['description'],
                    'permissions' => [],
                ];
            }

            if ($role['permission_name']) {
                $data['roles'][$role['id']]['permissions'][] = $role['id'];
            }
        }
    
        return view('content/crud/role', $data);
    }

    public function create()
    {
        return view('content/crud/create');
    }

    public function store()
    {
        $permissions = $this->request->getPost('permissions'); 
        $permissionsArray = is_string($permissions) ? explode(',', $permissions) : $permissions;

        $groupData = [
            'name' => $this->request->getPost('name'),
            'title' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'), // Peut être null
        ];

        // Sauvegarde du groupe
        if ($this->role->save($groupData)) {
            $groupId = $this->role->insertID();

            if (!empty($permissionsArray)) {
                // Vérification des permissions valides
                $validPermissionIds = $this->db->table('permissions')->select('id')->get()->getResultArray();
                $validPermissionIds = array_column($validPermissionIds, 'id');

                foreach ($permissionsArray as $permissionId) {
                    if (!in_array($permissionId, $validPermissionIds)) {
                        return redirect()->back()->with('error', "Permission ID $permissionId est invalide.");
                    }
                }

                // Préparation des données de permissions
                $groupPermissionsData = [];
                foreach ($permissionsArray as $permissionId) {
                    $groupPermissionsData[] = [
                        'group_id' => $groupId,
                        'permission_id' => $permissionId,
                    ];
                }

                // Insertion des permissions
                $this->db->table('group_permissions')->insertBatch($groupPermissionsData);
            }

            return redirect()->to('/roles')->with('success', 'Le groupe a été ajouté avec succès.');
        }

        return redirect()->back()->with('error', 'Erreur lors de la création du groupe.');
    }


    

    public function edit($id)
    {
        $data['role'] = $this->role->find($id);
        return view('content/crud/edit', $data);
    }

    public function update($id)
    {
        // Récupération des permissions
        $permissions = $this->request->getPost('permissions'); 
        $permissionsArray = is_string($permissions) ? explode(',', $permissions) : $permissions;
    
        // Préparation des données de groupe
        $groupData = [
            'name' => $this->request->getPost('name'),
            'title' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'), // Peut être null
        ];
    
        // Mise à jour des données du groupe
        if ($this->role->update($id, $groupData)) {
            // Suppression des permissions existantes pour ce groupe
            $this->db->table('group_permissions')->where('group_id', $id)->delete();
    
            // Vérification des permissions valides
            if (!empty($permissionsArray)) {
                // Récupération des IDs de permissions valides
                $validPermissionIds = $this->db->table('permissions')->select('id')->get()->getResultArray();
                $validPermissionIds = array_column($validPermissionIds, 'id');
    
                foreach ($permissionsArray as $permissionId) {
                    if (!in_array($permissionId, $validPermissionIds)) {
                        return redirect()->back()->with('error', "Permission ID $permissionId est invalide.");
                    }
                }
    
                // Préparation des nouvelles données de permissions
                $groupPermissionsData = [];
                foreach ($permissionsArray as $permissionId) {
                    $groupPermissionsData[] = [
                        'group_id' => $id,
                        'permission_id' => $permissionId,
                    ];
                }
    
                // Insertion des nouvelles permissions
                $this->db->table('group_permissions')->insertBatch($groupPermissionsData);
            }
    
            return redirect()->to('/roles')->with('success', 'Le groupe a été mis à jour avec succès.');
        }
    
        return redirect()->back()->with('error', 'Erreur lors de la mise à jour du groupe.');
    }
    
    
    

    public function delete($id)
    {
        $this->role->delete($id);
        return redirect()->to('/roles');
    }
}
