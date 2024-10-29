<?php

namespace App\Models;

use CodeIgniter\Model;

class Report extends Model
{
    protected $table            = 'reports';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amount_total',
        'quantity',
        'quantity_before',
        'quantity_after',
        'ops',
        'shop_id',
        'user_id',
        'product_id',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
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

    public function getReportsWithDetails(string $ops = null)
    {
        $this->select('reports.*, users.firstname, shops.name as shop_name, products.name as product_name')
            ->join('users', 'users.id = reports.user_id', 'left')
            ->join('shops', 'shops.id = reports.shop_id', 'left')
            ->join('products', 'products.id = reports.product_id', 'left');

        if ($ops !== null) {
            $this->where('reports.ops', $ops);
        }

        return $this->findAll();
    }
}
