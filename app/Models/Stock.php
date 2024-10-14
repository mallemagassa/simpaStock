<?php

namespace App\Models;

use CodeIgniter\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $allowedFields = [
        'quantity',
        'critique',
        'product_id',
    ];

    protected $useTimestamps = true;

    protected $validationRulesAdd = [
        'quantity'   => 'required|integer',
        'critique'   => 'required|integer',
        'product_id' => 'required|integer|is_unique[stocks.product_id]'
    ];
    protected $validationRulesUpdate = [
        'quantity'   => 'required|integer',
        'critique'   => 'required|integer',
        'product_id' => 'required|integer'
    ];

    protected $validationMessagesAdd = [
        'quantity' => [
            'required' => 'La quantité est requise',
            'integer'  => 'La quantité doit être un nombre entier valide'
        ],
        'critique' => [
            'required' => 'La critique est requise',
            'integer'  => 'La critique doit être un nombre entier valide'
        ],
        'product_id' => [
            'required' => 'Le produit associé est requis',
            'integer'  => 'L\'ID du produit doit être un entier valide',
            'is_unique' => 'Ce produit est déjà associé à un stock existant'
        ]
    ];
    protected $validationMessagesUpdate = [
        'quantity' => [
            'required' => 'La quantité est requise',
            'integer'  => 'La quantité doit être un nombre entier valide'
        ],
        'critique' => [
            'required' => 'La critique est requise',
            'integer'  => 'La critique doit être un nombre entier valide'
        ],
        'product_id' => [
            'required' => 'Le produit associé est requis',
            'integer'  => 'L\'ID du produit doit être un entier valide',
        ]
    ];

    /**
     * Obtenir un stock avec les détails du produit associé
     */
    public function getStockWithProduct($id)
    {
        return $this->select('stocks.*, products.name as product_name')
                    ->join('products', 'products.id = stocks.product_id')
                    ->where('stocks.id', $id)
                    ->first();
    }

    /**
     * Obtenir tous les stocks avec les produits associés
     */
    public function getAllStocksWithProducts()
    {
        return $this->select('stocks.*, products.name as product_name')
                    ->join('products', 'products.id = stocks.product_id')
                    ->findAll();
    }
}
