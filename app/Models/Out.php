<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Out extends Model
{
    protected $table            = 'outs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'profit',
        'amount_total',
        'quantity',
        'product_id',
        'shop_id',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'profit'   => 'required|integer',
        'amount_total'   => 'required|integer',
        'product_id' => 'required|integer',
        'shop_id' => 'required|integer'
    ];
    protected $validationMessages   = [
        'profit' => [
            'required' => 'La Bénéfice est requise',
            'integer'  => 'La Bénéfice doit être un nombre entier valide'
        ],
        'amount_total' => [
            'required' => 'Le montant total est requise',
            'integer'  => 'La montant total doit être un nombre entier valide'
        ],
        'product_id' => [
            'required' => 'Le produit associé est requis',
            'integer'  => 'L\'ID du produit doit être un entier valide',
        ],
        'shop_id' => [
            'required' => 'Le Boutique associé est requis',
            'integer'  => 'L\'ID du produit doit être un entier valide',
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

    public function getFilteredProducts($period, $startDate)
    {
        $query = $this->db->table($this->table);

        $startDateObj = new DateTime($startDate);

        switch ($period) {
            case 'today':
                $query->where('DATE(created_at)', $startDateObj->format('Y-m-d'));
                break;
            case 'this_week':
                $endDateObj = clone $startDateObj;
                $endDateObj->modify('+6 days');
                $query->where('created_at >=', $startDateObj->format('Y-m-d'))
                      ->where('created_at <=', $endDateObj->format('Y-m-d'));
                break;
            case 'this_month':
                $query->where('MONTH(created_at)', $startDateObj->format('m'))
                      ->where('YEAR(created_at)', $startDateObj->format('Y'));
                break;
            case 'this_year':
                $query->where('YEAR(created_at)', $startDateObj->format('Y'));
                break;
            default:
                break;
        }

        return $query->get()->getResultArray();
    }
}
