<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Notification;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    public function index()
    {
        $users = auth()->getProvider();

        $data['users'] = $users->findAll();

        return view('content/crud/users', $data);
    }



    public function store()
    {
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
                'min_length' => 'Le nom doit comporter au moins 8 caractères.',
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
    
        // Validation
        if (!$this->validate($validationRules, $validationMessages)) {
            // Si des erreurs, renvoyer au modal avec les erreurs
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
        $users = new UserModel;
    
        // Créer un nouvel utilisateur
        $user = new User([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'phone'    => $this->request->getPost('phone'),
            'password' => $this->request->getPost('password'),
        ]);
    
        // Enregistrement via Shield
        $users->save($user);
    
        return redirect()->to('/user')->with('success', 'Utilisateur créé avec succès');
    }


    public function update($id)
    {
        // Récupérer l'utilisateur actuel
        $users = new UserModel();
        $user = $users->find($id);


        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        $db = \Config\Database::connect();
        $authIdentity = $db->table('auth_identities')
                           ->select('id')
                           ->where('secret', $user->email) // Chercher par email
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

        $validationMessages = [
            'username' => [
                'is_unique' => 'Ce nom d\'utilisateur est déjà pris.',
            ],
            'email' => [
                'is_unique' => 'Cet email est déjà utilisé.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
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

        $users->update($id, $user);

        return redirect()->to('/user')->with('success', 'Utilisateur mis à jour avec succès.');
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