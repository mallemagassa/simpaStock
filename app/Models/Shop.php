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
    protected $validationRules = [
        'name'      => 'required|min_length[3]',
        'respon'    => 'required|min_length[3]',
        'address'   => 'required|min_length[3]',
        // 'logo_shop' => 'uploaded[logo_shop]|is_image[logo_shop]|max_size[logo_shop,2048]|mime_in[logo_shop,image/jpg,image/jpeg,image/png]'
    ];
    
    protected $validationMessages = [
        'name' => [
            'required'   => 'Le nom du boutique est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
        ],
        'respon' => [
            'required'   => 'Le responsable de la boutique est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
        ],
        'address' => [
            'required'   => 'Le nom de la boutique est requis',
            'min_length' => 'L\'adresse doit comporter au moins 3 caractères'
        ],
        // 'logo_shop' => [
        //     'uploaded'  => 'Vous devez télécharger une image.',
        //     'is_image'  => 'Le fichier téléchargé doit être une image.',
        //     'max_size'  => 'L\'image doit avoir une taille maximale de 2 Mo.',
        //     'mime_in'   => 'L\'image doit être au format jpg, jpeg ou png.'
        // ]
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
