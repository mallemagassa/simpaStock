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
        'respon',
        'address',
        'logo_shop',
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
        'name'           => 'required|min_length[3]',
        'respon'           => 'required|min_length[3]',
        'address'           => 'required|min_length[3]',
        'logo_shop'           => 'required|min_length[3]',
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Le nom du boutique est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
        ],
        'respon' => [
            'required' => 'Le résponsable de la boutique est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
        ],
        'address' => [
            'required' => 'Le nom de la boutique est requis',
            'min_length' => 'La adresse doit comporter au moins 3 caractères'
        ],
        'logo_shop' => [
            'required' => 'Le nom du boutique est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
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
}
