<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class TestSeeder extends Seeder
{
    public function run()
    {
        
        $users = new UserModel;

        $user = new User([
            'username' => 'kizza',
            'email'    => 'magassamalle82@gmail.com',
            'password' => 'magassamalle82',
            'firstname' => 'Malle',
            'lastname' => 'Magassa',
            'phone' => '92683269',
        ]);
        
        $users->save($user);


        
    }
}
