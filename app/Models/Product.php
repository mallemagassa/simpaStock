<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $allowedFields = [
        'name', 
        'description',
        'code',
        'unit_id',
    ];

    protected $useTimestamps = true; // Pour gérer les timestamps

    protected $validationRules = [
        'name'           => 'required|min_length[3]',
        'description'    => 'permit_empty|max_length[255]',
        'code'           => 'required|min_length[3]',
        'unit_id'        => 'required|integer'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Le nom du produit est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
        ],
        'code' => [
            'required' => 'Le code est requis',
            'min_length' => 'Le nom doit comporter au moins 3 caractères'
        ],
        'description' => [
            'required' => 'Le description est requis',
            'decimal' => 'Le nom doit comporter au moins 3 caractères'
        ]
    ];

    public function getProductWithUnit($id)
    {
        return $this->select('products.*, units.name as unit_name')
                    ->join('units', 'units.id = products.unit_id')
                    ->where('products.id', $id)
                    ->first();
    }

    public function getAllProductsWithUnits()
    {
        return $this->select('products.*, units.name as unit_name')
                    ->join('units', 'units.id = products.unit_id')
                    ->findAll();
    }
}