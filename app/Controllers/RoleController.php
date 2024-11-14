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
                    'description' => $role['description'],
                    'permissions' => [],
                ];
            }

        
            foreach ($role['permissions'] as $permission) {
                $data['roles'][$role['id']]['permissions'][] = [
                    'id' => $permission['id'],
                    'name' => $permission['name'],
                ];
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
        $permissions = $this->request->getPost('permissionsAdd'); 
        $permissionsArray = is_string($permissions) ? explode(',', $permissions) : $permissions;
        // Filtrer les valeurs vides
        $permissionsArray = array_filter($permissionsArray, fn($value) => !empty($value));
        
        $groupData = [
            'name' => $this->request->getPost('name'),
            'title' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'), // Peut être null
        ];
    
        // Sauvegarde du groupe
        if ($this->role->save($groupData)) {
            $groupId = $this->role->insertID();
    
            if (!empty($permissionsArray)) {
                // Récupération des noms et IDs de permissions
                $permissionsList = $this->db->table('permissions')->select('id, name')->get()->getResultArray();
                $permissionMap = array_column($permissionsList, 'id', 'name'); // Crée un tableau [name => id]
    
                // Conversion des noms de permissions en IDs
                $groupPermissionsData = [];
                foreach ($permissionsArray as $permissionName) {
                    if (!isset($permissionMap[$permissionName])) {
                        return redirect()->back()->with('error', "Permission '$permissionName' est invalide.");
                    }
    
                    $groupPermissionsData[] = [
                        'group_id' => $groupId,
                        'permission_id' => $permissionMap[$permissionName],
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
        $permissionsArray = array_filter($permissionsArray, fn($value) => !empty($value));
    
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
    
            if (!empty($permissionsArray)) {
                // Récupération des IDs en fonction des noms de permissions
                $validPermissions = $this->db->table('permissions')
                    ->select('id, name')
                    ->whereIn('name', $permissionsArray)
                    ->get()
                    ->getResultArray();
    
                // Transformation des résultats en un tableau associatif [name => id]
                $validPermissionMap = array_column($validPermissions, 'id', 'name');
    
                $groupPermissionsData = [];
                foreach ($permissionsArray as $permissionName) {
                    if (!isset($validPermissionMap[$permissionName])) {
                        return redirect()->back()->with('error', "Permission '$permissionName' est invalide.");
                    }
    
                    $groupPermissionsData[] = [
                        'group_id' => $id,
                        'permission_id' => $validPermissionMap[$permissionName],
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
