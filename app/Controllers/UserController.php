<?php

namespace App\Controllers;

use App\Models\Role;
use App\Models\UserModel;
use App\Models\Notification;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\AuthGroups;

class UserController extends BaseController
{
    protected $roles;
    protected $db;
    protected $userModel;

    public function __construct(){
        $this->roles = new Role();
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $users = auth()->getProvider();
        $usersList = $users->findAll();
    
        $data['users'] = [];
    
        foreach ($usersList as $user) {
            $userRole = $this->userModel->getUserRole($user->id); // Get single role as a string
            $user->role = $userRole; // Assign directly as a string property
    
            $data['users'][] = $user;
        }
        
        $data['roles'] = $this->roles->findAll();
        return view('content/crud/users', $data);
    }
    
    


    public function store()
    {

        $role = $this->request->getPost('role');
        //dd($role);
        $validationRules = [
            'username' => 'alpha_dash|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[auth_identities.secret]',
            'firstname' => 'required|alpha|min_length[2]|max_length[50]',
            'lastname' => 'required|alpha|min_length[2]|max_length[50]',
            'phone'    => 'required|numeric|min_length[8]|max_length[11]',
            'password' => 'required|min_length[8]',
        ];
    
        $validationMessages = [
            'username' => [
                'required' => 'Le nom d\'utilisateur est obligatoire.',
                'alpha_dash' => 'Le nom d\'utilisateur ne doit contenir que des caractères alphanumériques, des tirets et des underscores.',
                'is_unique' => 'Ce nom d\'utilisateur existe déjà.',
            ],
            'firstname' => [
                'required' => 'Le nom est obligatoire.',
                'alpha_dash' => 'Le nom ne doit contenir que des caractères alphanumériques, des tirets et des underscores.',
                'min_length' => 'Le nom dArray to string conversion oit comporter au moins 8 caractères.',
            ],
            'lastname' => [
                'required' => 'Le prenom est obligatoire.',
                'alpha_dash' => 'Le prenom ne doit contenir que des caractères alphanumériques, des tirets et des underscores.',
                'min_length' => 'Le prenom doit comporter au moins 8 caractères.',
            ],
            'phone' => [
                'required' => 'Le telephone est obligatoire.',
                'alpha_dash' => 'Le telephone ne doit contenir que des caractères alphanumériques, des tirets et des underscores.',
                'min_length' => 'Le telephone doit comporter au moins 8 caractères.',
            ],
            'email' => [
                'required' => 'L\'email est obligatoire.',
                'valid_email' => 'Veuillez fournir une adresse email valide.',
                'is_unique' => 'Cet email est déjà utilisé.',
            ],
            'password' => [
                'required' => 'Le mot de passe est obligatoire.',
                'min_length' => 'Le mot de passe doit comporter au moins 8 caractères.',
            ],
        ];
    
        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
        $users = new UserModel();
    
        $user = new User([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'phone'    => $this->request->getPost('phone'),
            'password' => $this->request->getPost('password'),
        ]);

        if ($users->insert($user)) {
            if (!empty($role)) {
                $groupExists = $this->db->table('groups')->where('name', $role)->countAllResults();

                if ($groupExists > 0) {
                    $usersG = auth()->getProvider();
                    $userG = $usersG->findById($users->insertID);

                    $userG->addGroup($role);
                } else {
                    return redirect()->back()->with('error', 'Erreur : Le rôle avec nom ' . $role . ' n\'existe pas.');
                }
            }
        }
    
        return redirect()->to('/user')->with('success', 'Utilisateur créé avec succès');
    }

    // public function update($id)
    // {
    //     $users = new UserModel();
    //     $user = $users->find($id);
    
    //     $role = $this->request->getPost('role');
    //     dd($role);
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    //     }
    
    //     // Validation des champs de l'utilisateur
    //     $db = \Config\Database::connect();
    //     $authIdentity = $db->table('auth_identities')
    //                        ->select('id')
    //                        ->where('secret', $user->email) // Chercher par email
    //                        ->get()
    //                        ->getRowArray();
        
    //     $authIdentityId = $authIdentity ? $authIdentity['id'] : null;
    
    //     $validationRules = [
    //         'username' => "alpha_dash|min_length[3]|max_length[30]|is_unique[users.username,id,{$id}]",
    //         'email'    => "required|valid_email|is_unique[auth_identities.secret,id,{$authIdentityId}]",
    //         'firstname' => 'required|alpha|min_length[2]|max_length[50]',
    //         'lastname'  => 'required|alpha|min_length[2]|max_length[50]',
    //         'phone'     => 'required|numeric|min_length[8]|max_length[11]',
    //         'password'  => 'permit_empty|min_length[8]',
    //     ];
    
    //     $validationMessages = [
    //         'username' => [
    //             'is_unique' => 'Ce nom d\'utilisateur est déjà pris.',
    //         ],
    //         'email' => [
    //             'is_unique' => 'Cet email est déjà utilisé.',
    //         ],
    //     ];
    
    //     if (!$this->validate($validationRules, $validationMessages)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }
    
    //     // Mise à jour de l'utilisateur
    //     $user = new User([
    //         'id' => $id,
    //         'username' => $this->request->getPost('username'),
    //         'email'    => $this->request->getPost('email'),
    //         'firstname' => $this->request->getPost('firstname'),
    //         'lastname' => $this->request->getPost('lastname'),
    //         'phone'    => $this->request->getPost('phone'),
    //     ]);
    
    //     // Mise à jour du mot de passe si nécessaire
    //     $password = $this->request->getPost('password');
    //     if ($password) {
    //         $user->password = $password;
    //     }
    
    //     // Mise à jour des informations utilisateur
    //     if ($users->update($id, $user)) {
    //         // Récupération de l'utilisateur à jour avec ses groupes
    //         $usersG = auth()->getProvider();
    //         $userG = $usersG->findById($id);


    //         $groupExists = $this->db->table('groups')->where('name', $role)->countAllResults();

    //         if ($groupExists > 0) {
    //             $userG->addGroup($role);
    //         } else {
    //             return redirect()->back()->with('error', 'Erreur : Le rôle avec nom ' . $role . ' n\'existe pas.');
    //         }

    //         $userG->removeGroup($role);

    
    //         return redirect()->to('/user')->with('success', 'Utilisateur mis à jour avec succès.');
    //     }
    
    //     return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'utilisateur.');
    // }
    

    public function update($id)
    {
        $users = new UserModel();
        $user = $users->find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
    
        $role = $this->request->getPost('roleU');
        $db = \Config\Database::connect();
        $authIdentity = $db->table('auth_identities')
                           ->select('id')
                           ->where('secret', $user->email) 
                           ->get()
                           ->getRowArray();
        $authIdentityId = $authIdentity ? $authIdentity['id'] : null;
    
        $validationRules = [
            'username' => "alpha_dash|min_length[3]|max_length[30]|is_unique[users.username,id,{$id}]",
            'email'    => "required|valid_email|is_unique[auth_identities.secret,id,{$authIdentityId}]",
            'firstname' => 'required|alpha|min_length[2]|max_length[50]',
            'lastname'  => 'required|alpha|min_length[2]|max_length[50]',
            'phone'     => 'required|numeric|min_length[8]|max_length[11]',
            'password'  => 'permit_empty|min_length[8]',
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $user = new User([
            'id' => $id,
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'phone'    => $this->request->getPost('phone'),
        ]);
    
        $password = $this->request->getPost('password');
        if ($password) {
            $user->password = $password;
        }
    
        if ($users->update($id, $user)) {
            // Gestion du rôle
            $usersG = auth()->getProvider();
            $userG = $usersG->findById($id);
    
            // Suppression de l'ancien rôle
            $currentRole = $userG->getGroups(); // Supposons que `getRoles()` retourne un tableau de rôles
            if (!empty($currentRole)) {
                $userG->removeGroup($currentRole[0]);
            }
    
            // Vérification et ajout du nouveau rôle
            $groupExists = $this->db->table('groups')->where('name', $role)->countAllResults();
            if ($groupExists > 0) {
                $userG->addGroup($role);
            } else {
                return redirect()->back()->with('error', "Erreur : Le rôle avec nom '{$role}' n'existe pas.");
            }
    
            return redirect()->to('/user')->with('success', 'Utilisateur mis à jour avec succès.');
        }
    
        return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'utilisateur.');
    }
    



    public function delete($id)
    {
        $users = auth()->getProvider();
        
        $user = $users->findById($id);

        if ($users->delete($user->id, true)) {
            return redirect()->to('/user')->with('success', 'Utilisateur supprimé avec succès.');
        } else {
            return redirect()->to('/user')->with('error', 'Une erreur s\'est Unitée lors de la suppression du unité.');
        }
        
    }
    
}