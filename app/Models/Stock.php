<?php

namespace App\Models;

use CodeIgniter\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $allowedFields = [
        'purchase_price',
        'sale_price',
        'quantity',
        'critique',
        'product_id',
        'created_at',
    ];

    protected $useTimestamps = false;

    protected $validationRulesAdd = [
        'purchase_price' => 'required|decimal',
        'sale_price'     => 'required|decimal',
        'quantity'       => 'required|integer',
        'critique'       => 'required|integer',
        'product_id'     => 'required|integer|is_unique[stocks.product_id]',
        //'created_at'     => 'required|valid_date[Y-m-d]' // Validation du type date
    ];
    
    protected $validationRulesUpdate = [
        'purchase_price' => 'required|decimal',
        'sale_price'     => 'required|decimal',
        'quantity'       => 'required|integer',
        'critique'       => 'required|integer',
        'product_id'     => 'required|integer',
        //'created_at'     => 'required|valid_date[Y-m-d]' // Validation du type date
    ];
    
    protected $validationMessagesAdd = [
        'purchase_price' => [
            'required' => 'Le prix d\'achat est requis',
            'decimal'  => 'Le prix d\'achat doit être un nombre décimal valide'
        ],
        'sale_price' => [
            'required' => 'Le prix de vente est requis',
            'decimal'  => 'Le prix de vente doit être un nombre décimal valide'
        ],
        'quantity' => [
            'required' => 'La quantité est requise',
            'integer'  => 'La quantité doit être un nombre entier valide'
        ],
        'critique' => [
            'required' => 'La critique est requise',
            'integer'  => 'La critique doit être un nombre entier valide'
        ],
        'product_id' => [
            'required'  => 'Le produit associé est requis',
            'integer'   => 'L\'ID du produit doit être un entier valide',
            'is_unique' => 'Ce produit est déjà associé à un stock existant'
        ],
        // 'created_at' => [
        //     'required'    => 'La date de création est requise',
        //     'valid_date'  => 'La date de création doit être au format valide : AAAA-MM-JJ'
        // ]
    ];
    
    protected $validationMessagesUpdate = [
        'purchase_price' => [
            'required' => 'Le prix d\'achat est requis',
            'decimal'  => 'Le prix d\'achat doit être un nombre décimal valide'
        ],
        'sale_price' => [
            'required' => 'Le prix de vente est requis',
            'decimal'  => 'Le prix de vente doit être un nombre décimal valide'
        ],
        'quantity' => [
            'required' => 'La quantité est requise',
            'integer'  => 'La quantité doit être un nombre entier valide'
        ],
        'critique' => [
            'required' => 'La critique est requise',
            'integer'  => 'La critique doit être un nombre entier valide'
        ],
        'product_id' => [
            'required'  => 'Le produit associé est requis',
            'integer'   => 'L\'ID du produit doit être un entier valide',
        ],
        // 'created_at' => [
        //     'required'    => 'La date de création est requise',
        //     'valid_date'  => 'La date de création doit être au format valide : AAAA-MM-JJ'
        // ]
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


    public function getAllStocksWithProducts($search = null, $perPage = 10)
    {
        $builder = $this->select('stocks.*, products.name as product_name')
                        ->join('products', 'products.id = stocks.product_id');

        // Appliquer la recherche si un terme est fourni
        if ($search) {
            $builder->like('products.name', $search); // Recherche par nom de produit
        }

        return $builder->paginate($perPage, 'stocks'); // Utiliser paginate pour la pagination
    }

}
