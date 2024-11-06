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
        'amount_total_sale',
        'amount_total_purchase',
        'product_out',
        'ref',
        'observation',
        'shop_id',
        'created_at',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'profit'   => 'required|integer',
        'amount_total_sale'   => 'required|integer',
        'amount_total_purchase' => 'required|integer',
        'product_out' => 'required|validateWaybillsData', 
        'shop_id' => 'required|integer'
    ];
    protected $validationMessages   = [
        'profit' => [
            'required' => 'La Bénéfice est requise',
            'integer'  => 'La Bénéfice doit être un nombre entier valide'
        ],
        'amount_total_sale' => [
            'required' => 'Le montant total est requise',
            'integer'  => 'La montant total doit être un nombre entier valide'
        ],
        'amount_total_purchase' => [
            'required' => 'Le montant total est requise',
            'integer'  => 'La montant total doit être un nombre entier valide'
        ],
        'product_out' => [
            'required' => 'Le produit associé est requis',
            'validateWaybillsData' => 'Le format de données de bons de livraison est invalide ou incomplet.',
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

    public function getFilteredProducts($startDate)
    {
        $query = $this->db->table($this->table);

        $startDateObj = new DateTime($startDate);

        // Filtrer uniquement par date
        $query->where('DATE(created_at)', $startDateObj->format('Y-m-d'));

        return $query->get()->getResultArray();
    }


    protected function validateWaybillsData(string $str, string $fields, array $data): bool
    {
        // Convertir la chaîne JSON en tableau PHP
        $waybills = json_decode($str, true);

        // Vérifier si le JSON est invalide
        if (json_last_error() !== JSON_ERROR_NONE) {
            return false;
        }

        // Vérifier si chaque élément de waybills a les clés requises
        foreach ($waybills as $waybill) {
            if (
                !isset($waybill['quantity']) ||
                !isset($waybill['amount_total']) ||
                !isset($waybill['Pprofit']) ||
                !isset($waybill['product_name'])
            ) {
                return false;
            }

            // Optionnel: Vérifier si chaque champ est du bon type
            if (
                !is_numeric($waybill['quantity']) ||
                !is_numeric($waybill['amount_total']) ||
                !is_numeric($waybill['Pprofit']) ||
                !is_string($waybill['product_name'])
            ) {
                return false;
            }
        }

        return true;
    }



}
