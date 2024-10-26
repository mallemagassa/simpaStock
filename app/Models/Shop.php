<?php

namespace App\Models;

use CodeIgniter\Model;

class Shop extends Model
{
    protected $table            = 'shops';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'address',
        'logo_shop',
        'user_id',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name'      => 'required|min_length[3]',
        'address'   => 'required|min_length[3]',
        'user_id'    => 'required|integer',
        // 'logo_shop' => 'uploaded[logo_shop]|is_image[logo_shop]|max_size[logo_shop,2048]|mime_in[logo_shop,image/jpg,image/jpeg,image/png]'
    ];
    
    protected $validationMessages = [
        'name' => [
            'required'   => 'Le nom du boutique est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
        ],
        'address' => [
            'required'   => 'Le nom de la boutique est requis',
            'min_length' => 'L\'adresse doit comporter au moins 3 caractères'
        ],
        'user_id' => [
            'required' => 'L\'Utilisateur associé est requis',
            'integer'  => 'L\'ID d\' utilisateur doit être un entier valide',
        ]
       
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

    public function getShopsWithUsers()
    {
        return $this->select('shops.*, users.firstname, users.lastname')
                    ->join('users', 'users.id = shops.user_id')
                    ->findAll();
    }


    public function getShopWithUserById($id)
    {
        return $this->select('shops.*, users.firstname, users.lastname')
                    ->join('users', 'users.id = shops.user_id')
                    ->where('shops.id', $id)
                    ->first();
    }
}
