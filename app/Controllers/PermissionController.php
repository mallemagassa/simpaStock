<?php
namespace App\Controllers;

use App\Models\Permission;
use App\Models\Role;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\PermissionModel;
use Config\AuthGroups;

class PermissionController extends Controller
{
    protected $permission;
    protected $db;

    public function __construct()
    {
        $this->permission = new Permission();
        $this->db = \Config\Database::connect();
    }

    public function index()
    { 
        $roleModel = new Role();
        $data['roles'] = $roleModel->findAll();
        $permissions = $this->permission->getPermissionsWithRoles();
    
        $data['permissions'] = [];
    
        foreach ($permissions as $permission) {
            if (!isset($data['permissions'][$permission['id']])) {
                $data['permissions'][$permission['id']] = [
                    'id' => $permission['id'],
                    'name' => $permission['name'], // Utilisez 'permission_name'
                    'description' => $permission['description'],
                    'roles' => [],
                ];
            }
    
            // Assurez-vous que 'permission_name' existe
            if (isset($permission['group_name'])) {
                $data['permissions'][$permission['id']]['roles'][] = $permission['group_name'];
                //dd($data['permissions']);
            }
        }
    

        return view('content/crud/permission', $data);
    }
    
    public function create()
    {
        return view('content/crud/permission');
    }

    public function store()
    {
        $roles = $this->request->getPost('roles');
        if (is_string($roles)) {
            $rolesArray = explode(',', $roles);
        } else {
            $rolesArray = $roles;
        }
    
        $permissionIdData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description') ?? null, 
        ];
    
        if ($this->permission->save($permissionIdData)) {
            $permissionId = $this->permission->insertID();
    
            if (!empty($rolesArray)) {
                $grouprolesData = [];
    
                foreach ($rolesArray as $rolesId) {
                    // Vérification que le rôle existe dans la table `groups`
                    $groupExists = $this->db->table('groups')->where('id', $rolesId)->countAllResults();
    
                    if ($groupExists > 0) {
                        $grouprolesData[] = [
                            'permission_id' => $permissionId,
                            'group_id' => $rolesId,
                        ];
                    } else {
                        // Gérer l'erreur si le rôle n'existe pas
                        return redirect()->back()->with('error', 'Erreur : Le rôle avec ID ' . $rolesId . ' n\'existe pas.');
                    }
                }
    
                if (!empty($grouprolesData)) {
                    $this->db->table('group_permissions')->insertBatch($grouprolesData);
                }
            }
    
            return redirect()->to('/permissions')->with('success', 'La permission a été ajoutée avec succès.');
        }
    
        return redirect()->back()->with('error', 'Erreur lors de la création de la permission.');
    }
    
    public function edit($id)
    {
        $data['permission'] = $this->permission->find($id);
        return view('content/crud/edit', $data);
    }

    // public function update($id)
    // {
    //     $this->permission->update($id, [
    //         'name' => $this->request->getPost('name'),
    //         'description' => $this->request->getPost('description'),
    //     ]);

    //     return redirect()->to('/permissions');
    // }


    public function update($id)
    {
        $roles = $this->request->getPost('roles');
        if (is_string($roles)) {
            $rolesArray = explode(',', $roles);
        } else {
            $rolesArray = $roles;
        }
    
        $groupData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description') ?? null, // Si aucune description, on utilise `null`
        ];
    
        if ($this->permission->update($id, $groupData)) {
    
            if (!empty($rolesArray)) {
                // Supprime les anciennes permissions liées au rôle
                $this->db->table('group_permissions')->where('permission_id', $id)->delete();
    
                $PermissionsRolesData = [];
    
                foreach ($rolesArray as $roleId) {
                    // Vérification que le rôle existe dans la table `groups`
                    $groupExists = $this->db->table('groups')->where('id', $roleId)->countAllResults();
    
                    if ($groupExists > 0) {
                        $PermissionsRolesData[] = [
                            'group_id' => $roleId,
                            'permission_id' => $id,
                        ];
                    } else {
                        // Gérer l'erreur si le rôle n'existe pas
                        return redirect()->back()->with('error', 'Erreur : Le rôle avec ID ' . $roleId . ' n\'existe pas.');
                    }
                }
    
                // Insertion des nouvelles associations seulement si des rôles valides existent
                if (!empty($PermissionsRolesData)) {
                    $this->db->table('group_permissions')->insertBatch($PermissionsRolesData);
                }
            }
    
            return redirect()->to('/permissions')->with('success', 'La permission a été mise à jour avec succès.');
        }
    
        return redirect()->back()->with('error', 'Erreur lors de la mise à jour de la permission.');
    }
    
    
    public function delete($id)
    {
        $this->permission->delete($id);
        return redirect()->to('/permissions');
    }
}
