<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = array_merge($this->allowedFields, [
            'firstname',
            'lastname',
            'phone',
        ]);
    }

    // public function getUserRoles($userId)
    // {
    //     return $this->select('auth_groups_users.group')
    //                 ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
    //                 ->where('users.id', $userId)
    //                 ->findAll();
    // }

    public function getUserRole($userId)
    {
        $result = $this->select('auth_groups_users.group')
                       ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                       ->where('users.id', $userId)
                       ->first(); // Get a single row
    
        return $result ? $result->group : null; // Access as an object property
    }
    
    

}
